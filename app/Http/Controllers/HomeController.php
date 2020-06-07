<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\Setting;
use Carbon\Carbon;
use stdClass;

class HomeController extends Controller
{
    public function index() {
        // $date = date("Y/n/d (D)");
        $date = Carbon::now()->format('Y-m-d');
        $setting = $this->getSetting();
        if ($setting == null) {
            $setting = new stdClass();
            $setting->start = "08:00";
            $setting->end = "17:00";
            $setting->break = "01:00";
        }
        return view('home', ['date'=>$date, 'setting'=>$setting]);
    }
    // 出勤時間記録
    public function input(Request $request) {
        Work::create([
            'date' => $request->date,
            'start' => $request->start,
            'end' => $request->end,
            'break' => $request->break
        ]);
        return redirect('/month');
    }

    // settingテーブルから取得
    private function getSetting(){
        $setting = Setting::first();
        return $setting;
    }
}