<section class="grey">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h2>{{ $bus->line }}<br><small>{{ $bus->itinerary }}</small> </h2>
                <h3></h3>
            </div>
            <div class="col-sm-2 text-center">
                <h2>
                    <small>Reclamações:</small><br>
                    {{ $count  }}
                </h2>
            </div>
            <div class="col-sm-2 text-center">
                <h2>
                    <small>Nota:</small><br>
                    <a><span class="text-danger">9.9</span></a>
                </h2>
            </div>
        </div>
    </div>
</section>