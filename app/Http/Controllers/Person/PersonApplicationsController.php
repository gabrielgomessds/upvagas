<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonApplicationsController extends Controller
{
    public function home(Request $request)
    {
        $applications = Applications::where("user_id", Auth::user()->id)->get();
        return view('person.applications.index', compact('applications'));
    }
}
