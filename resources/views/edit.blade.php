@extends('layouts.app')

@section('content')
  <h1 class="bg-secondary mb-1">> MONTH -EDIT</h1>

  <div class="container">
    <?php{{$work->date = \Carbon\Carbon::parse($work->date)->format('Y_n/j(D)')}}?>
    <h2> {{$work->date}} </h2>

    <form action="/edit/{{$work->id}}" method="post">
      @csrf
      {{-- in --}}
      <div class="form-group">
        <label for="in" class="bg-danger rounded text-light">IN</label>
        <input type="time" id="in" name="start" class="form-contorller" value="{{$work->start}}">
      </div>
      {{-- out --}}
      <div class="form-group">
        <label for="out" class="bg-primary rounded text-light">OUT</label>
        <input type="time" id="out" name="end" class="form-controller" value="{{$work->end}}">
      </div>
      {{-- break --}}
      <div class="form-group">
        <label for="break" class="bg-success rounded text-light">BREAK</label>
        <input type="time" id="break" name="break" class="form-controller" value="{{$work->break}}">
      </div>

      <button type="submit">SAVE</button>
    </form>
  </div>

  {{-- Nab Bar --}}
  <ul class="nav nav-fill bg-secondary justify-content-center fixed-bottom">
    <li class="nav-item border-right">
      <a href="/home" class="nav-link text-light">HOME</a>
      <i class="fas fa-home"></i>
    </li>
    <li class="nav-item border-right">
      <a href="/month" class="nav-link text-light">MONTH</a>
      <i class="fas fa-calendar-minus"></i>
    </li>
    <li class="nav-item">
      <a href="/setting" class="nav-link text-light">SETTING</a>
      <i class="fas fa-cog"></i>
    </li>
  </ul>

@endsection