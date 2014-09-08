@if ($score == null)
    <span class="text-muted">--</span>
@elseif($score > 7)
    <span class="text-success">{{ number_format($score, 2) }}</span>
@elseif ($score > 5)
    <span class="text-warning">{{ number_format($score, 2) }}</span>
@else
    <span class="text-danger">{{ number_format($score, 2) }}</span>
@endif