@extends('layouts.master')

@section('title')
Reclamações da linha {{ $bus->line }} do transporte público de BH e região
@stop


@section('content')
@include('buses.partials.header', [$bus, $count])
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h2>Reclamações <a class="btn btn-warning btn-xs pull-right" href="{{ URL::to('/')}}/linhas/{{ $bus->line }}">Ver mais sobre a linha {{ $bus->line }}</a></h2>
                @include('complaints.partials.list', [$complaints])
                <div class="text-center">
                    {{ $complaints->links()  }}
                </div>
            </div>
       </div>
    </div>
</section>
@stop
