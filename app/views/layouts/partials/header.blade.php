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
        <form class="navbar-form navbar-right text-center">
            <a class="btn btn-warning" href="{{ URL::route('score.form') }}">Avalie a sua linha</a>
          </form>
        <div class="navbar-collapse collapse" id="navbar-main">

            <ul class="nav navbar-nav navbar-right">
                <li></li>
                <li><a href="{{ URL::route('stats') }}">Estatísticas</a></li>
                <li><a href="{{ URL::to('/') }}/equipe">Equipe</a></li>
                <li><a href="{{ URL::to('/') }}/contato">Contato</a></li>


                {{--<li><a class="visible-xs" href="{{ URL::to('/') }}/contato">Publicar Reclamação</a></li>--}}
                {{--<li><button data-toggle="modal" data-target="#complaint-modal" class="btn btn-warning btn-sm hidden-xs">Publicar Reclamação</button></li>--}}
            </ul>
            <form class="navbar-form navbar-right">
                {{ Form::select('bus_id', ['' => 'Busque a sua linha'] + Bus::active()->lists('line', 'line'), null, ['id' => 'header-select', 'class' => 'select2-container form-control col-lg-8', 'style' => 'width: 200px; ']) }}
            </form>
        </div>
    </div>
</div>