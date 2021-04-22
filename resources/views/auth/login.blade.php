@extends('layouts.app')

@section('title', 'Login')

@section('content')
  <h2>Login Form</h2>

  <form action="/login" method="POST">
      @csrf
      <div class="form-group">
        <label for="post-email">Email</label>
        <input 
          name="email" 
          id="post-email" 
          type="email"
          required 
          class="form-control @error('email')is-invalid @enderror" 
          placeholder="Enter email"
          >
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="post-password">Password</label>
        <input 
          name="password" 
          id="post-password" 
          type="password" 
          required
          class="form-control @error('password')is-invalid @enderror" 
          placeholder="Enter password"
          >
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      @if ($invalid_credentials ?? false)
        <div class="alert alert-danger">Invalid credentials</div>
      @endif
      <button type="submit" class="btn btn-primary">Login</button>
  </form>
@endsection