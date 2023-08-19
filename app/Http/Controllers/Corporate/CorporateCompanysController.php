<?php

namespace App\Http\Controllers\Corporate;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanysRequest;
use App\Models\Companys;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class CorporateCompanysController extends Controller
{
    public function home(Request $request)
    {
        if($request->search){
            $companys = Companys::where('name', 'like', '%'.$request->search.'%')
            ->orderBy('id', 'DESC')->paginate(5);

        }else{
            $companys = Companys::where('user_id', '=', Auth()->user()->id)->orderBy('id', 'DESC')->paginate(5);
        }
       
        return view('corporate.companys.index', compact('companys'));
    }

    
    public function search(Request $request)
    {
        return redirect('/corporativo/empresas/buscar/'.$request->search);
    }

    public function forms(Request $request)
    {
        $formEdit = Companys::find($request->company_id);
        $user = User::find(base64_decode($request->user_id));
        
        return view('corporate.companys.forms', compact('formEdit', 'user'));
    }

    public function formsAcitions(CompanysRequest $request, int $company_id = null)
    {

        
        if($request->action == "create"){
            $validatedData =  $validatedData = $request->validated();
            $company = new Companys();
            $company->user_id = $validatedData['user_id'];
            $company->name = $validatedData['name'];
            $company->about = $validatedData['about'];

            if ($request->file('logo')) {
                $uploadPath = 'uploads/companys/';
                $extention = $request->file('logo')->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $request->file('logo')->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;
                $company->logo = $finalImagePathName;
            }
            
            
            if($company->save()){
                return redirect('/corporativo/empresas')->with('message', $company->user->name.' sua nova empresa foi cadastrada com sucesso!');
            }else{
                return redirect('/corporativo/empresas/cadastro/'.base64_encode($company->user_id))->with('message', 'Erro ao cadastrar a empresa');

            }
            
        }

        if($request->action == 'update'){
            $company = Companys::findOrFail($company_id);
            $validatedData = $request->validated();

            $company->name = $validatedData['name'];
            $company->about = $validatedData['about'];

            if ($request->file('logo')) {
                $uploadPath = 'uploads/companys/';
                $extention = $request->file('logo')->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $request->file('logo')->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;
                $company->logo = $finalImagePathName;
            }
            
            if($company->update()){
                return redirect('/corporativo/empresa/'.$company_id.'/editar')->with('message', 'Empresa atualizada com sucesso!');
            }else{
                return redirect('/corporativo/empresa')->with('message', 'Erro ao atualizar a empresa');

            }

        }

       
    }

    public function detail(Request $request)
    {
        $company = Companys::where("id","=",base64_decode($request->company_id))->get();
        return view('corporate.companys.details', compact('company'));
    }

    public function delete(Request $request)
    {
        $company = Companys::findOrFail($request->company_id);
        if(File::exists($company->logo)){
            File::delete($company->logo);
        }

        $company->delete();
        return redirect('/corporativo/empresas')->with('message', 'Empresa deletado com sucesso!');

    }

    public function deleteLogo(Request $request)
    {
        $company = Companys::findOrFail($request->company_id);
        if(File::exists($company->logo)){
            File::delete($company->logo);
            $company->logo = "";
            $company->save();
        }

        return redirect()->back()->with('message', 'Logo deletado com sucesso!');

    }
}
