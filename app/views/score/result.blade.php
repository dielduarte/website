@extends('layouts.master')

@section('title')
A sua nota para a linha {{ $bus->line }} foi {{ $score->score }}
@stop

@section('description')
Dê uma nota para o seu meio de transporte!
@stop

@section('facebook.image')
{{ URL::to('/img/logos/nao-move-avalie-a-sua-linha.png') }}
@stop

@section('content')

@include('buses.partials.header', [$bus])

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="text-center">
                    <h1>Nota: {{ $score->score }}<small>/10</small></h1>

                    <p>Abaixo a comparação das suas notas em relação a média dos usuários desta linha.</p>
                </div>
                <table class="table table-striped">
                    <thead>
                        <th>Item</th>
                        <th>Sua nota</th>
                        <th>Média</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Conforto</strong></td>
                            <td>
                                @include('score.partials.format', ['score' => $score->comfort])
                            </td>
                            <td>
                                @include('score.partials.format', ['score' => $averages->comfort])
                            </td>
                            <td>
                                @if ($score->comfort > $averages->comfort)
                                    <i data-toggle="tooltip" data-placement="bottom" title="Acima da média." class="text-success fa fa-chevron-up"></i>
                                @elseif ($score->comfort < $averages->comfort)
                                    <i data-toggle="tooltip" data-placement="bottom" title="Abaixo da média." class="text-danger fa fa-chevron-down"></i>
                                @else
                                    <i data-toggle="tooltip" data-placement="bottom" title="Igual a média." class="text-info fa fa-circle-o"></i>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Pontualidade</strong></td>
                            <td>@include('score.partials.format', ['score' => $score->punctuality])</td>
                            <td>
                                @include('score.partials.format', ['score' => $averages->punctuality])
                            </td>
                            <td>
                                @if ($score->punctuality > $averages->punctuality)
                                    <i data-toggle="tooltip" data-placement="bottom" title="Acima da média." class="text-success fa fa-chevron-up"></i>
                                @elseif ($score->punctuality < $averages->punctuality)
                                    <i data-toggle="tooltip" data-placement="bottom" title="Abaixo da média." class="text-danger fa fa-chevron-down"></i>
                                @else
                                    <i data-toggle="tooltip" data-placement="bottom" title="Igual a média." class="text-info fa fa-circle-o"></i>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Respeito ao usuário</strong></td>
                            <td>@include('score.partials.format', ['score' => $score->customer_service])</td>
                            <td>
                                @include('score.partials.format', ['score' => $averages->customer_service])
                            </td>
                            <td>
                                @if ($score->customer_service > $averages->customer_service)
                                    <i data-toggle="tooltip" data-placement="bottom" title="Acima da média." class="text-success fa fa-chevron-up"></i>
                                @elseif ($score->customer_service < $averages->customer_service)
                                    <i data-toggle="tooltip" data-placement="bottom" title="Abaixo da média." class="text-danger fa fa-chevron-down"></i>
                                @else
                                    <i data-toggle="tooltip" data-placement="bottom" title="Igual a média." class="text-info fa fa-circle-o"></i>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Itinerário</strong></td>
                            <td>@include('score.partials.format', ['score' => $score->route])</td>
                            <td>
                                @include('score.partials.format', ['score' => $averages->route])
                            </td>
                            <td>
                                @if ($score->route > $averages->route)
                                    <i data-toggle="tooltip" data-placement="bottom" title="Acima da média." class="text-success fa fa-chevron-up"></i>
                                @elseif ($score->route < $averages->route)
                                    <i data-toggle="tooltip" data-placement="bottom" title="Abaixo da média." class="text-danger fa fa-chevron-down"></i>
                                @else
                                    <i data-toggle="tooltip" data-placement="bottom" title="Igual a média." class="text-info fa fa-circle-o"></i>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Custo x benefício</strong></td>
                            <td>@include('score.partials.format', ['score' => $score->cost_benefit])</td>
                            <td>
                                @include('score.partials.format', ['score' => $averages->cost_benefit])
                            </td>
                            <td>
                                @if ($score->cost_benefit > $averages->cost_benefit)
                                    <i data-toggle="tooltip" data-placement="bottom" title="Acima da média." class="text-success fa fa-chevron-up"></i>
                                @elseif ($score->cost_benefit < $averages->cost_benefit)
                                    <i data-toggle="tooltip" data-placement="bottom" title="Abaixo da média." class="text-danger fa fa-chevron-down"></i>
                                @else
                                    <i data-toggle="tooltip" data-placement="bottom" title="Igual a média." class="text-info fa fa-circle-o"></i>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>NOTA FINAL</strong></td>
                            <td><strong>@include('score.partials.format', ['score' => $score->score])</strong></td>
                            <td>
                                @include('score.partials.format', ['score' => $averages->score])
                            </td>
                            <td>
                                @if ($score->score > $averages->score)
                                    <i data-toggle="tooltip" data-placement="bottom" title="Acima da média." class="text-success fa fa-chevron-up"></i>
                                @elseif ($score->score < $averages->score)
                                    <i data-toggle="tooltip" data-placement="bottom" title="Abaixo da média." class="text-danger fa fa-chevron-down"></i>
                                @else
                                    <i data-toggle="tooltip" data-placement="bottom" title="Igual a média." class="text-info fa fa-circle-o"></i>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-center">
                    <p>
                        Compartilhe a sua nota e convide seus amigos para avaliarem o transporte público de BH e região!
                    </p>
                    <p>
                        <a class="btn btn-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}"><i class="fa fa-facebook-square"></i> Facebook</a>
                        <a class="btn btn-twitter" target="_blank" href="http://twitter.com/home?status=Avaliei a linha {{ $bus->line }} do transporte público de BH. Veja: {{ URL::current() }}"><i class="fa fa-twitter-square"></i> Twitter</a>
                        <a class="btn btn-plus" target="_blank" href="https://plus.google.com/share?url={{ URL::current() }}"><i class="fa fa-plus-square"></i> Google +</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('js')
<script type="text/javascript">
    $('.fa').tooltip();
</script>
@stop