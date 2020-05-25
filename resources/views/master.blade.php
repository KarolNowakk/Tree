<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body>
        @include('message')
        <nav class="site-header sticky-top py-1 navbar-dark bg-dark">
            <div class="d-flex flex-row justify-content-between align-items-center px-5">
                <div class="d-flex flex-row justify-content-between">
                    <a href="{{ route('home') }}" style="color:white; text-decoration:none;">
                        <h3>TREE STRUCTURE</h3>
                    </a>
                </div>
                @if (Auth::check())
                    <form method="POST" action={{ route('logout') }} class="form-group d-flex flex-row mt-3">
                        @csrf
                        <button type="submit" class="btn btn-primary ml-1">Logout</button>
                    </form>
                @else
                    <form method="POST" action={{ route('login') }} class="form-group d-flex flex-row mt-3">
                        @csrf
                        <input type="text" class="form-control ml-1" id="username" name="email" value="{{ old('email') }}">
                        <input type="password" class="form-control ml-1" id="password" name="password">
                        <button type="submit" class="btn btn-primary ml-1">Login</button>
                        <a class="link px-2 mt-1" style="color:white" href={{ route('register') }}>Register</a>
                    </form>
                @endif
            </div>
        </nav>

        @yield('content')

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
