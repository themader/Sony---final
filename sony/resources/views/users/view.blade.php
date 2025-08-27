<x-layout>

    <x-slot:title>Detalle del producto seleccionado: {{ $user->name }}</x-slot:title>
    <br>
    <section id="user">
        <article >
            <img src="/img/usuario.png" alt="">
            <a href=""></a>
        </article>
        <article>
            <h1><strong>{{ $user->name }} </strong></h1>
            <h3><Strong>Mail:</Strong> {{ $user->email }} </h3>
            <h3><strong>Rol:</strong> {{$user->role }} </h3>
            <h3><strong>Perfil creado:</strong> {{$user->created_at }} </h3>
        </article>
    </section>
    <br>
</x-layout>
