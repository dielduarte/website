@extends('layouts.master')

@section('content')
<section class="reclame">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2>Ônibus lotado? Desrespeito ao horário? Poste a sua reclamação!</h2>
                <p>
                    Você já cansou de reclamar no site da BHTrans e nada melhorar? Vamos
                    tornar públicas os problemas e estatísticas do transporte público de
                    Belo Horizonte. Cadastre o seu problema e ajude a evidenciar a porcaria
                    de transporte público que nós temos.
                </p>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 text-center">
                <h2>Conte o seu problema</h2>
                @if(Session::has('message'))
                    <div class="alert alert-{{ Session::get('messageType')}}">
                        {{ Session::get('message') }}
                    </div>
                @endif
                @if(Session::has('errors'))
                    <div class="alert alert-danger">
                        <b>Erro!</b>
                        Alguns campos não foram preenchidos corretamente. Eles estão marcados de vermelho.
                    </div>
                @endif
                {{ Form::open(['url' => 'registrar-relato', 'data-parsley-validate']) }}
                    {{ Form::textField('name', 'Seu nome', Input::old('name')) }}
                    {{ Form::emailField('email', 'Seu e-mail (não será divulgado)', Input::old('email')) }}
                    {{ Form::selectField('bus_id', 'Em qual linha foi o problema?', Bus::orderBy('line', 'ASC')->lists('line', 'id'), Input::old('line')) }}
                    {{ Form::selectField('reason_id', 'Qual é o motivo da reclamação?', Reason::orderBy('reason', 'ASC')->lists('reason', 'id'), Input::old('reason')) }}
                    {{ Form::textAreaField('story', 'Conte a sua história', Input::old('story')) }}
                    {{ Form::sub('Enviar Reclamação', 'success', 'lg') }}
                {{ Form::close() }}
            </div>
            <div class="col-sm-6 text-center">
                <h2>Linhas com mais reclamações</h2>
                <table class="table table-striped">
                    <thead>
                        <th width="50%">Linha</th>
                        <th width="50%">Número de Reclamações</th>
                    </thead>
                    <tbody>
                        @foreach(Complaint::leaderboard(10) as $complaint)
                            <tr>
                                <td><a href="linhas/{{ $complaint->bus->line }}">{{ $complaint->bus->line }}</a></td>
                                <td>{{ $complaint->count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-success btn-lg" href="estatisticas">Ver Estatísticas Completas</a>
            </div>
        </div>
    </div>
</section>
@stop