@extends('layouts.auth')

@section('content')
<div style="display: flex;justify-content: center;">
    <h1 class="card-header">Dashboard</h1>
  </div>
  <div style="display: flex;justify-content: center;">
    <div>
      <div><a href="{{ route('addQuestions') }}">Add Questions</a></div></br>
      <div><a href="{{ route('addOptions') }}">Attached Options</a></div></br>
      <div><a href="{{ route('addAnswer') }}">Attached Answer</a></div></br>
    </div>
  </div>

@endsection