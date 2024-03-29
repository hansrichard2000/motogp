@extends('layouts.html')

@section('judul')
    Rider List
@endsection

@section('content')
<nav class="navbar navbar-expand-lg fixed-top text-light navbar-dark bg-danger shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('images/motogp-white-logo.svg')}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto text-white">
                <li><a class="nav-link" href="/">Home</a></li>
                <li><a class="nav-link active" href="/rider">Rider List</a></li>
                <li><a class="nav-link" href="/team">Teams List</a></li>
                <li><a class="nav-link" href="/constructor">Constructor List</a></li>
                @auth<li><a class="nav-link" href="/user">Users List</a></li>@endauth
                <li><a class="nav-link" href="/author">Website Maker</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<br><br><br>
<div class="container mt-5">
    <div class="row">
        <div class="col text-bold text-light text-left">
            <h1 class="graduate">Rider List</h1>
        </div>
    </div>
    @auth
    <form method="GET" action="{{route('rider.create')}}">
        <button class="btn btn-primary float-right mt-n4 mr-lg-5" href="{{route('rider.create')}}">
                Add
        </button>
    </form>
    @endauth
    <div class="row">
        <div class="col">
            <hr class="linered">
        </div>
    </div>
    @foreach ($riders->Chunk(4) as $riderChunk)
        <div class="row">
            @foreach ($riderChunk as $rider)
                <div class="col mt-4">
{{--                    {{dd($rider->group)}}--}}
                    <div class="card text-light text-left kartuRider">
                        <img class="gambarRider" src="/images/rider/{{$rider->picture}}" alt="Card image cap">
                        <div class="row">
                            <div class="col">
                                <ul type="none">
                                    <li><img class="flag" src="/images/flag/{{$rider->flag}}" alt="Card image cap"></li>
                                    <li><strong>{{$rider->name}}</strong></li>
                                    <li>{{$rider->group->name}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                @auth
                                <form action="{{route('rider.destroy', $rider)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input class="btn btn-danger float-left" type="submit" value="Delete" id="more" name="more">
                                </form>
                                @endauth
                            </div>
                            <div class="col">
                                <form action="/rider/{{$rider->id}}" method="GET">
                                    <input class="btn btn-primary float-right" type="submit" value="More" id="more" name="more">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
