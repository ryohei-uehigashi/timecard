@extends('layouts.app')

@section('content')
  <h1 class="bg-secondary mb-4">> HOME</h1>

  <div class="container">
    <input type="date" value="{{$date}}">
    <form action="/home" method="post">
      @csrf
      {{-- start --}}
      <div class="row mt-3 mb-2">
        <label class="col-3 bg-danger rounded text-white">IN</label>
        <input type="time" id="start" name="start" class="col-8 offset-1" value="{{$setting->start}}">
      </div>
    
      {{-- end --}}
      <div class="row">
        <label class="col-3 rounded bg-primary text-white mb-2">OUT</label>
        <input type="time" id="end" name="end" class="col-8 offset-1" value="{{$setting->end}}">
      </div>

      {{-- break --}}
      <div class="row mt-3">
        <label class="col-3 rounded bg-success text-white">BREAK</label>
        <input type="time" id="break" name="break" class="col-8 offset-1" value="{{$setting->break}}">
      </div>
      
      <button type="submit" class="btn btn-primary btn-lg">OK</button>
    </form>
    {{-- startとendは別のフォームにしたい --}}

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
      <a href="/month" class="nav-link">MONTH</a>
      <i class="fas fa-calendar-minus"></i>
    </li>
    <li class="nav-item">
      <a href="/setting" class="nav-link">SETTING</a>
      <i class="fas fa-cog"></i>
    </li>
  </ul>

@endsection