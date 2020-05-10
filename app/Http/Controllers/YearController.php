<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;

class YearController extends Controller
{
    public function index() {
        $works = Work::get();
        return view('year', ['works'=>$works]);
    }
}