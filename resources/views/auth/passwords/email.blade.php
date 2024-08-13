@extends('layouts.app')

@section('auth')


@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <h2>Reset Password</h2>
    <div class="input-field">
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      <label for="email">Enter your email</label>
    </div>

    <button type="submit">Send Password Reset Link</button>
  </form>
@endsection
