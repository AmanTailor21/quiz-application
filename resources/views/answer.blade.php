@extends('layouts.app')

@section('content')

  <div class="container box">
   <h3 align="center">Attach Answer</h3><br />
   @if(isset(Auth::user()->email))
    <script>window.location="/main/successlogin";</script>
   @endif
   @if ($message = Session::get('success'))
   <div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif
    <form method="post" action="{{ url('storeAnswer') }}">
    {{ csrf_field() }}
        <div class="form-group">
            <label>Select Questions</label>
            <select class="form-control questions-drop-down" name="question">
                <option>-Select Question-</option>
            </select>
            <label>Select Answer</label>
            <select class="form-control answer-drop-down" name="answer">
                <option>-Select Answer-</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="Add" class="btn btn-primary"/>
        </div>
    </form>
<script>
    $.ajax({
        url: 'fetchQuestions',
        type: 'get',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
            console.log(response);
            if(response.length != 0){
                $.each(response, function(k, v) {
                    $(".questions-drop-down").append('<option class="currency-symbol" value='+v.question_id+'>'+v.question+'</option>');
                });
            }
        }
    });
$('.questions-drop-down').on("change",function(){
    $question_id = $(this).val();
    $.ajax({
        url: 'fetchOptions',
        type: 'get',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            'question_id' : $question_id
        },
        success: function(response){
            if(response.length > 0){
                $.each(response, function(k, v) {
                    $(".answer-drop-down").append('<option class="currency-symbol" value='+v.options_id+'>'+v.options+'</option>');
                });
            }else{
                $(".answer-drop-down").html('');
            }
        }
    });
});
</script>

@endsection