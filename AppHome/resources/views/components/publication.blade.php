<div class="card my-2 bg-light">
    <div class="card-body">
        {{-- {{$publication->profile}} --}}
        <blockquote class="blockquote mb-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="position-relative">
                            <img class="rounded-circle" src="{{asset('storage/'.$publication->profile->image)}}" width="100px">
                            <p>{{$publication->profile->name}}</p>
                            <a href="{{route("profiles.show",$publication->profile->id)}}" class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="col">
                        <p>{{$publication->title}}</p>
                        @auth
                        @if ($canUpdate === true)
                            <a class=" float-end btn btn-dark btn-sm" href="{{route('publications.edit', $publication->id)}}">Modifie</a>
                            <form action="{{route('publications.destroy', $publication->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Voulez vous vraiment suprimer cette publication ?')" class=" float-end btn btn-danger btn-sm mx-3">Supprimer</button>
                            </form>
                        @endif
                    @endauth
                    </div>
                </div>
            </div>
            <hr>
            <p>{{$publication->body}}</p>
            @if (!is_null($publication->image))
                <footer class="card-blockquote">
                    <img class="img-fluid" src="{{asset('storage/'.$publication->image)}}" alt="{{$publication->title}}">
                </footer>
            @endif
        </blockquote>
    </div>
</div>