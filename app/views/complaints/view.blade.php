@extends('layouts.master')

@section('content')
<section class="reclame">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2>{{ $complaint->reason->reason }} na linha {{ $complaint->bus->line }}</h2>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <h3 class="text-center">Relato</h3>
                @if(Session::has('message'))
                    <div class="alert alert-{{ Session::get('messageType')}}">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <p class="text-center info">
                Enviado por {{ $complaint->name }} no dia {{ $complaint->created_at->format('d/m/Y') }}
                </p>
                <p>
                    {{ $complaint->story}}
                </p>
                <p class="info text-right">Este foi a reclamação {{ $complaint->id }} registrada.</p>
                <hr>
                <div class="text-center">
                <a class="btn btn-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}"><i class="fa fa-facebook-square fa-2x"></i> <br>Compartilhar no Facebook</a>
                <a class="btn btn-twitter" target="_blank" href="http://twitter.com/home?status=Mais uma reclamação sobre a linha {{ $complaint->bus->line }} do transporte público de BH. Veja: {{ URL::current() }}"><i class="fa fa-twitter-square fa-2x"></i> <br>Compartilhar no Twitter</a>
                <a class="btn btn-plus" target="_blank" href="https://plus.google.com/share?url={{ URL::current() }}"><i class="fa fa-plus-square fa-2x"></i> <br>Compartilhar no G+</a>
                </div>
            </div>        
        </div>
    </div>
</section>
@stop