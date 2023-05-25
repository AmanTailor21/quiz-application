@extends('layouts.app')

@section('content')

<div class="container box">
  <h3 align="center">Attach Options</h3><br />
  @if(isset(Auth::user()->email))
    <script>window.location="/main/successlogin";</script>
  @endif
  @if ($message = Session::get('success'))
  <div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif
    <form method="post" action="{{ url('storeOptions') }}">
    {{ csrf_field() }}
        <div class="form-group">
            <label>Select Questions</label>
            <select class="form-control questions-drop-down" name="question">
                <option>-Select Question-</option>
            </select>
            <label>Enter Options A</label>
            <input type="text" name="option_1" class="form-control" />
            <label>Enter Options B</label>
            <input type="text" name="option_2" class="form-control" />
            <label>Enter Options C</label>
            <input type="text" name="option_3" class="form-control" />
            <label>Enter Options D</label>
            <input type="text" name="option_4" class="form-control" />
        </div>
        <div class="form-group">
            <input type="submit" name="Add" class="btn btn-primary"/>
        </div>
    </form>
  </div>
 </body>
</html>
<script>
    $.ajax({
        url: 'fetchQuestions',
        type: 'get',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
            if(response.length != 0){
                $.each(response, function(k, v) {
                  if(v.options.length == 0){
                    $(".questions-drop-down").append('<option class="currency-symbol" value='+v.question_id+'>'+v.question+'</option>');
                  }
                });
            }
        }
    });
</script>

@endsection