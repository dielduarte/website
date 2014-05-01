<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Não Move - Exponha os problemas do seu transporte público</title>
    <meta name="description" content="Você já cansou de reclamar no site da BHTrans e nada melhorar? 
    Vamos tornar públicos os problemas e estatísticas do transporte público de Belo Horizonte. 
    Cadastre o seu problema e ajude a evidenciar a porcaria de transporte público que nós temos.">
    <meta name="keywords" content="mobilidade urbana, transporte público, transporte, bhtrans, bh, belo horizonte, ônibus, reclamação, problema, metrô">
    <meta name=”title content="Não Move">
    <meta name="author" content="Luiz Felipe Pedone" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <link href='http://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>
    {{ Minify::stylesheet(array('/css/bootstrap.css', '/assets/font-awesome/css/font-awesome.css', '/css/style.css')) }}
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
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h4>Páginas</h4>
                    <ul>
                    <li><a href="/">Página Inicial</a></li>
                    <li><a href="/#form">Poste A Sua Reclamação</a></li>
                    <li><a href="/estatisticas">Estatísticas</a></li>
                    <li><a href="/contato">Contato</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h4>Últimas Reclamações</h4>
                    <ul>
                        @foreach(Complaint::latest(5) as $complaint)
                            <li><a href="/reclamacao/{{ $complaint->id }}">{{ $complaint->reason->reason }} no {{ $complaint->bus->line }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h4>Redes Sociais</h4>
                    <a class="btn btn-facebook" target="_blank" href="https://www.facebook.com/naomove">
                        <i class="fa fa-facebook-square"></i>
                    </a>
                    <a class="btn btn-twitter" target="_blank" href="http://twitter.com/bhnaomove">
                        <i class="fa fa-twitter-square"></i>
                    </a>
                    <a class="btn btn-plus" target="_blank" href="https://plus.google.com/b/110277514594301318631/110277514594301318631/about?hl=pt-BR">
                        <i class="fa fa-plus-square"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    {{ Minify::javascript(array('/js/jquery-1.11.0.min.js', '/js/bootstrap.min.js')) }}
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    @yield('js')
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-29298388-6', 'naomove.com.br');
  ga('send', 'pageview');

</script>

</body>
</html>
