<fieldset>
    <form action="{{ URL::route('complaint.post') }}" id="post-a-complaint" method="POST" class="form-horizontal" data-parsley-validate>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Seu Nome</label>
            <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" required>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Seu e-mail</label>
            <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" required>
                  <p class="block-help small text-muted">O seu e-mail não será divulgado.</p>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Linha</label>
            <div class="col-sm-10">
                  {{ Form::select('bus_id', Bus::activeBusesList()->lists('line_plus_itinerary', 'id'), Input::old('line'), ['id' => 's2', 'class' => 'select2-container form-control', 'required']) }}
                  <p class="block-help small text-muted">Em qual linha você teve o problema.</p>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Motivo</label>
            <div class="col-sm-10">
                {{ Form::select('reason_id', Reason::remember(720)->orderBy('reason', 'ASC')->lists('reason', 'id'), Input::old('reason'), ['class' => 'form-control', 'required']) }}
                <p class="block-help small text-muted">Qual foi o problema que você teve.</p>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Reclamação</label>
            <div class="col-sm-10">
                <textarea class="form-control"></textarea>
                <p class="block-help small text-muted" required>Conte a sua história.</p>
            </div>
        </div>
        <div class="text-center">
            {{ Form::submit('Enviar Reclamação', ['class' => 'btn btn-warning btn-lg']) }}
        </div>
    </form>
</fieldset>