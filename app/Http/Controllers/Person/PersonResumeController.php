<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResumesRequest;
use App\Models\Resumes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonResumeController extends Controller
{
    public function forms(Request $request)
    {
        $formEdit = Resumes::find(base64_decode($request->resume_id));
        $user = User::find(Auth::user()->id);
        $resume = Resumes::where('user_id', Auth::user()->id)->get();

        if(!empty($formEdit) && $formEdit->user_id !== $user->id){
            return redirect('/usuario/curriculo')->with('message', 'Erro ao acessar o curriculo, tente novamente mais tarde');

        }elseif(!$resume->isEmpty()){
            return view('person.resumes.details', compact('resume'));
        }else{
            return view('person.resumes.forms', compact('formEdit', 'user'));
        }
        
    }

    public function formsAcition(ResumesRequest $request, int $resume_id = null)
    {
        
        if($request->action == "create"){
            $validatedData =  $validatedData = $request->validated();
            $resume = new Resumes();
            $resume->user_id = Auth::user()->id;
            $resume->phone = $validatedData['phone'];
            $resume->description = $validatedData['description'];
            $resume->localization = $validatedData['localization'];
            $resume->experience = $validatedData['experience'];
            $resume->formations = $validatedData['formations'];
            $resume->qualifications = $validatedData['qualifications'];
            $resume->skills = $validatedData['skills'];
            $resume->languages = $validatedData['languages'];
            
            
            if($resume->save()){
                return redirect('/usuario/curriculo')->with('message', 'Seu curriculo foi cadastrado com sucesso!');
            }else{
                return redirect('/usuario/curriculo/cadastro/'.base64_encode($resume->user_id))->with('message', 'Erro ao cadastrar o curriculo');

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
                return redirect('/usuario/curriculo/'.$resume_id.'/editar')->with('message', 'Curriculo atualizado com sucesso!');
            }else{
                return redirect('/usuario/curriculo')->with('message', 'Erro ao atualizar o curriculo');

            }

        }
       
    }

    public function detail(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $resume = Resumes::where("user_id","=",$user->id)->get();
        return view('person.resumes.details', compact('resume'));
    }

    public function delete(Request $request)
    {
        $resume = Resumes::findOrFail(base64_decode($request->resume_id));

        $resume->delete();
        return redirect('/usuario/curriculo')->with('message', 'Currículo deletado com sucesso!');

    }

}
