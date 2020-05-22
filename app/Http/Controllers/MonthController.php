<?php

namespace App\Http\Controllers;

use App\Work;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MonthController extends Controller
{
    public function getCalendarDates(Request $request)
    {
        // whereで月ごとに絞り込
        // ymをyear,month
        $currentDate = new Carbon();
        $firstDay = Carbon::now()->firstOfMonth();
        // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
        // $addDay = 0 or 7
        $addDay = ($firstDay->copy()->endOfMonth()->isSunday()) ? 7 : 0;
        $firstDay->subDay($firstDay->dayOfWeek);
        // 同上。右下の隙間のための計算。
        $count = 31 + $addDay + $firstDay->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        $works = Work::where('date','>=',$firstDay->format('Y-m-d'))
            ->where('date','<',$firstDay->copy()->addDay($count))->get();
        for ($i = 0; $i < $count; $i++, $firstDay->addDay()) {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $firstDay->copy(); //参照渡し、物の場所が渡される
        }

        return view('month', [
            'firstDay'=>$firstDay,
            'dates'=>$dates,
            'works'=>$works,
            'currentDate'=>$currentDate,
            'firstDay'=>$firstDay
        ]);

    }
}