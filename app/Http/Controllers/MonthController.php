<?php

namespace App\Http\Controllers;

use App\Work;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MonthController extends Controller
{
    public function index() {
    // whereで月ごとに絞り込み
    $works = Work::get();
    foreach ($works as $work) {
        $work->date = Carbon::parse($work->date)->format('n/j(D)');
        $work->start = Carbon::parse($work->start)->format('H:i');
        $work->end = Carbon::parse($work->end)->format('H:i');
    }
    return view('month', ['works'=>$works]);
    }
}
