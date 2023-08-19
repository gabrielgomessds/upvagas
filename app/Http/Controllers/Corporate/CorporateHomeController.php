<?php

namespace App\Http\Controllers\Corporate;

use App\Http\Controllers\Controller;
use App\Models\Companys;
use App\Models\User;
use App\Models\Vacancies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CorporateHomeController extends Controller
{
    //
    public function index()
    {

        if(Auth::check()){
            $companys = Companys::where("user_id","=",Auth::user()->id)->orderBy('id', 'DESC')->limit(6)->get();
            //$com = Companys::where("user_id","=",Auth::user()->id)->orderBy('id', 'DESC')->limit(6)->get();
            $searchVacancies = DB::table('users AS u')
            ->join('companys AS c', 'c.user_id', '=', 'u.id')
            ->join('vacancies AS v', 'v.company_id', '=', 'c.id')
            ->select('c.name AS company_name','v.situation AS situation', 'v.id AS id', 'v.title AS title')
            ->where('u.id', '=', Auth::user()->id);
        
            $vacancies = $searchVacancies->get();

            $count['companys'] = Companys::where("user_id","=",Auth::user()->id)->count();
            $count['vacancies'] = $searchVacancies->count();

            return view('corporate.home', compact('companys','vacancies','count'));
        }
        
        return redirect(url('login'));
    }

    
    public function config()
    {
        $user = User::find(Auth::user()->id);
        return view('corporate.config.forms', compact('user'));
    }

    public function configForms(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
           
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password == "" ? $user->password : Hash::make($request->password);
            
            if ($request->file('photo')) {
                $uploadPath = 'uploads/users/';
                $extention = $request->file('photo')->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $request->file('photo')->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;
                $user->photo = $finalImagePathName;
            }
            
            if($user->update()){
                return redirect('/corporativo/configuracoes')->with('message', 'Perfil atualizado com sucesso!');
            }else{
                return redirect('/corporativo/configuracoes')->with('message', 'Erro ao atualizar o perfil');

            }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('login'));
    }
}
