<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="{{ URL::route('home') }}" class="navbar-brand">
                <img src="/img/logos/nao-move.png">
            </a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ URL::route('stats') }}">Estatísticas</a></li>
                <li><a href="{{ URL::to('/') }}/equipe">Equipe</a></li>
                <li><a href="{{ URL::to('/') }}/fotos">Fotos</a></li>
                <li><a href="{{ URL::to('/') }}/na-midia">Na Mídia</a></li>
                <li><a href="{{ URL::to('/') }}/contato">Contato</a></li>
                {{--<li><a class="visible-xs" href="{{ URL::to('/') }}/contato">Publicar Reclamação</a></li>--}}
                {{--<li><button data-toggle="modal" data-target="#complaint-modal" class="btn btn-warning btn-sm hidden-xs">Publicar Reclamação</button></li>--}}
            </ul>

        </div>
    </div>
</div>