<?php

namespace App\Http\Controllers;

use App\Models\Result;

class ResultController extends Controller
{
    public function getAll(){
        $results = Result::paginate(config('services.calculation.pagination_per_page'));
        return view('results', compact('results'));
    }
}
