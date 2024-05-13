@props(['users'])
<div>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>ID</th> 
                <th>NOM</th> 
                <th>METIER</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user['id']}}</td>
                <td>{{$user['nom']}}</td>
                <td>{{$user['metier']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>