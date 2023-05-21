<form action="{{ route('search') }}" method="GET">
    @csrf
    <input type="text" name="keyword" placeholder="Search...">
    <button>Search</button>
</form>

@if ($resulta)
    @foreach ($resulta as $result)
        <div>
            {{ $result->nom }}
        </div>
    @endforeach
@endif
