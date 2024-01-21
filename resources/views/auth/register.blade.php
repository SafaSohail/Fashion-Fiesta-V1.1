@extends('layouts.auth')

@section('content')
<h1>Register</h1>
<p class="account-subtitle">Access to our dashboard</p>

<!-- Form -->
<form action="{{route('admin.register')}}" method="POST">
	@csrf
	<div class="form-group">
		<input class="form-control" name="name" type="text" value="{{old('name')}}" placeholder="Full Name">
	</div>
	<div class="form-group">
		<input class="form-control" name="email" type="text" value="{{old('email')}}" placeholder="Email">
	</div>
	<div class="form-group">
		<input class="form-control" name="password" type="password" placeholder="Password">
	</div>
	<div class="form-group">
		<input class="form-control" name="password_confirmation" type="password" placeholder="Confirm Password">
	</div>
    <div class="form-group">
        <label for="security_question">Select Security Question:</label>
        <select class="form-control" id="security_question" name="security_question">
            <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
            <option value="What city were you born in?">What city were you born in?</option>
            <option value="What is the name of your first pet?">What is the name of your first pet?</option>
            <option value="What is your favorite movie?">What is your favorite movie?</option>
        </select>
    </div>
    <div class="form-group">
        <input class="form-control" name="security_answer" type="text" placeholder="Security Answer">
    </div>
	<div class="form-group">
        <select class="form-control" name="role" id="role">
            <option value="0">Select Role</option>
            <option value="tailor">Tailor</option>
            <option value="user">User</option>
        </select>
    </div>
	<div class="form-group mb-0">
		<button class="btn btn-primary btn-block" type="submit">Register</button>
	</div>
</form>
<!-- /Form -->
								
<div class="text-center dont-have">Already have an account? <a href="{{route('admin.login')}}">Login</a></div>
@endsection


