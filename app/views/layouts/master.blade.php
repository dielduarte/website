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
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-29298388-6', 'luizpedone.com');
  ga('send', 'pageview');

</script>
</body>
</html>
