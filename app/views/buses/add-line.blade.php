@extends('layouts.master')

@section('content')
<section class="reclame">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2>Adicionar Linha de Ônibus</h2>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <p class="text-center lead">Para adicionar uma linha, preencha os campos abaixo.</p>

                @if(Session::has('errors'))
                    <div class="alert alert-danger">
                        Você preencheu algum dos campos abaixo incorretamente. Por favor verifique os dados e tente
                        novamente.
                    </div>
                @endif

                @if(Session::has('message'))
                    <div class="alert alert-success">
                        <p class="lead text-center">Linha enviada com sucesso!</p>
                        <p>
                            Recebemos a solicitação para adicionar a sua linha. Ela será validada e em breve estará no site.
                            Entraremos em contato para te avisar.
                        </p>
                    </div>
                @endif

                <h3>Dados da linha</h3>
                {{ Form::open(['url' => 'adicionar-linha']) }}
                {{ Form::textField('line', 'Número da Linha (exemplo: 9209)', Input::old('line')) }}
                {{ Form::textField('itinerary', 'Itinerário (exemplo: Gutierrez / Sagrada Família)', Input::old('itinerary')) }}
                <h3>Seus dados</h3>
                {{ Form::textField('name', 'Nome', Input::old('name')) }}
                {{ Form::emailField('email', 'E-mail (iremos te avisar quando a linha estiver no site)', Input::old('email')) }}
                {{ Form::label('Código de Verificação') }}
                {{ Form::captcha(['theme' => 'clean']) }}
                <br/>
                <div class="text-center">
                    {{ Form::sub('Enviar Linha', 'nao-move', 'lg') }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
@stop