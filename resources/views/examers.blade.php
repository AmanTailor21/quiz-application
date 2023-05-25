@extends('layouts.app')

@section('content')
  <div class="container box">
  <div class="alert alert-info alert-block" style="margin-top: 10px;">
    <strong>Note: The question will be change after 60 Seconds</strong>
  </div>
  <div class="form-group start-question-group">
    <div align="center">
      <h3 class="title" style="display: none;">Quiz is Fineshed</h3>
      <button type="submit" class="btn btn-primary next-question">
        Start Quiz
      </button>
    </div><br/>
  </div>
  <div class="question-qroup">
    <div class="form-group">
      <h4 class="question"></h4>
      <div class="options"></div>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary next next-question" style="display: none;">
        Next
      </button>
    </div>
  </div>
</div>
  <script>
    $(document).ready(function() {
      var questionIndex = 0;
      var timer;

      $(document).on("click",".next-question",function() {
        $(".start-question-group").hide();
        $(".question-qroup").show();
        changeQuestion();
      });

      function changeQuestion() {
        clearInterval(timer);
        questionIndex++;

        $.ajax({
          url: '/quiz/' + questionIndex,
          method: 'GET',
          success: function(response) {
              if(response != ''){
                $('.question').text('');
                $('.options').text('');
                $('.question').text(response.question);
                $.each(response.options, function(i, v) {
                  $('.options').append('<input type="radio" id='+v.options_id+' name="fav_language" value="HTML">'
                                          +'<label val='+v.options_id+' for='+v.options_id+'>'+v.options+'</label><br>'
                                      );
                });
                $(".next.next-question").show();
              startTimer();
              }else{
                $(".title").show();
                $(".next.next-question").hide();
              }
          }
        });
      }
      // Function to start the timer
      function startTimer() {
        timer = setInterval(changeQuestion, 60000); // 60 seconds
      }

      // Call the startTimer function on page load
      $(document).ready(function() {
        startTimer();
      });
    });
</script>
@endsection