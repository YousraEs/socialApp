<x-master title="Page d'accueil">
    <h3>Profiles</h3>
    <div class="row my-5">
        @foreach($profiles as $profile)
            <x-profileCard :profile="$profile"/>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $profiles->links() }}
    </div>
</x-master>