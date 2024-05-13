<x-master title="Page d'accueil">
    <x-alert type="success">
        <strong>Success</strong>
    </x-alert>
    <x-alert type="primary">
        <strong>Primary</strong>
    </x-alert>
    
    <h3>Home</h3>
    <x-users-table :users="$users" />
</x-master>