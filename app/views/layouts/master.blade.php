<!DOCTYPE>
<html>
<head>
    <title>Não Move - Exponha os problemas do seu transporte público</title>
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width">
    <link href='http://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/style.css">
    <link rel="shortcut icon" href="{{ URL::to('/') }}/img/favicon.png" type="image/ico" />

</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-1">
                    <button class="btn btn-success visible-xs visible-sm pull-right" data-toggle="collapse" href="#menu">
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <a class="title" href="{{ URL::to('/') }}">
                        NÃO MOVE
                    </a>
                </div>
                <div class="col-lg-5 text-right">
                    <div class="visible-md visible-lg">
                        <a class="btn btn-success btn-sm" href="{{ URL::to('/') }}/estatisticas">Estatísticas</a>
                        <a class="btn btn-success btn-sm" href="{{ URL::to('/') }}/contato">Contato</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="menu" class="menu collapse">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 visible-sm visible-xs">
                    <a class="btn btn-block" href="{{ URL::to('/') }}/estatisticas">Estatísticas</a>
                    <a class="btn btn-block" href="{{ URL::to('/') }}/contato">Contato</a>
                </div>
            </div>
        </div>
    </section>
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
