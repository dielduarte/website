@extends('layouts.master')

@section('content')
<section class="reclame">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="text-center">Reclamações sobre {{ $reason->reason }}</h2>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <p class="lead text-center">Foram registradas {{ $reason->complaints()->count() }} reclamações deste tipo</p>
                <table class="table table-striped">
                    <thead>
                        <th></th>
                        <th>Usuário</th>
                        <th>Linha</th>
                        <th>Data</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($complaints as $complaint)
                        <tr>
                            <td><a class="btn btn-nao-move btn-xs" href="{{{ URL::to('/') }}}/reclamacao/{{{ $complaint->id }}}">Ver Relato Completo</a></td>
                            <td>{{{ $complaint->name }}}</td>
                            <td>{{{ $complaint->bus->line }}}</td>
                            <td>{{{ $complaint->created_at->format('d/m/Y') }}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $complaints->links() }}
                </div>
            </div>        
        </div>
    </div>
</section>
@stop