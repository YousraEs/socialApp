<x-master title='Formulaire'>
    <h3>Create Publication</h3>
    @if ($errors->any())
        <x-alert type="danger">
            <h6>Errors :</h6>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
    </x-alert>
    @endif
    <form method="POST" action="{{ route('publications.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value={{ old('title') }}>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="body" class="form-control">{{ old('body') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="d-grid my-5">
            <button class="btn btn-primary btn-block" type="submit">Ajouter</button>
        </div>
    </form>
</x-master>