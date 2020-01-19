<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
        <link href="{{ asset('css/footer.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
                z-index:1
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }*/
        </style>
    </head>
    <body>
        @if (Route::has('login'))
        <nav class="navbar navbar-light navbar-toggleable-sm py-4">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand mr-auto">
                    <h3 class="d-inline align-middle">
                        <img src="/img/icon.png" style="height:50px" class="pr-3"/> 
                        <span class="align-middle">{{ config('app.name') }}</span>
                    </h3>
                </a>
                <!--<ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Items</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">My list</a>
                    </li>
                </ul>-->
                @auth
                <a href="{{ url('/home') }}" class="navbar-btn mr-2">
                    Se connecter
                </a>
                @else
                <a href="{{ route('login') }}" class="navbar-btn mr-2">
                    Se connecter
                </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="navbar-btn">
                        S'inscrire
                    </a>
                    @endif
                @endauth
            </div>
        </nav>
        @endif

        <section id="welcome" class="py-5">
            <div class="text-white pt-md-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1 class="display-2 mt-5 pt-5">
                                Do What You Drean of...
                            </h1>
                            <p class="lead">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore sequi quibusdam eius debitis, nulla suscipit quidem pariatur perspiciatis non. Libero fugiat sed autem architecto soluta consequuntur ex possimus amet quisquam.
                            </p>
                            <div class="mt-5">
                                <a href="{{ route('register') }}" class="btn btn-primary btn-lg text-white font-weight-bolder">
                                    <span class="align-bottom">
                                        S'inscrire
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5 text-center bg-faded">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="mb-5">
                            <h1 class="text-primary pb-3">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </h1>
                            <p class="lead pb-3">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet similique nisi accusantium eos iure doloribus. Delectus dolorum officia et qui, asperiores repellendus ea dolore eveniet culpa rem. Quaerat, aspernatur! Tempore.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="py-3">
            <div class="container">
                <div class="row">
                    <span class="lead m-auto">
                        © 2020 ENSAT Master BISD 1
                    </span>
                </div>
            </div>
        </footer>
        <!--<div class="content">
            <div class="title m-b-md">
                BISD Community
            </div>

            <div class="links">
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://vapor.laravel.com">Vapor</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>-->
    </body>
</html>
