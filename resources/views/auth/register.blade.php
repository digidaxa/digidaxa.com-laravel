@extends('layouts.auth')

@section('container')
<div class="row">
  <div class="col-lg-12">
    <div class="p-5">
      <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
      </div>
      <form class="user" action="{{ '/register' }}" method="post">
        @csrf
        <div class="form-group">
          <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" id="name" placeholder="Full Name" required value="{{ old('name')}}">
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <input type="username" class="form-control form-control-user @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" required value="{{ old('username')}}">
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
              </div>
            @enderror
        </div>
        <div class="form-group">
          <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email Address" required value="{{ old('email')}}">
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
              </div>
            @enderror
        </div>
        <div class="form-group row">
          <div class="col-md-6 mb-3 mb-md-0">
            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-6">
            <input type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="RepeatPassword" placeholder="Repeat Password" required>
            @error('password_confirmation')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
          Register Account
        </button>
      </form>
      <hr>
      <div class="text-center">
        <a class="small" href="{{ '/forgot-password' }}">Forgot Password?</a>
      </div>
      <div class="text-center">
        <a class="small" href="{{ '/login' }}">Already have an account? Login!</a>
      </div>
    </div>
  </div>
</div>
@endsection