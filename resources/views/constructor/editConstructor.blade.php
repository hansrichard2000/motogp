@extends('layouts.html')

@section('judul')
    Edit Constructor
@endsection

@section('content')
<div class="container mt-5">
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
                    <li><a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a></li>
                    <li><a class="nav-link" href="/rider">Rider List</a></li>
                    <li><a class="nav-link" href="/team">Teams List</a></li>
                    <li><a class="nav-link active" href="/constructor">Constructor List</a></li>
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
    <h2 class="text-light graduate">Edit Constructor</h2>
    <form action="{{route('constructor.update', $constructor)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="name" class="text-light">Constructor's Name :</label>
            <input type="text" value="{{$constructor->name}}" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="nation" class="text-light">Nation :</label>
            <input type="text" value="{{$constructor->nation}}" class="nation" id="nation" name="nation" required>
        </div>
        <div class="form-group">
            <label for="engine" class="text-light">Engine :</label>
            <input type="text" value="{{$constructor->engine}}" class="engine" id="engine" name="engine" required>
        </div>
        <div class="form-group">
            <label for="description" class="text-light">Description</label>
            <textarea class="form-control" id="description" name="description">{{$constructor->description}}</textarea>
        </div>
        <div class="form-group">
            <label form="logo" class="text-light">Upload Logo</label>
            <input type="file" class="form-control-file text-light" id="logo" name="logo">
        </div>
        <input type="hidden" name="updated_by" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
        <input class="btn btn-primary" type="submit" id="submit" name="submit" value="Submit">
    </form>
</div>
@endsection
