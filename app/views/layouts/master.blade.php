<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>@yield('title', 'Não Move - Exponha os problemas do seu transporte público')</title>
    <meta name="description" content="Você já cansou de reclamar no site da BHTrans e nada melhorar? 
    Vamos tornar públicos os problemas e estatísticas do transporte público de Belo Horizonte. 
    Cadastre o seu problema e ajude a evidenciar a porcaria de transporte público que nós temos.">
    <meta name="keywords" content="mobilidade urbana, transporte público, transporte, bhtrans, bh, belo horizonte, ônibus, reclamação, problema, metrô">
    <meta name=”title content="Não Move">

    <meta name="author" content="Luiz Felipe Pedone" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    {{ Minify::stylesheet(array('/assets/bootstrap/bootstrap.min.css', '/assets/font-awesome/css/font-awesome.css', '/css/style.css', '/assets/select2/select2.css', '/assets/select2/select2-bootstrap.css')) }}

    <link rel="stylesheet" href="{{ asset('/assets/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/select2/select2-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/parsley/parsley.css') }}">



    <link rel="shortcut icon" href="{{ URL::to('/') }}/img/logos/favicon.png" type="image/ico" />
    <meta property="og:image" content="{{ URL::to('/') }}/img/logos/nao-move-vertical.jpg" />
    <meta property="og:url" content="{{ URL::current() }}">
    @yield('facebook-graph')

</head>
<body>
    @include('layouts.partials.header')

    @yield('content')

    <hr>
    <section class="compartilhe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-right">
                    Compartilhe: <a class="btn btn-xs btn-facebook btn-square" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}">
                    <i class="fa fa-facebook"></i>
                </a>
                <a class="btn btn-xs btn-twitter btn-square" target="_blank" href="http://twitter.com/home?status=Conheça o Não Move. Um site para reclamar do transporte público de BH. {{ URL::current() }}">
                    <i class="fa fa-twitter"></i>
                </a>
                <a class="btn btn-xs btn-plus btn-square" target="_blank" href="https://plus.google.com/share?url={{ URL::current() }}">
                    <i class="fa fa-plus"></i>
                </a>
                </div>
            </div>
        </div>
    </section>
    <section class="ad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center visible-lg visible-md visible-sm">
                    <a rel='nofollow' href='http://www.meliuz.com.br/ref_luizpedone'><img width='728' height='90' alt='Cupom de Desconto' title='Cupom de Desconto' src='http://static.meliuz.com.br/img/banners/blog-728x90.png' /></a>
                </div>
                <div class="col-lg-12 text-center visible-xs">
                    <a rel='nofollow' href='http://www.meliuz.com.br/ref_luizpedone'><img width='250' height='250' alt='Cupom de Desconto' title='Cupom de Desconto' src='http://static.meliuz.com.br/img/banners/blog-250x250.png' /></a>
                </div>
            </div>
        </div>
    </section>
    <section class="na-midia">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>O Não Move Na Mídia</h3>
                    <a target="blank" href="http://noticias.r7.com/minas-gerais/revoltado-com-transporte-publico-de-bh-usuario-cria-site-para-reunir-criticas-01052014"><img src="{{ URL::to('/') }}/img/r7.png" class="logo-na-midia"></a>
                    <a target="blank" href="http://www.otempo.com.br/cidades/jovem-cria-site-que-re%C3%BAne-reclama%C3%A7%C3%B5es-sobre-o-transporte-p%C3%BAblico-em-bh-1.829968"><img src="{{ URL::to('/') }}/img/o-tempo.png" class="logo-na-midia"></a>
                    <a target="blank" href="http://www.bhaz.com.br/insatisfeito-com-o-transporte-publico-jovem-cria-site-para-usuarios-reclamarem-da-mobilidade-urbana-em-bh/"><img src="{{ URL::to('/') }}/img/bhaz.png" class="logo-na-midia"></a>
                </div>
            </div>
        </div>
    </section>
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
    {{ Minify::javascript([
        '/js/jquery-1.11.0.min.js',
        '/js/bootstrap.min.js',
        '/assets/select2/select2.js',
        '/assets/select2/select2_locale_pt-BR.js'
    ]) }}
    @yield('js')
    <script src="/assets/select2/select2.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#s2").select2({
                minimumInputLength: 2,
                maximumSelectionSize: 5
            });

        });

      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-29298388-6', 'naomove.com.br');
      ga('send', 'pageview');

    </script>
</body>
</html>