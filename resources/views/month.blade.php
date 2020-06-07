@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/month.css" type="text/css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<title>Timecard - MONTH</title>
  <h1 class="bg-secondary mb-1">> MONTH</h1>

  <div class="container">

    <h3 class="my-3">
      {{$currentDate->year}}年
      {{$currentDate->month}}月
    </h3>

    {{-- 残業時間 --}}
      <div>
        {{$totalOverTime}}
      </div>

    {{-- 年月選択 --}}
    <select name="selectYm" onChange="location.href=value;">
      @foreach ($selectYm as $select)
      @if($select == $currentDate->format('Y-m'))
        <option selected value="/month?target={{$select}}">{{$select}}</option>
      @else
        <option value="/month?target={{$select}}">{{$select}}</option>
      @endif
      @endforeach
    </select>

    {{-- スマホの場合 --}}
    @foreach($dates as $date)
      <div class="row d-sm-none">
        @foreach($works as $work)
            @if ($date->month == \Carbon\Carbon::parse($work->date)->format('m') &&
                  $date->day == \Carbon\Carbon::parse($work->date)->format('d'))

            <div class="col">
              {{\Carbon\Carbon::parse($work->date)->format('j')}}
              {{$work->start}}~{{$work->end}}
              <button type="button" class="btn btn-primary btn-sm ml-1 " onclick="location.href='./edit/{{$work->id}}'">
                Edit
              </button>
            </div>
            @endif
            @endforeach
      </div>
    @endforeach

    <table class="table table-bordered d-none d-sm-table">
      {{-- 曜日 --}}
      <thead>
        <tr class="text-center">
          @foreach (['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $dayOfWeek)
            <th>{{$dayOfWeek}}</th>
          @endforeach
        </tr>
      </thead>

      <tbody>
        @foreach ($dates as $date)
        @if ($date->dayOfWeek == 0)
        <tr>
        @endif
          <td
            @if ($date->month != $currentDate->month)
            class="bg-secondary"
            @endif
          >
            {{ $date->day }} {{-- セル内の日付--}}
            <br>
            {{-- 勤務時間 --}}
            @foreach($works as $work)
            @if ($date->month == \Carbon\Carbon::parse($work->date)->format('m') &&
                  $date->day == \Carbon\Carbon::parse($work->date)->format('d'))

            <div class="text-center text-dark"> {{$work->start}} </div>
            <br>
            <div class="text-center text-dark"> ~ </div>
            <br>
            <div class="text-center text-dark">
              {{$work->end}}
            </div>
            <br>

            <button type="button" class="btn btn-primary col mr-1" onclick="location.href='./edit/{{$work->id}}'">
              Edit
            </button>

            @endif
            @endforeach

          </td>

        {{-- 土曜日なら改行 --}}
        @if ($date->dayOfWeek == 6)
        </tr>
        @endif
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- Nab Bar --}}
  <ul class="nav nav-fill bg-secondary justify-content-center fixed-bottom">
    <li class="nav-item border-right">
      <a href="/home" class="nav-link text-light">HOME</a>
      <i class="fas fa-home"></i>
    </li>
    <li class="nav-item border-right">
      <a href="/month" class="nav-link active text-light">MONTH</a>
      <i class="fas fa-calendar-minus"></i>
    </li>
    <li class="nav-item">
      <a href="/setting" class="nav-link text-light">SETTING</a>
      <i class="fas fa-cog"></i>
    </li>
  </ul>
@endsection