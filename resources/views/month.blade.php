@extends('layouts.app')

@section('content')
  <h1 class="bg-secondary mb-1">> MONTH</h1>

  {{-- カレンダーみたいにする --}}
  <ul>
    @foreach($works as $work)
      <li>{{$work->start}}~{{$work->end}}</li>
    @endforeach
  </ul>
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