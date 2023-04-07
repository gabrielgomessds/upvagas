<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterPersonRequest;
use App\Models\Categories;
use App\Models\Companys;
use App\Models\User;
use App\Models\Vacancies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminHomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $companys = Companys::orderBy('id', 'DESC')->limit(6)->get();
            $categories = Categories::orderBy('id', 'DESC')->limit(6)->get();
            $vacancies = Vacancies::with('company')->orderBy('id', 'DESC')->limit(6)->get();
            $users = User::orderBy('id', 'DESC')->limit(6)->get();

            $count['companys'] = Companys::count();
            $count['categories'] = Categories::count();
            $count['vacancies'] = Vacancies::count();
            $count['users'] = User::count();

            return view('admin.home', compact('companys','categories','vacancies','users','count'));
        }
        
        return redirect(url('login'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('login'));
    }

    public function config()
    {
        $user = User::find(Auth::user()->id);
        return view('admin.config.forms', compact('user'));
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
                return redirect('/admin/configuracoes')->with('message', 'Perfil atualizado com sucesso!');
            }else{
                return redirect('/admin/configuracoes')->with('message', 'Erro ao atualizar o perfil');

            }
    }
}
