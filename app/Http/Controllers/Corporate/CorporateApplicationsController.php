<?php

namespace App\Http\Controllers\Corporate;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\Resumes;
use App\Models\Vacancies;
use Illuminate\Http\Request;

class CorporateApplicationsController extends Controller
{
    public function home(Request $request)
    {
        $applications = Applications::where("vacancy_id","=",base64_decode($request->vacancy_id))->get();
        $vacancy = Vacancies::find(base64_decode($request->vacancy_id));

        return view('corporate.applications.index', compact('applications', 'vacancy'));
    }

    public function detail(Request $request)
    {
        $application = Applications::find(base64_decode($request->app_id));

        $vacancy = Vacancies::find($application->vacancy_id);
        $resume = Resumes::where("user_id","=",$application->user_id)->get();

        return view('corporate.applications.details', compact('resume', 'vacancy', 'application'));
    }

    public function actions(Request $request)
    {
        $app = Applications::findOrFail(base64_decode($request->app_id));
        if($request->option == 'aceitar'){
            $app->situation = 'accepted';
        }else{
            $app->situation = 'refused';
        }

        if($app->save()){
            return redirect('/corporativo/vaga/aplicacoes/curriculo/'.base64_encode($app->id));
        }else{
            return redirect('/corporativo/vagas/cadastro/'.base64_encode($app->company_id))->with('message', 'Erro ao cadastrar o aplicação');

        }
    }
}
