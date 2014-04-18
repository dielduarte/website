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
            <div class="col-sm-8 col-sm-offset-2">
                <h3 class="text-center">Reclamações <span class="label label-success">{{ $bus->complaints()->count() }}</span></h3>
                @foreach($bus->complaints()->get() as $complaint)
                    <h4>Reclamação #{{ $complaint->id}}</h4>
                    <b>Usuário:</b> {{ $complaint->name }}
                    <p>
                    <b>Reclamação:</b>
                    {{ $complaint->story }}
                    </p>
                @endforeach
            </div>        
        </div>
    </div>
</section>
@stop