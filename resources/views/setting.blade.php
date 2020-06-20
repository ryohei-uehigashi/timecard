@extends('layouts.app')

@section('content')
  {{-- Header --}}
  <nav class="navbar navbar-light bg-secondary">
    <span class="navbar-brand h1">> SETTING</span>
  </nav>

  <div class="container">
    <form action="/setting" method="post">
      @csrf

      {{-- 定時設定 --}}
      <h3>◆定時</h3>
      <div class="row mb-4">
        <input type="time" id="start" name="start" class="bg-danger" value="{{$setting->start}}">
        <p>~</p>
        <input type="time" id="end" name="end" class="bg-primary" value="{{$setting->end}}">
      </div>

      {{-- 休憩時間設定 --}}
      <h3>◆休憩</h3>
      <input type="time" id="break" name="break" value="{{$setting->break}}" class="border-bottom mb-4">

      <button class="btn btn-primary btn-lg">SAVE</button>
    </form>
  </div>

  {{-- Nab Bar --}}
  <ul class="nav nav-fill bg-secondary text-light justify-content-center fixed-bottom">
    <li class="nav-item border-right">
      <a href="/home" class="nav-link">HOME</a>
      <i class="fas fa-home"></i>
    </li>
    <li class="nav-item border-right">
      <a href="/month" class="nav-link">MONTH</a>
      <i class="fas fa-calendar-minus"></i>
    </li>
    <li class="nav-item">
      <a href="/setting" class="nav-link active">SETTING</a>
      <i class="fas fa-cog"></i>
    </li>
  </ul>
@endsection