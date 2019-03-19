@if($list->count())
    <h1>Categories</h1>
    <ul>
    @foreach($list as $item)
            <li>{{ $item->name }}</li>
    @endforeach
    </ul>
@else
    <p>There are no categories yet.</p>
@endif