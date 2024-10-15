@foreach($monster as $monsters)
    <h1>{{ $monster->name }}</h1>
    <img src="{{ $monster->thumbnail }}" alt="">
@endforeach
<h1>hoi</h1>
