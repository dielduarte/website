<!DOCTYPE>
<html>
<head>
    <title>Não Move - Exponha os problemas do seu transporte público</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-1">
                    <a href="{{ URL::to('/') }}"><img src="{{ URL::to('/') }}/img/logo.png"></a>
                </div>
                <div class="col-lg-5 text-right">
                    <a class="btn btn-success btn-sm" href="{{ URL::to('/') }}/estatisticas">Estatísticas</a>
                    <a class="btn btn-success btn-sm" href="{{ URL::to('/') }}/contato">Contato</a>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <footer>
        &copy; 2014 Luiz Felipe Pedone
    </footer>
    <script src="{{ URL::to('/') }}/js/jquery-1.11.0.min.js"></script>
    <script src="{{ URL::to('/') }}/js/bootstrap.min.js"></script>
</body>
</html>