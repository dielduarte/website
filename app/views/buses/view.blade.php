@extends('layouts.master')

@section('content')
<section class="reclame">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2>{{ $bus->line }}</h2>
                <h3>{{ $bus->itinerary }}</h3>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h3 class="text-center">Reclamações</h3>
                <table class="table table-striped">
                    <thead>
                        <th></th>
                        <th>Usuário</th>
                        <th>Tipo de Reclamação</th>
                        <th>Data</th>
                        <th></th>
                    </thead>
                
                @foreach($bus->complaints()->orderBy('created_at', 'DESC')->get() as $complaint)
                <tr>
                    <td><a class="btn btn-nao-move btn-xs" href="{{{ URL::to('/') }}} /reclamacao/ {{{ $complaint->id }}}">Ver Relato Completo</a></td>
                    <td>{{{ $complaint->name }}}</td>
                    <td>{{{ $complaint->reason->reason }}}</td>
                    <td>{{{ $complaint->created_at->format('d/m/Y') }}}</td>
                    <td class="visible-lg">
                        <a class="btn btn-sm btn-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ URL::to('/') }}/reclamacao/{{ $complaint->id }}">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a class="btn btn-sm btn-twitter" target="_blank" href="http://twitter.com/home?status=Mais uma reclamação sobre a linha {{ $complaint->bus->line }} do transporte público de BH. Veja: {{ URL::to('/') }}/reclamacao/{{ $complaint->id }}">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a class="btn btn-sm btn-plus" target="_blank" href="https://plus.google.com/share?url={{ URL::to('/') }}/reclamacao/{{ $complaint->id }}">
                            <i class="fa fa-plus"></i>
                        </a>
                    </td>
                </tr>
                     
                    
                </div>
                @endforeach
                </table>
            </div>        
        </div>
    </div>
</section>
@stop