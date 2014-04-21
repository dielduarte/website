@extends('layouts.master')

@section('content')
<section class="reclame">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-lg-offset-2 text-center">
                <i class="fa fa-frown-o fa-xxl"></i>
            </div>
            <div class="col-lg-6">
                <h2>Ônibus lotado? Desrespeito ao horário? Poste a sua reclamação!</h2>
                <p>
                    Você já cansou de reclamar no site da BHTrans e nada melhorar? Vamos
                    tornar públicos os problemas e estatísticas do transporte público de
                    Belo Horizonte. Cadastre o seu problema e ajude a evidenciar a porcaria
                    de transporte público que nós temos.
                </p>
                <a class="btn btn-default btn-lg" href="#form">Conte o seu problema</a>
            </div>
        </div>
    </div>
</section>
<section class="share">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2>Compartilhe!</h2>
                <p>Gostou da ideia? Ajude a divulgar!</p>
                <a class="btn btn-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}">
                    <i class="fa fa-facebook"></i>
                </a>
                <a class="btn btn-twitter" target="_blank" href="http://twitter.com/home?status=Cansado do transporte público de BH? Compartilhe sua história em {{ URL::current() }}">
                    <i class="fa fa-twitter"></i>
                </a>
                <a class="btn btn-plus" target="_blank" href="https://plus.google.com/share?url={{ URL::current() }}">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<section id="form">
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
                    {{ Form::selectField('bus_id', 'Em qual linha foi o problema?', Bus::remember(720)->orderBy('line', 'ASC')->lists('line', 'id'), Input::old('line')) }}
                    {{ Form::selectField('reason_id', 'Qual é o motivo da reclamação?', Reason::remember(720)->orderBy('reason', 'ASC')->lists('reason', 'id'), Input::old('reason')) }}
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
                        @foreach($complaints as $complaint)
                            <tr>
                                <td><a href="linhas/{{ $complaint->bus->line }}">{{ $complaint->bus->line }}</a></td>
                                <td>{{ $complaint->count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-success btn-lg" href="/estatisticas">Ver Estatísticas Completas</a>
            </div>
        </div>
    </div>
</section>
@stop