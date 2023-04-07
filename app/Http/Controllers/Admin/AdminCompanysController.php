<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanysRequest;
use App\Models\Companys;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminCompanysController extends Controller
{
    public function home(Request $request)
    {
        if($request->search){
            $companys = Companys::where('name', 'like', '%'.$request->search.'%')
            ->orderBy('id', 'DESC')->paginate(5);

        }else{
            $companys = Companys::orderBy('id', 'DESC')->paginate(5);
        }
       
        return view('admin.companys.index', compact('companys'));
    }

    public function companysUserList(Request $request)
    {
        $companys = Companys::where("user_id","=",base64_decode($request->user_id))->orderBy('id', 'DESC')->paginate(5);
        $user = User::find(base64_decode($request->user_id));
        return view('admin.companys.index', compact('companys','user'));
    }


    public function search(Request $request)
    {
        return redirect('/admin/empresas/buscar/'.$request->search);
    }

    public function forms(Request $request)
    {
        $formEdit = Companys::find($request->company_id);
        $user = User::find(base64_decode($request->user_id));
        
        return view('admin.companys.forms', compact('formEdit', 'user'));
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
                return redirect('/admin/empresas')->with('message', 'Empresa de '.$company->user->name.' cadastrado com sucesso!');
            }else{
                return redirect('/admin/empresas/cadastro/'.base64_encode($company->user_id))->with('message', 'Erro ao cadastrar a empresa');

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
                return redirect('/admin/empresa/'.$company_id.'/editar')->with('message', 'Empresa atualizada com sucesso!');
            }else{
                return redirect('/admin/empresa')->with('message', 'Erro ao atualizar a empresa');

            }

        }

       
    }

    public function detail(Request $request)
    {
        $company = Companys::where("id","=",base64_decode($request->company_id))->get();
        return view('admin.companys.details', compact('company'));
    }

    public function delete(Request $request)
    {
        $company = Companys::findOrFail($request->company_id);
        if(File::exists($company->logo)){
            File::delete($company->logo);
        }

        $company->delete();
        return redirect('/admin/empresas')->with('message', 'Empresa deletado com sucesso!');

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
