@extends('layouts.auth')

@section('container')
<div class="row">
  <div class="col-lg-12">
    <div class="p-5">
      <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
      </div>
      @if(session()->has('messageSuccess'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('messageSuccess') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      @if(session()->has('messageFailed'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('messageFailed') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <form class="user" action="/login" method="post">
        @csrf
        <div class="form-group">
          <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." autofocus required value="{{ old('email') }}">
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
          Login
        </button>
      </form>
      {{-- <hr>
      <div class="text-center">
        <a class="small" href="{{ '/register' }}">Create an Account!</a>
      </div> --}}
    </div>
  </div>
</div>
@endsection