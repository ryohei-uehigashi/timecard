@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/month.css" type="text/css">
  <h1 class="bg-secondary mb-1">> MONTH</h1>

  {{-- カレンダーみたいにする --}}
  {{-- <a href="/month/{{$work->}}"></a> --}}

  <div class="container">
    <h3><a>&lt;</a>&nbsp;&nbsp;2020年5月&nbsp;&nbsp;<a>&gt;</a></h3>

  <table class="table table-bordered">
    <tr class="text-center">
      <th class="text-danger">Sun</th>
      <th>Mon</th>
      <th>Tue</th>
      <th>Wed</th>
      <th>Thu</th>
      <th>Fri</th>
      <th class="text-primary">Sat</th>
    </tr>
    <tr>
      <td>1</td>
      <td>2</td>
      <td>3</td>
      <td>4</td>
      <td>5</td>
      <td>6</td>
      <td>7</td>
    </tr><tr>
      <td>8</td>
      <td>9</td>
      <td>10</td>
      <td>11</td>
      <td>12</td>
      <td>13</td>
      <td>14</td>
    </tr><tr>
      <td>15</td>
      <td>16</td>
      <td>17</td>
      <td>18</td>
      <td>19</td>
      <td>20</td>
      <td>21</td>
    </tr><tr>
      <td>22</td>
      <td>23</td>
      <td>24</td>
      <td>25</td>
      <td>26</td>
      <td>27</td>
      <td>28</td>
    </tr><tr>
      <td>29</td>
      <td>30</td>
      <td>31</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </table>
  </div>
  
  <ul>
    @foreach($works as $work)
      <li>{{$work->date}} {{$work->start}}~{{$work->end}}</li>
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