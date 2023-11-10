@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app">
        <h1>ChatGPT Result</h1>
        <div>
            <strong>Response:</strong>
            <p>{{ $chatGptResponse['result'] }}</p>
        </div>
    </div>
</div>
@endsection
