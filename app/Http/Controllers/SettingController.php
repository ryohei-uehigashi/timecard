<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function setting() {
        $setting = Setting::first();
        return view('setting', ['setting'=>$setting]);
    }
    
    // 設定を保存
    public function save(Request $request) {
        // テーブルを上書き保存
        $setting = Setting::firstOrNew(['id' => "1"]);
        $setting['start'] = $request->start;
        $setting['end'] = $request->end;
        $setting['break'] = $request->break;
        $setting->save();
        
        return redirect('/setting');
    }
}