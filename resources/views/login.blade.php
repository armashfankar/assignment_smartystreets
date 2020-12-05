@extends('app_layout')
@section('title')
User Login
@stop
@section('content')
<div class="login user-form">
	<form method="POST" action="{{ route('login') }}">
		@csrf
		<h2>User Login</h2>
		<p>Please fill in this form to log into your account!</p>
		<hr>
        <div class="form-group">
			<label>Email Address<sup class="text-danger">*</sup></label>
			<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email') }}" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="input valid email">
			@error('email')
				<div class="text-danger">{{ $message }}</div>
			@enderror
        </div>
		<div class="form-group">
			<label for="password">Password<sup class="text-danger">*</sup></label>
			<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required pattern=".{8,}" title="8 characters minimum">
			@error('password')
				<div class="text-danger">{{ $message }}</div>
			@enderror
        </div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Login</button>
        </div>
    </form>
	<div class="text-center">Don't have an account? <a href="{{ route('signup') }}">Signup here</a></div>
</div>
@stop
