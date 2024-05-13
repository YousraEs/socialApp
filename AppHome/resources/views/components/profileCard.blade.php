<div class="col-sm-4">
    <div class="card mb-3">
        <img src="{{ asset('storage/'.$profile->image) }}" class="card-img-top h-50" >
        <div class="card-body">
            <h5 class="card-title">{{ $profile->name }}</h5>
            <p class="card-text">{{ Str::limit($profile->bio, 50) }}</p>
            <a href="{{ route('profiles.show', $profile->id) }}" class="stretched-link"></a>
        </div>               
        <div class="card-foot border-top px-3 py-3 bg-light" style="z-index: 9">
            <form action="{{ route('profiles.destroy', $profile->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm float-end">Supprimer</button>
            </form> 
            <form action="{{ route('profiles.edit', $profile->id) }}" method="GET">
                @csrf
                <button class="btn btn-dark btn-sm float-end mx-3">Modifier</button>
            </form>
        </div>
    </div>
</div>