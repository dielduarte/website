<section class="grey">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h2>{{ $bus->line }}@if(!$bus->active) <small><strong><span class="text-danger">Linha desativada</span></strong></small>@endif<br><small>{{ $bus->itinerary }}</small></h2>
            </div>
            <div class="col-sm-2 text-center">
                <h2>
                    <small>Reclamações:</small><br>
                    {{ $bus->complaints()->count() }}
                </h2>
            </div>
            <div class="col-sm-2 text-center">
                <h2>
                    <small>Nota:</small><br>
                    <?php $score = $bus->scores()->avg('score'); ?>
                    @include('score.partials.format', ['score' => $score])<span class="text-muted">/10</span>
                </h2>
            </div>
        </div>
    </div>
</section>