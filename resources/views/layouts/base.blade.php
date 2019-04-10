<!DOCTYPE html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>
        .dropbtn {
            background-color: #3498DB;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover, .dropbtn:focus {
            background-color: #2980B9;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown a:hover {background-color: #ddd;}

        .show {display: block;}
    </style>
</head>
<body>
    <nav class="flex justify-between items-center bg-indigo-lighter p-6 mb-2">
        <div class="w-1/6 flex items-center">
            <a class="no-underline text-black" href="{{ url('/') }}">
                <h2>
                    <i class="fas fa-hand-rock"></i>
                    <span class="font-semibold text-xl">{{ config('app.name', 'Laravel') }}</span>
                </h2>
            </a>
        </div>
        <div class="flex justify-between w-full">
            <div class="text-white">
                <h2>The ultimate Tekken 7 website!</h2>
            </div>
            @guest
            <div class="flex items-center text-white">
                <p>Welcome guest! Please login <a class="no-underline" href="{{ route('login') }}">here.</a></p>
            </div>
            @else
            <div class="flex items-center text-white">
                <img class="rounded-full mr-2" src="{{ gravatar_url(Auth::user()->email) }}" alt="{{ Auth::user()->name }}'s Gravatar">
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">{{ Auth::user()->name }}</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            @endguest
        </div>
    </nav>
    <div class="container mx-auto">
        <div class="flex">
            <div class="border border-light-blue rounded-lg w-3/4 h-full mr-2">
                @yield('content')
            </div>
            <div class="border border-light-blue rounded-lg w-1/4 h-full">
                <div class="border border-blue bg-red p-2 rounded-lg">
                    Latest Tweets #Tekken
                </div>
                <div class="p-2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem beatae commodi dolores dolorum eius expedita, illum impedit libero molestias nam numquam pariatur placeat porro quasi, quibusdam quisquam quo repudiandae saepe.
                </div>
            </div>
        </div>
        <footer class="border border-blue rounded-lg flex justify-between my-2 items-center">
            <a class="text-black" href="https://github.com/Cosmoslayer/tekken7" target="_blank"><i class="p-2 fab fa-github"> Github Repository</i></a>
            <p class="p-2">&copy; Copyright <a href="#">Cosmoslayer</a> 2019</p>
        </footer>
    </div>
    <script>
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>
</html>
