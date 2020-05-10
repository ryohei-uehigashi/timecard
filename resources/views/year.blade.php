@extends('layouts.app')

@section('content')
  <h1 class="bg-secondary mb-1">> HOME</h1>

  @foreach($works as $work)
    <a href="/month/{{$work->date}}">{{$work->date}}</a>
  @endforeach
  {{-- Nab Bar --}}
  <ul class="nav nav-fill bg-secondary text-light justify-content-center fixed-bottom">
    <li class="nav-item border-right">
      <a href="/home" class="nav-link">HOME</a>
      <i class="fas fa-home"></i>
    </li>
    <li class="nav-item border-right">
      <a href="year" class="nav-link active">YEAR</a>
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