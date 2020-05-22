<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class YearController extends Controller
{
    public function getCalendarDates(Request $request)
    {
        //今日
        $currentDate = Carbon::now();
        //月初め。20xx年xx月01日
        $firstDay = Carbon::now()->firstOfMonth();
        // 月終わり
        $lastDay = Carbon::now()->endOfMonth();

        return view('year', [
            'firstDay'=>$firstDay,
            'lastDay'=>$lastDay,
            'currentDate'=>$currentDate
        ]);

    }
}