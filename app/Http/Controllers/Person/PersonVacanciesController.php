<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\Vacancies;
use Illuminate\Http\Request;

class PersonVacanciesController extends Controller
{
    public function detail(Request $request)
    {
        $vacancy = Vacancies::where("id","=",base64_decode($request->vacancy_id))->get();
        $applicationsCount = Applications::where("vacancy_id","=",base64_decode($request->vacancy_id))->count();
        return view('person.vacancies.details', compact('vacancy', 'applicationsCount'));
    }
}
