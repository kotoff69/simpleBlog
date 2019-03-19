@if ($item)
    <p><b>Name</b></p>
    <p>{{ $item->name }}</p>
    <p><b>Revisions</b></p>
    <p>{{ $item->revisions->count() }}</p>
    <p><b>Current revision</b></p>
    <p>{{ $item->currentRevision->text }}</p>
    <p><b>Created</b></p>
    <p>{{ $item->created_at->diffForHumans() }}</p>

@else
    <p>This post does not exist.</p>
@endif