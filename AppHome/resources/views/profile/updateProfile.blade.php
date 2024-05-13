<x-master title='Formulaire'>
    <h3>Update Profile</h3>
    <form method="POST" action="{{ route('profiles.update', $profile->id) }}" enctype="multipart/form-data">
        @csrf  {{--  sécurité --}}
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nom Complet</label>
            <input type="text" name="name" class="form-control" value={{ old('name', $profile->name) }}>
            @error('name')
                <div class="text-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" value={{ old('email', $profile->email) }}>   
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
        {{-- bio --}}
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Description</label>
            <textarea name="bio" class="form-control">{{ old('bio', $profile->bio) }}</textarea>
            @error('bio')
                <div class="text-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        {{-- image --}}
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input name="image" type="file" class="form-control">
            @error('image')
                <div class="text-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="d-grid my-5 ">
            <button class="btn btn-primary btn-block" type="submit">Modifier</button>
        </div>
    </form>
</x-master>