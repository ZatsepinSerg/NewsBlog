<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="/js/scripts.js"></script>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="container-fluid">
            <div class="row">

                <nav class="navbar navbar-default navbar-static-top navbar-inverse" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                        </button> <a class="navbar-brand" href="/"><div style="color: #000080;font-size: 200%;font-family:'Alex Brush', cursive;color: #FFD700;text-align: center;">GOLD ANVIL</div></a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="/articles">Статьи</a>
                            </li>
                            <li>
                                <a href="/articles/create">Добавить статью</a>
                            </li>
                            @if(Auth::check())
                                <li>
                                    <a href="/user/{{Auth::User()->id}}">Мой Профиль</a>
                                </li>
                                <li ><a  rel="nofollow">{{Auth::User()->name}}
                                    </a></li>
                                <li><a href="{{ route('logout') }}" rel="nofollow">Выйти</a></li>
                            @else

                                <li  class="pull-right"><a href="/login" rel="nofollow"> Авторизация </a>
                                </li>
                                <li class="pull-right"><a href="/register" rel="nofollow">Регистрация</a></li>
                            @endif
                        </ul>
                    </div>

                </nav>
            </div>
        </div>

        @include('layouts.errors')
        @if($flash = session('message'))
            <div class="alert alert-success col-lg-8 col-lg-offset-2">
                {{$flash}}
            </div>
        @elseif($flash = session('messages'))
            <div class="alert alert-danger col-lg-8 col-lg-offset-2">
                {{$flash}}
            </div>
        @endif
        @yield('content')

    </div>
</div>

</body>
<footer>
    <div class="col-md-12 row-fluid">

        <br>
        <br>
        <br>

    </div>
</footer>
</html>