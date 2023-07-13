<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vacancies;

class WebControllerApi extends Controller
{

    /* VACANCIES */
    public function vacancyList()
    {
        $vacancies = Vacancies::with('company')->orderBy('id', 'DESC')->get();
        return response()->json($vacancies);
    }

}
