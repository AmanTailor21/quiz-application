@extends('layouts.app')

@section('content')

  <div class="container box">
  <h3 align="center">Add Questions</h3><br />
  @if(isset(Auth::user()->email))
    <script>window.location="/main/successlogin";</script>
  @endif
  @if ($message = Session::get('success'))
    <div class="alert alert-info alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
  @endif
  <form method="post" action="{{ url('/storeQuestions') }}">
  {{ csrf_field() }}
      <div class="form-group">
          <label>Enter Questions</label>
          <input type="text" name="questions" class="form-control" />
      </div>
      <div class="form-group">
          <input type="submit" name="Add" class="btn btn-primary"/>
      </div>
  </form>

@endsection