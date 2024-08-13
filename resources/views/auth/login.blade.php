@extends('layouts.app')

@section('auth')


<form method="POST" action="{{ route('login') }}">
    @csrf
    <h2>Login</h2>
    <div class="input-field">
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      
      <label for="email">Enter your email</label>
    </div>
    <div class="input-field">
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
      
      <label for="password">Enter your password</label>
    </div>
    <div class="forget">
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">Forgot password?</a>
        @endif
    </div>
    @error('email')
    <span style="margin: 0;  font-size:13px; color: red" role="alert">
      <strong>{{ $message }}</strong>
  </span>
      @enderror 
      @error('password')
      <span style="margin: 0;  font-size:13px; color: red" role="alert">
        <strong>{{ $message }}</strong>
    </span>
      @enderror
    <button type="submit">Log In</button>
    <div class="register">
      <p>Don't have an account? <a href="/register">Register</a></p>
    </div>
  </form>
@endsection
