<x-master title="Mon Profile">
    <h3>Profile</h3>
    <div class="container-fluid">
        <div class="row">
            <div class="card my-3 py-4">
                <img class="card-img-top mx-auto w-25" src="{{ asset('storage/'.$profile->image) }}">
                <div class="card-body text-center">
                    <h4 class="card-title">{{ $profile->name }}</h4>
                    {{-- <p class="card-text">{{ $profile->created_at->format('y-m-d') }}</p> --}}
                    <p class="card-text">Email: <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a></p>
                    <p class="card-text">{{ $profile->bio }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <h3>Vous Publications</h3>
            {{-- {{dd($profile->publications)}} --}}
            <div class="container w-75 mx-auto">
                <div class="row">
                    @foreach ($profile->publications as $publication)
                        <x-publication :publication="$publication" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-master>