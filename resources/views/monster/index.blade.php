<form method="GET" action="{{ route('monster.index') }}">
    <div>
        <label for="species">Filter by species</label>
        <select name="species_id" id="species">
            <option value="">All species</option>
            @foreach($species as $speciesItem)
                <option value="{{ $speciesItem->id }}" {{ request('species_id') == $speciesItem ? 'selected' : ''}}>
                    {{ $speciesItem->name }}
                </option>
            @endforeach
        </select>
        <x-primary-button type="submit" >Filter</x-primary-button>
    </div>

</form>

@foreach($monsters as $monster)
    <h1><a href="{{route('monster.show', $monster)}}">{{ $monster->name }}</a></h1>
    <img src="{{ $monster->thumbnail }}" alt="">
@endforeach
<a href="{{ route('monster.create') }}">create</a>

