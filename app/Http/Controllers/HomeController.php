<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\Setting;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index() {
        // $date = date("Y/n/d (D)");
        $date = Carbon::now()->format('Y-m-d');
        $setting = $this->getSetting();
        return view('home', ['date'=>$date, 'setting'=>$setting]);
    }
    // 出勤時間記録
    public function input(Request $request) {
        Work::create([
            'date' => $date=date("Y/n/d"),
            'start' => $request->start,
            'end' => $request->end,
            'break' => $request->break
        ]);
        return redirect('/home');
    }
    
    // settingテーブルから取得
    private function getSetting(){
        $setting = Setting::first();
        return $setting;
    }
}