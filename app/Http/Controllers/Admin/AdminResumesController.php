<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResumesRequest;
use App\Models\Resumes;
use App\Models\User;
use Illuminate\Http\Request;

class AdminResumesController extends Controller
{
    public function home(Request $request)
    {
        if($request->search){
            $resumes = Resumes::join('users', 'resumes.user_id', '=', 'users.id')
            ->where('users.name', 'like', '%'.$request->search.'%')
            ->select('resumes.*')
            ->orderBy('id', 'DESC')->paginate(5);

        }else{
            $resumes = Resumes::orderBy('id', 'DESC')->paginate(5);
        }
       
        return view('admin.resumes.index', compact('resumes'));
    }

    public function search(Request $request)
    {
        return redirect('/admin/curriculos/buscar/'.$request->search);
    }

    public function forms(Request $request)
    {
        $formEdit = Resumes::find($request->resume_id);
        $user = User::find(base64_decode($request->user_id));
        
        return view('admin.resumes.forms', compact('formEdit', 'user'));
    }

    public function formsAcition(ResumesRequest $request, int $resume_id = null)
    {

        
        if($request->action == "create"){
            $validatedData =  $validatedData = $request->validated();
            $resume = new Resumes();
            $resume->user_id = $validatedData['user_id'];
            $resume->phone = $validatedData['phone'];
            $resume->description = $validatedData['description'];
            $resume->localization = $validatedData['localization'];
            $resume->experience = $validatedData['experience'];
            $resume->formations = $validatedData['formations'];
            $resume->qualifications = $validatedData['qualifications'];
            $resume->skills = $validatedData['skills'];
            $resume->languages = $validatedData['languages'];
            
            
            if($resume->save()){
                return redirect('/admin/curriculos')->with('message', 'Curriculo de '.$resume->user->name.' cadastrado com sucesso!');
            }else{
                return redirect('/admin/curriculos/cadastro/'.base64_encode($resume->user_id))->with('message', 'Erro ao cadastrar o curriculo');

            }
            
        }

        if($request->action == 'update'){
            $resume = Resumes::findOrFail($resume_id);
            $validatedData = $request->validated();

            $resume->phone = $validatedData['phone'];
            $resume->description = $validatedData['description'];
            $resume->localization = $validatedData['localization'];
            $resume->experience = $validatedData['experience'];
            $resume->formations = $validatedData['formations'];
            $resume->qualifications = $validatedData['qualifications'];
            $resume->skills = $validatedData['skills'];
            $resume->languages = $validatedData['languages'];
            
            if($resume->update()){
                return redirect('/admin/curriculo/'.$resume_id.'/editar')->with('message', 'Curriculo atualizado com sucesso!');
            }else{
                return redirect('/admin/curriculos')->with('message', 'Erro ao atualizar o curriculo');

            }

        }
       
    }

    public function detail(Request $request)
    {
        $resume = Resumes::where("id","=",base64_decode($request->resume_id))->get();
        return view('admin.resumes.details', compact('resume'));
    }

    public function delete(Request $request)
    {
        $resume = Resumes::findOrFail($request->resume_id);

        $resume->delete();
        return redirect('/admin/curriculos')->with('message', 'Currículo deletado com sucesso!');

    }
}
