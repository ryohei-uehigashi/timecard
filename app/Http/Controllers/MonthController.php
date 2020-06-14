<?php

namespace App\Http\Controllers;

use App\Work;
use App\Setting;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MonthController extends Controller
{
    public function getCalendarDates(Request $request)
    {
        // $selectYm : 年月の選択肢
        $selectYm =[];
        $allWorks = Work::get();
        foreach ($allWorks as $work) {
            $workYm = Carbon::parse($work->date)->format('Y-m');
            if (array_search($workYm,$selectYm) === false) {
                $selectYm[] = $workYm;
            }
        }

            // targetがあれば、$request->target なければ今の日付
        $selectMonth = $request->target ? Carbon::parse($request->target) : Carbon::now(); //選択した年月
        $currentDate = $selectMonth->copy();
        $firstDay = $selectMonth->copy()->firstOfMonth();

        // 設定から定時を設定
        $setting = Setting::first();
        $settingBreak = Carbon::parse('00:00:00')->diffInMinutes(Carbon::parse($setting->break));
        $settingWork = Carbon::parse($setting->start)->diffInMinutes($setting->end); //勤務開始から退勤まで何時間何分か
        $teiji = $settingWork - $settingBreak; //そこから休憩時間を引く

        // 今月の出勤、退勤、休憩を取得
        $works = Work::where('date','>=',$currentDate->firstOfMonth()->toDateString())
        ->where('date', '<=', $currentDate->lastOfMonth()->toDateString())->get();

        // 残業時間
        $totalOverTime = 0;
        $totalWorkTime = 0;
        foreach($works as $month) {
            $workStart = Carbon::parse($month->start);
            $workEnd = Carbon::parse($month->end);
            $break = Carbon::parse('00:00:00')->diffInMinutes(Carbon::parse($month->break));
            $workTime = $workStart->diffInMinutes($workEnd) - $break;
            $totalWorkTime += $workTime;
            if ($workTime > $teiji) {
                $totalOverTime += $workTime-$teiji;
            }
        }
        $overHour = floor($totalOverTime/60);
        $overMinute = $totalOverTime%60;

        // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
        // $addDay = 0 or 7
        $addDay = ($firstDay->copy()->endOfMonth()->isSunday()) ? 7 : 0;
        $firstDay->subDay($firstDay->dayOfWeek);
        // 同上。右下の隙間のための計算。
        $count = 31 + $addDay + $firstDay->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $firstDay->addDay()) {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $firstDay->copy(); //参照渡し、物の場所が渡される
        }

        return view('month', [
            'firstDay'=>$firstDay,
            'dates'=>$dates,
            'works'=>$works,
            'currentDate'=>$currentDate,
            'firstDay'=>$firstDay,
            'selectYm'=>$selectYm,
            'totalOverTime'=>$totalOverTime,
            'overHour'=>$overHour,
            'overMinute'=>$overMinute
        ]);
    }

    // 編集ページ
    public function edit(Request $request, $id){
        $work = Work::find($id);
        return view('edit', ['work' => $work]);
    }

    // 更新
    public function update(Request $request, $id) {
        $work = Work::find($id);
        $work->update([
            'start' => $request->start,
            'end' => $request->end,
            'break' => $request->break,
        ]);
        return redirect('/month');
        }

}