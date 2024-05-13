<x-master title='Formulaire'>
    <h3>Modifie Publication</h3>
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
    <form method="POST" action="{{ route('publications.update', $publication->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value={{ old('title', $publication->title) }}>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="body" class="form-control">{{ old('body', $publication->body) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <img src="{{asset('storage/'.$publication->image)}}" width="300px">
        <div class="d-grid my-5">
            <button class="btn btn-primary btn-block" type="submit">Modifie</button>
        </div>
    </form>
</x-master>