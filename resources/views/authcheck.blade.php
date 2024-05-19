@extends('layout.main')
@section('content')
    @csrf
    @method('post')
    <div class="container">

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <h1>Authentication Status</h1>
        <p>Status: {{ $status }}</p> <!-- Отображение статуса аутентификации -->

        @if($status == 'Authentificated')
            <p>Welcome, <span class="fw-bold text-primary">{{ Auth::user()->name }}</span>! You are logged in!</p>

        @else
            <p>Dear guest, you are not logged in. Please <a href="/login">login</a> or <a href="/register">register</a>.
            </p>
        @endif



        @if($status == 'Authentificated')
            <a>You can logout by press to the button </a>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        @else
            <a>You are Guest </a>
        @endif


    </div>
@endsection
