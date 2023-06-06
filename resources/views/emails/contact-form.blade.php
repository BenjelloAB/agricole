<x-mail::message>
    <p>Nom : {{ $data['nom'] }}</p>
    <p>Prénom : {{ $data['prenom'] }}</p>
    <p>Email : {{ $data['email'] }}</p>
    <p>Message : {{ $data['message'] }}</p>

    {{-- <x-mail::button color="success">
        Regarder le message
    </x-mail::button> --}}

    Merci,
    {{ config('app.name') }}
</x-mail::message>


