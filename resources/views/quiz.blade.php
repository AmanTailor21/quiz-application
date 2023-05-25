@extends('layouts.app')

@section('content')
  <div class="container box">
  <h3 align="center">Your Quiz</h3><br />
  <div class="form-group">
    <h4>What is name<h4>
  </div>
  <div class="form-group">
      <input type="radio" id="age1" name="age" value="30">
      <label for="age1">0 - 30</label><br>
      <input type="radio" id="age2" name="age" value="60">
      <label for="age2">31 - 60</label><br>  
      <input type="radio" id="age3" name="age" value="100">
      <label for="age3">61 - 100</label><br><br>
  </div>
  <div class="form-group">
      <button type="submit" class="btn btn-primary">
        Next
      </button>
  </div>
    
@endsection


