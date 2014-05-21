@extends('layouts.master')

@section('content')
<section class="reclame">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2>Estatísticas</h2>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="col-sm-6 text-center">
                <h2>Tipos mais frequentes de reclamação</h2>
                <table class="table table-striped">
                    <thead>
                        <th width="50%">Linha</th>
                        <th width="50%">Número de Reclamações</th>
                    </thead>
                    <tbody>
                        @foreach($reasons as $complaint)
                            <tr>
                                <td><a href="{{ URL::to('/') }}/tipo-de-reclamacao/{{ Str::slug($complaint->reason->reason) }}">{{ $complaint->reason->reason }}</a></td>
                                <td>{{ $complaint->count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-6 text-center">
                    <h2>Linhas com mais reclamações</h2>
                    <table class="table table-striped">
                        <thead>
                            <th width="50%">Linha</th>
                            <th width="50%">Número de Reclamações</th>
                        </thead>
                        <tbody>
                            @foreach($complaints as $complaint)
                                <tr>
                                    <td><a href="linhas/{{ $complaint->bus->line }}">{{ $complaint->bus->line }}</a></td>
                                    <td>{{ $complaint->count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</section>
@stop