@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/month.css" type="text/css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<title>Timecard - MONTH</title>
  <h1 class="bg-secondary mb-1">> MONTH</h1>

  <div class="container">

    <h3 class="my-3"> {{-- select box--}}
      {{$currentDate->year}}年{{$currentDate->month}}月
    </h3>

    <table class="table table-bordered">
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
            {{ $date->day }}
            <br>
            {{-- 勤務時間 --}}
            @foreach($works as $work)
            @if ($date->day == \Carbon\Carbon::parse($work->date)->format('d'))
            <div class="text-center">
              {{$work->start}}
            </div>
            <br>
            <div class="text-center">~</div>
            <br>
            <div class="text-center">
              {{$work->end}}
            </div>
            <br>

            {{-- 編集ボタン --}}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
              Edit
            </button>

            {{-- 編集Modal --}}
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby ="editModal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">

                  <div class="modal-header">
                    {{$date}}
                  </div>

                  <form action="/month">
                    <div class="modal-body">
                      <div class="row">
                        <label for="in" class="text-light bg-danger col">IN</label>
                        <input type="time" id="in" class="col" value="{{$work->start}}">
                      </div>
                      <div class="row">
                        <label for="out" class="text-light bg-primary col">OUT</label>
                        <input type="time" id="out" class="col" value="{{$work->end}}">
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button class="btn btn-secondary" data-dismiss="modal">Cannsel</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>

            @endif
            @endforeach
          </td>
        @if ($date->dayOfWeek == 6)
        </tr>
        @endif
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- Nab Bar --}}
  <ul class="nav nav-fill bg-secondary text-light justify-content-center fixed-bottom">
    <li class="nav-item border-right active">
      <a href="/home" class="nav-link">HOME</a>
      <i class="fas fa-home"></i>
    </li>
    <li class="nav-item border-right">
      <a href="year" class="nav-link">YEAR</a>
      <i class="fas fa-calendar-alt"></i>
    </li>
    <li class="nav-item border-right">
      <a href="/month" class="nav-link active">MONTH</a>
      <i class="fas fa-calendar-minus"></i>
    </li>
    <li class="nav-item">
      <a href="/setting" class="nav-link">SETTING</a>
      <i class="fas fa-cog"></i>
    </li>
  </ul>
@endsection