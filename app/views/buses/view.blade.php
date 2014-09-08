@extends('layouts.master')

@section('title')
Linha {{ $bus->line  }}: reclamações e avaliações
@stop

@section('content')

@include('buses.partials.header', [$bus, $count])

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h2>Reclamações</h2>
                @include('complaints.partials.list', [$complaints])
                <div class="text-center">
                    <a class="btn btn-warning btn-lg" href="{{ URL::route('bus.complaints', [$bus->line]) }}">Ver Todas</a>
                </div>
            </div>
            <div class="col-sm-4">
                <h2>Notas</h2>
                <table class="table table-striped">
                    <thead>
                        <th>Item</th>
                        <th>Nota</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Conforto</strong></td>
                            <td>@include('score.partials.format', ['score' => $score->comfort])</td>
                        </tr>
                        <tr>
                            <td><strong>Pontualidade</strong></td>
                            <td>@include('score.partials.format', ['score' => $score->punctuality])</td>
                        </tr>
                        <tr>
                            <td><strong>Respeito ao usuário</strong></td>
                            <td>@include('score.partials.format', ['score' => $score->customer_service])</td>
                        </tr>
                        <tr>
                            <td><strong>Itinerário</strong></td>
                            <td>@include('score.partials.format', ['score' => $score->route])</td>
                        </tr>
                        <tr>
                            <td><strong>Custo x benefício</strong></td>
                            <td>@include('score.partials.format', ['score' => $score->cost_benefit])</td>
                        </tr>
                        <tr>
                            <td><strong>NOTA FINAL</strong></td>
                            <td><strong>@include('score.partials.format', ['score' => $score->score])</strong></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <a class="btn btn-warning btn-lg" href="{{ URL::route('score.form', [$bus->line]) }}">Avalie esta linha</a>
                </div>
            </div>
        </div>
    </div>
</section>
@stop