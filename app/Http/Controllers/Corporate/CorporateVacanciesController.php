<?php

namespace App\Http\Controllers\Corporate;

use App\Http\Controllers\Controller;
use App\Http\Requests\VacanciesRequest;
use App\Models\Applications;
use App\Models\Categories;
use App\Models\Companys;
use App\Models\Vacancies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CorporateVacanciesController extends Controller
{
    public function home(Request $request)
    {
        if ($request->search) {
            $vacancies = Vacancies::where('title', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'DESC')
                ->paginate(5);
        } else {
            $vacancies = Vacancies::select('vacancies.*')
                ->join('companys', 'vacancies.company_id', '=', 'companys.id')
                ->join('users', 'companys.user_id', '=', 'users.id')
                ->where('users.id', '=', Auth::user()->id)
                ->orderBy('vacancies.id', 'DESC')
                ->paginate(5);
        }
    
        return view('corporate.vacancies.index', compact('vacancies'));
    }

    public function forms(Request $request)
    {
        $formEdit = Vacancies::find($request->vacancy_id);
        $userCompanys = Companys::where('user_id', Auth::user()->id)->get();
        $company = Companys::find(base64_decode($request->company_id));
        $categories = Categories::all();

        
        return view('corporate.vacancies.forms', compact('formEdit', 'company', 'categories','userCompanys'));
    }

    public function search(Request $request)
    {
        return redirect('/corporativo/vagas/buscar/'.$request->search);
    }

    public function formsAcitions(VacanciesRequest $request, int $company_id = null)
    {
        
        if($request->action == "create"){
            $validatedData =  $validatedData = $request->validated();
            $vacancy = new Vacancies();
            $vacancy->company_id = $validatedData['company_id'];
            $vacancy->category_id = $validatedData['category_id'];
            $vacancy->title = $validatedData['title'];
            $vacancy->description = $validatedData['description'];
            $vacancy->qualifications = $validatedData['qualifications'];
            $vacancy->salary_intro = $validatedData['salary_intro'];
            $vacancy->salary_final = $validatedData['salary_final'];
            $vacancy->quantity = $validatedData['quantity'];
           
            $vacancy->localization = $validatedData['localization'];
            $vacancy->model = $validatedData['model'];
            $vacancy->time = $validatedData['time'];
            $vacancy->hiring_type = $validatedData['hiring_type'];
            $vacancy->level = $validatedData['level'];
            $vacancy->situation = "open";
            $vacancy->slug = Str::slug($validatedData['title'].uniqid(mt_rand()));
            
            
            if($vacancy->save()){
                return redirect('/corporativo/vagas')->with('message', 'Vaga para '.$vacancy->company->name.' cadastrada com sucesso!');
            }else{
                return redirect('/corporativo/vagas/cadastro/'.base64_encode($vacancy->company_id))->with('message', 'Erro ao cadastrar o vaga');

            }
            
        }

        if($request->action == 'update'){
            $vacancy = Vacancies::findOrFail($company_id);
            $validatedData = $request->validated();

            $vacancy->company_id = $validatedData['company_id'];
            $vacancy->category_id = $validatedData['category_id'];
            $vacancy->title = $validatedData['title'];
            $vacancy->description = $validatedData['description'];
            $vacancy->qualifications = $validatedData['qualifications'];
            $vacancy->salary_intro = $validatedData['salary_intro'];
            $vacancy->salary_final = $validatedData['salary_final'];
            $vacancy->quantity = $validatedData['quantity'];
          
            $vacancy->localization = $validatedData['localization'];
            $vacancy->model = $validatedData['model'];
            $vacancy->time = $validatedData['time'];
            $vacancy->hiring_type = $validatedData['hiring_type'];
            $vacancy->level = $validatedData['level'];
            $vacancy->situation = $validatedData['situation'];
            $vacancy->slug = Str::slug($validatedData['title'].uniqid(mt_rand()));
            
            if($vacancy->update()){
                return redirect('/corporativo/vaga/'.$company_id.'/editar')->with('message', 'Vaga atualizado com sucesso!');
            }else{
                return redirect('/corporativo/vagas')->with('message', 'Erro ao atualizar o vaga');

            }

        }
       
    }

    public function vacanciesCategoriesList(Request $request)
    { 
    
        $vacancies = Vacancies::where("category_id","=",base64_decode($request->category_id))->orderBy('id', 'DESC')->paginate(5);
        $category = Categories::find(base64_decode($request->category_id));

        return view('corporate.vacancies.index', compact('vacancies', 'category'));
    }

    public function vacancyCompanyList(Request $request)
    { 
        $company = Companys::find(base64_decode($request->company_id));
        $vacancies = Vacancies::where("company_id","=",base64_decode($request->company_id))->orderBy('id', 'DESC')->paginate(5);

        return view('corporate.vacancies.index', compact('vacancies','company'));
    }

    public function delete(Request $request)
    {
        $vancacy = Vacancies::findOrFail($request->vacancy_id);

        $vancacy->delete();
        return redirect('/corporativo/vagas')->with('message', 'Vaga deletada com sucesso!');

    }

    public function detail(Request $request)
    {
        $vacancy = Vacancies::where("id","=",base64_decode($request->vacancy_id))->get();
        $applicationsCount = Applications::where("vacancy_id","=",base64_decode($request->vacancy_id))->count();
        return view('corporate.vacancies.details', compact('vacancy', 'applicationsCount'));
    }
}
