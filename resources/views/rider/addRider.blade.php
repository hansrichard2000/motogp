@extends('layouts.html')

@section('judul')
    Add Rider
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
                <li><a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a></li>
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
    <h2 class="text-light graduate">Add Rider</h2>
    <form action="{{route('rider.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row row-cols-2">
            <div class="col">
                <div class="form-group">
                    <label for="name" class="text-light">Rider's Name :</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="number" class="text-light">Race Number :</label>
                    <input type="number" class="form-control" id="number" name="number" required>
                </div>
            </div>
        </div>
        <div class="row row-cols-2">
            <div class="col">
                <label for="team" class="text-light">Rider's Team :</label>
                <div class="form-group">
                    <select name="team" class="custom-select">
                        @foreach ($teams as $team)
                            <option value="{{$team->id}}">{{$team->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="engine" class="text-light">Rider's Constructor :</label>
                <div class="form-group">
                    <select name="engine" class="custom-select">
                        @foreach ($constructors as $constructor)
                            <option value="{{$constructor->id}}">{{$constructor->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="nation" class="text-light">Nation :</label>
            <input type="text" class="form-control" id="nation" name="nation" required>
        </div>
        <div class="row row-cols-2">
            <div class="col">
                <div class="form-group">
                    <label for="date" class="text-light">Date of Birth :</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="place" class="text-light">Place of Birth :</label>
                    <input type="text" class="form-control" id="place" name="place">
                </div>
            </div>
        </div>
        <div class="row row-cols-2">
            <div class="col">
                <div class="form-group">
                    <label for="height" class="text-light">Heigth (cm):</label>
                    <input type="number" class="form-control" id="height" name="height">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="weight" class="text-light">Weigth (kg):</label>
                    <input type="number" class="form-control" id="weight" name="weight">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="podiums" class="text-light">Podiums:</label>
            <input type="number" class="form-control" id="podiums" name="podiums">
        </div>
        <div class="form-group">
            <label for="wins" class="text-light">Wins :</label>
            <input type="number" class="form-control" id="wins" name="wins">
        </div>
        <div class="form-group">
            <label for="title" class="text-light">World Championship Title:</label>
            <input type="number" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="description" class="text-light">Description : </label>
            <textarea rows="4" class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label form="picture" class="text-light">Rider's Picture</label>
            <input type="file" class="form-control-file text-light" id="picture" name="picture">
        </div>
        <div class="form-group">
            <label form="flag" class="text-light">Nation Flag</label>
            <input type="file" class="form-control-file text-light" id="flag" name="flag">
        </div>
        <input class="btn btn-primary" type="submit" id="submit" name="submit" value="Submit">
    </form>
</div>
@endsection
