@extends('layouts.master')

@section('title')
{{ $complaint->reason->reason  }} na linha {{ $bus->line }} do transporte público de BH e região
@stop

@section('facebook-graph')
<meta property="og:title" content="{{ $complaint->reason->reason }} na linha {{ $complaint->bus->line }}">
<meta property="og:description" content="{{{ $complaint->story }}}">
@stop

@section('content')
@include('buses.partials.header', [$bus, $count])
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

                <h3>
                    Relato <small>Enviado por {{{ $complaint->name }}} no dia {{ $complaint->created_at->format('d/m/Y') }}</small>
                    <a class="btn btn-warning btn-xs pull-right" href="{{ URL::to('/')}}/linhas/{{ $complaint->bus->line }}">Ver mais sobre a linha {{ $complaint->bus->line }}</a>
                </h3>

                <p class="info">Esta foi a {{ $complaint->id }}a reclamação registrada.</p>
                @if(Session::has('message'))
                    <div class="alert alert-{{ Session::get('messageType')}}">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <p>
                    {{ nl2br(e($complaint->story)) }}
                </p>
                <p class="info text-center">
                    <a href="{{ URL::to('/')}}">Conte a sua história</a>
                    &middot;
                    <a href="{{ URL::to('/')}}/linhas/{{ $complaint->bus->line }}">Ver mais reclamações desta linha</a>
                </p>
            </div>
            <div class="col-sm-4">
                <h3>Divulgue esta reclamação</h3>
                <div class="text-center">
                    <p>
                        <a class="btn btn-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}"><i class="fa fa-facebook-square"></i> Facebook</a>
                        <a class="btn btn-twitter" target="_blank" href="http://twitter.com/home?status=Mais uma reclamação sobre a linha {{ $complaint->bus->line }} do transporte público de BH. Veja: {{ URL::current() }}"><i class="fa fa-twitter-square"></i> Twitter</a>
                        <a class="btn btn-plus" target="_blank" href="https://plus.google.com/share?url={{ URL::current() }}"><i class="fa fa-plus-square"></i> Google +</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
