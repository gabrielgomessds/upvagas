<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function registerPerson()
    {
        return view('web.registerPerson');
    }

    public function registerCorporation()
    {
        return view('web.registerCompy');
    }
}
