<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <h1 class="display-4 mt-2 mb-1">DURAKIRAN BOOKS AND CDS STORE</h1>
        <hr>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item pe-3">
                            <a class="nav-link text-dark" href="{{route('welcome')}}">HOME</a> 
                        </li>
                        <li class="nav-item pe-3">
                            <a class="nav-link text-dark" href="{{route('book')}}">BOOKS</a> 
                        </li>
                        <li class="nav-item pe-3">
                            <a class="nav-link text-dark" href="{{route('cd')}}">CDS</a> 
                        </li>
                        <li class="nav-item pe-3">
                            <a class="nav-link text-dark" href="{{route('users.index')}}">USERS</a> 
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                         <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-dark" href="{{ route('logout') }}"
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

        <main class="py-4">
            @include('flashmessage')
            @yield('content')
        </main>
    </div>
</div>
<div class="container-fluid foot my-2">
    <div class="row">
        <div class="col-sm contact m-2">
                <h3 class="text-white my-2">Contact Us</h3>
            <div>
                <ul>
                    <li>Address: Budanilkantha-Kathmandu, Nepal</li>
                    <li> Phone no: 9845168773</li>
                    <li>Email: Keerandoora@gmail.com</li>
                </ul>
            </div>
            <div class="links">
                <a href="https://www.facebook.com/krian.dura" target="_blank">
                    <img src="images/fblink.png" class="fb ms-2 me-2">
                </a>
                <a href="https://www.youtube.com/channel/UCs7pSzcAtQqn1Lbf9T5NIMA" target="_blank">
                    <img src="images/youtubelink.png" class="youtube ms-3 me-3 ">
                </a>
                <a href="https://www.instagram.com/kirandura/" target="_blank">
                    <img src="images/instalink.jpg" class="insta ms-3 me-3">
                </a>
            </div>
        </div>
        <div class="col-sm m-2">
            <form class ="form-contact pt-2 pb-2" action ="{{route('feedback')}}"method="post">
                @csrf
                <h3 class="text-white my-2">Send Feedback</h3>
                <div class="mb-3">
                    <input type="text" class="form-control  w-75 " placeholder="Email" name="email" value="{{old('email')}}">
                    @error('email')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <textarea class="form-control  w-75" placeholder="Message" name="message" value="{{old('message')}}"></textarea>
                    @error('message')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success text-light float-right">Send</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <h1 class="footer">Developed by @KIRANDURA.org.pvt.Ltd</h1>
        <h2 class="footer2">@ ALL COPYRIGHTS RESERVED</h2>
    </div>
</div>
</body>
</html>
