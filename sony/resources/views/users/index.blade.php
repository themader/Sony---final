<x-layout>
    <x-slot:title>Usuario</x-slot:title>
        @if (session()->has('feedback.message'))

                <div class="alert alert-success">
                    {!! session()->get('feedback.message') !!}
                </div>

            @endif


  <br>
    <section id="user">
        <article >
            <img src="img/usuario.png" alt="">

            <div class="button_cerrar_Sesion">
                <form action="{{ route('auth.logout') }}" method="post">
                                        @csrf
                    <button type="submit">
                        Cerrar sesion
                    </button>
                </form>
                <a href="{{ route('users.edit', ['id' => auth()->user()->id]) }}" class="btn btn-secondary">Editar</a>
                <a href="{{ route('ventas.index') }}" class="btn btn-info">Compras</a>

            </div>
            
        </article>
        <article>
            <h1>Bienvenido usuario: <strong> {{ auth()->user()->name }}  </strong></h1>
            <h3><Strong>Mail:</Strong> {{ auth()->user()->email }} </h3>
            <h3><strong>Rol:</strong> {{ auth()->user()->role }} </h3>
            <h3><strong>Perfil creado:</strong> {{ auth()->user()->created_at }} </h3>
        </article>
    </section>
   <br>
    
</x-layout>
