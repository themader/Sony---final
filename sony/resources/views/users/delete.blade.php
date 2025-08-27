<x-layout>

    <x-slot:title>Detalle del {{ $user->email }}</x-slot:title>

    <h1 class="mb-3">confirmacion para eliminar {{ $user->email }}</h1>
    <section id="user">
        <article >
            <img src="/img/usuario.png" alt="">

             <form
                action="{{ route('users.destroy', ['id' => $user->id]) }}"
                method="post"
                class="mb-3"
            >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar {{ $user->name }} de {{ $user->surname }}</button>

            </form>

        </article>
        <article>
            <h1>Bienvenido usuario: <strong> {{ $user->name }} de {{ $user->surname }} </strong></h1>
            <h3><Strong>Mail:</Strong> {{ $user->email }} </h3>
            <h3><strong>Rol:</strong> {{ $user->role }}  </h3>
            <h3><strong>Perfil creado:</strong> {{ $user->created_at }}  </h3>
        </article>
    </section>


   

</x-layout>
