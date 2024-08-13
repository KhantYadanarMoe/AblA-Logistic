@extends('layouts.app')

@section('auth')

<form method="POST" action="{{ route('register') }}">
    @csrf
    <h2>SignUp</h2>
    <div class="input-field">
      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
      <label for="name">Enter your name</label>
    </div>
    

    <div class="input-field">
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
      <label for="email">Enter your email</label>
    </div>
    

    <div class="input-field">
        
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      <label for="password">Enter Password</label>
    </div>
    

    <div class="input-field">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        <label for="password-confirm">Enter Password Again</label>
        
      </div>

      @error('name')
      <span style="margin: 0;  font-size:13px; color: red" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
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
    <button type="submit">Register</button>
    <div class="register">
      <p>Already have an account? <a href="/login">LogIn</a></p>
    </div>
</form>
@endsection
