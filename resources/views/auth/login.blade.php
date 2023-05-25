@extends('layouts.app')

@section('content')
  <div class="container box">
  <h3 align="center">{{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</h3><br />
   
  @if(isset(Auth::user()->email))
  <script>window.location="/main/successlogin";</script>
  @endif

  @if ($message = Session::get('success'))
  <div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  @endif

  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

    @isset($url)
      <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
    @else
      <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
    @endisset
        @csrf

        <div class="form-group">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">
              {{ __('Login') }}
            </button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
@endsection
