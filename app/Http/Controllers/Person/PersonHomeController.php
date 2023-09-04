<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\Models\Vacancies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonHomeController extends Controller
{
    public function index()
    {
        $applications = Applications::where("user_id", Auth::user()->id);
        $userApplications = $applications->orderBy('id', 'DESC')->limit(6)->get();
        $lastApplication = $applications->orderBy('id', 'DESC')->first();


        $recommended = Vacancies::whereNotIn('id', $userApplications->pluck('vacancy_id'))
            ->where('title', 'LIKE', '%' . $lastApplication->vacancies->title . '%')
            ->where('category_id', '=', $lastApplication->vacancies->category_id)
            ->orderBy('id', 'DESC')
            ->paginate(5);

        return view('person.home', compact('userApplications', 'recommended'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect(url('login'));
    }
}
