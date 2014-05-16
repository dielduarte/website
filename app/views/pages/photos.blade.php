@extends('layouts.master')

@section('content')
<section class="reclame">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2>Fotos</h2>
            </div>
        </div>
    </div>
</section>
<section class="na-midia">
    <div class="container">
        <div class="row">
            <div class="lead"><span class="bold">Quer a sua foto aqui?</span><br>Marque a sua foto com o usuário <span class="green bold">@naomove</span> ou com a hashtag <span class="green bold">#naomove</span> no Instagram!</div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div id="instafeed"></div>
        </div>
    </div>
</section>

@stop

@section('js')
    <script type="text/javascript" src="{{ URL::to('/') }}/js/instafeed.min.js"></script>
    <script type="text/javascript">
        var feed = new Instafeed({
            get: 'user',
            userId: 1329381482,
            tagName: 'naomove',
            accessToken: '1329381482.c0a9ef3.a2baec1c353841aa89345a9fc6449f5c',
            sortBy: 'most-recent',
            clientId: 'c0a9ef31cac047cb8b41c790cfe30a32',
            resolution: 'standard_resolution',
            template: '<div class="col-sm-3 text-center instafeed-padding"><a href="@{{link}}"><img class="img-responsive img-rounded" src="@{{image}}" /></a></div>'
        });
        feed.run();
    </script>
@stop