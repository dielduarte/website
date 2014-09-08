@if (count($complaints) > 0)
<table class="table table-striped">
    <thead>
        <th></th>
        <th>Usuário/Reclamação</th>
        <th>Data</th>
        <th></th>
    </thead>
@foreach($complaints as $complaint)
<tr>
    <td><a class="btn btn-warning btn-xs" href="{{{ URL::to('/') }}}/reclamacao/{{{ $complaint->id }}}">Ver</a></td>
    <td>{{{ $complaint->reason->reason  }}} <small>({{{ Str::title(trim($complaint->name)) }}})</small></td>
    <td>{{{ $complaint->created_at->format('d/m/Y') }}}</td>
</tr>
@endforeach
</table>
@else
    <p class="lead text-center">Esta linha não possui nenhuam reclamação.</p>
    <p class="text-center">Tem uma reclamação? <a href="/#form">Poste aqui.</a></p>
@endif