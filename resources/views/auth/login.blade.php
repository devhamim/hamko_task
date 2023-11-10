@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Login</button>
        </form>
    </div>
</div>
@endsection
