<x-master title='Formulaire'>
    <h3>Create Profile</h3>
    <form method="POST" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
        @csrf {{--  sécurité --}}
        <div class="mb-3">
            <label class="form-label">Nom Complet</label>
            <input type="text" name="name" class="form-control" value={{ old('name') }}>
            @error('name')
                <div class="text-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" value={{ old('email') }}>   
            @error('email')
                <div class="text-danger">
                    {{$message}}
                </div>
            @enderror    
        </div>    
        <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" value={{ old('password') }}>       
        </div>    
        <div class="mb-3">
            <label class="form-label">Confirmation mot de passe</label>
            <input type="password" name="password_confirmation" class="form-control">       
        </div>    
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="bio" class="form-control">{{ old('bio') }}</textarea>
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