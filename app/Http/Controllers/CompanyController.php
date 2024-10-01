<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('tasks.user')->get();

        return response()->json($companies);
        /* return Company::all(); */

    }
}

