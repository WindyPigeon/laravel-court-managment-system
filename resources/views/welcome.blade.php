@extends('layouts.app')

@section('content')
<div class="container">
    <div class=jumbotron>
        <h1 class="display-4">Welcome to BBCourt</h1>
        <h2 class="display-6">a sport court management system</h2>
        <p class="lead">Manage your court reservation with BBCourt.</p>
        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Join us</a>
        </p>
    </div>
</div>
@endsection
