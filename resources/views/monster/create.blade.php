<form action="{{ route('monster.store') }}" method="post">
    @csrf
    <div>
        <x-input-label for="name">Name</x-input-label>
        <x-text-input name="name" id="name"></x-text-input>
    </div>
    <div>
        <x-input-label for="description">Description</x-input-label>
        <x-text-input name="description" id="description"></x-text-input>
    </div>
    <div>
        <x-input-label for="thumbnail">Thumbnail</x-input-label>
        <x-text-input name="thumbnail" id="thumbnail"></x-text-input>
    </div>
    <x-primary-button type="submit">Create</x-primary-button>
</form>
