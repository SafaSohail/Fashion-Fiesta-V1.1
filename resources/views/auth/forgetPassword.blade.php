@extends('layouts.auth')

@section('content')
<h1>Forgot Password?</h1>
<p class="account-subtitle">Enter your email and select a security question to reset your password</p>

<!-- Form -->
<form action="{{ route('forget.password.post') }}" method="post">
    @csrf
    <div class="form-group">
        <input class="form-control" name="email" type="text" placeholder="Email">
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
        <label>Enter New Password</label>
        <input class="form-control" name="password" type="password" placeholder="Enter New Password">
    </div>
    <div class="form-group mb-0">
        <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
    </div>
</form>
<!-- /Form -->

<div class="text-center dont-have">Remember your password? <a href="{{ route('admin.login') }}">Login</a></div>
@endsection