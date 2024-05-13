@extends('layout.main')
@section('content')
    @csrf
    @method('post')
<div>
    <h1>Authentication Status</h1>
    <p>{{ $status }}</p> <!-- Отображение статуса аутентификации -->

    @if($status == 'Authentificated')
        <p>Welcome, you are logged in!</p>
    @else
        <p>You are not logged in. Please <a href="/login">login</a> or <a href="/register">register</a>.</p>
    @endif

    <a href="{{ route('logout') }}" class="btn btn-primary mb-3">Logout</a>
</div>
@endsection
