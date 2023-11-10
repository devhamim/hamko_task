@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app">
        <h1>Register</h1>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
            <br>
            <button type="submit">Register</button>
        </form>
    </div>
</div>
@endsection
