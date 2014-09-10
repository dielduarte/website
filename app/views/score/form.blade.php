@extends('layouts.master')

@section('title')
Avalie @if($bus) a linha {{ $bus->line }} @else sua linha@endif do transporte público de BH e região
@stop

@section('content')
@if ($bus)
@include('buses.partials.header', [$bus])
@endif
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                @if($bus) <h3>Avalie a linha {{ $bus->line }}</h3> @else <h3>Avalie a sua linha</h3> @endif


                @if (\Session::has('errors'))
                    <div class="alert alert-danger text-center">
                        Algum campo não foi preenchido corretamente. Por favor verifique se todas as perguntas foram respondidas.
                    </div>
                @endif
                {{ Form::open() }}
                    <div class="row">
                        <div class="col-sm-6">
                            {{ Form::textField('user_name', 'Seu nome', Input::old('name')) }}
                        </div>
                        <div class="col-sm-6">
                            {{ Form::emailField('email', 'Seu e-mail', Input::old('name')) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group @if ($errors->has('comfort')) has-error @endif">
                            {{ Form::label('bus_id', 'Linha')  }}
                            {{ Form::select('bus_id', ['' => '-- Selecione --'] + Bus::activeBusesList()->lists('line_plus_itinerary', 'id'), Input::old('line'), ['id' => 's2', 'class' => 'select2-container form-control']) }}
                        </div>
                    </div>
                    <h4>
                        Conforto
                        <button
                            type="button"
                            class="btn btn-xs btn-warning"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Conforto: Avalie o conforto das viagens que você faz nesta linha. Os ônibus são novos? Eles estão limpos? Eles estão em bom estado de conservação?"
                            data-original-title="">
                            ?
                        </button>
                    </h4>

                    <div class="row @if ($errors->has('comfort')) alert-danger @endif">
                        <div class="col-sm-3">
                            {{ Form::radioField('comfort', 'Ruim', '0')  }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::radioField('comfort', 'Razoável', '3.3')  }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::radioField('comfort', 'Bom', '6.6')  }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::radioField('comfort', 'Muito bom', '10')  }}
                        </div>
                    </div>
                    <h4>
                        Pontualidade
                        <button
                            type="button"
                            class="btn btn-xs btn-warning"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Pontualidade: Os horários são respeitados?"
                            data-original-title="">
                            ?
                        </button>
                    </h4>
                    <div class="row @if ($errors->has('punctuality')) alert-danger @endif">
                        <div class="col-sm-3">
                            {{ Form::radioField('punctuality', 'Ruim', '0')  }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::radioField('punctuality', 'Razoável', '3.3')  }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::radioField('punctuality', 'Bom', '6.6')  }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::radioField('punctuality', 'Muito bom', '10')  }}
                        </div>
                    </div>
                    <h4>
                        Respeito ao usuário
                        <button
                            type="button"
                            class="btn btn-xs btn-warning"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Respeito ao usuário: Os profissionais que trabalham nesta linha respeitam os usuários? Avalie se eles são cordiais,
                                   proativos e interessados em ajudar os passageiros"
                            data-original-title="">
                            ?
                        </button>
                    </h4>
                    <div class="row @if ($errors->has('customer_service')) alert-danger @endif">
                        <div class="col-sm-3">
                            {{ Form::radioField('customer_service', 'Ruim', '0')  }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::radioField('customer_service', 'Razoável', '3.3')  }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::radioField('customer_service', 'Bom', '6.6')  }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::radioField('customer_service', 'Muito bom', '10')  }}
                        </div>
                    </div>
                    <h4>
                        Itinerário
                        <button
                            type="button"
                            class="btn btn-xs btn-warning"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Itinerário: O itinerário é respeitado? O itinerário é bom e faz sentido?"
                            data-original-title="">
                            ?
                        </button>
                    </h4>
                    <div class="row @if ($errors->has('route')) alert-danger @endif">
                        <div class="col-sm-3">
                            {{ Form::radioField('route', 'Ruim', '0')  }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::radioField('route', 'Razoável', '3.3')  }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::radioField('route', 'Bom', '6.6')  }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::radioField('route', 'Muito bom', '10')  }}
                        </div>
                    </div>
                    <h4>
                        Custo x benefício
                        <button
                            type="button"
                            class="btn btn-xs btn-warning"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Custo x Benefício: Você acha que o valor pago na passagem é justo?"
                            data-original-title="">
                            ?
                        </button>
                    </h4>
                    <div class="row @if ($errors->has('cost_benefit')) alert-danger @endif">
                        <div class="col-sm-3">
                            {{ Form::radioField('cost_benefit', 'Ruim', '0')  }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::radioField('cost_benefit', 'Razoável', '3.3')  }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::radioField('cost_benefit', 'Bom', '6.6')  }}
                        </div>
                        <div class="col-sm-3">
                            {{ Form::radioField('cost_benefit', 'Muito bom', '10')  }}
                        </div>
                    </div>
                    <div class="text-center">
                        <p>
                            {{ Form::submit('Enviar', ['class' => 'btn btn-warning btn-md'])  }}
                        </p>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
@stop

@section('js')
<script type="text/javascript">
    $('.btn-xs').tooltip();
</script>
@stop