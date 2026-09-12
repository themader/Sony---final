<x-layout>

    <x-slot:title>Mi cuenta</x-slot:title>

    @if (session()->has('feedback.message'))
        <div class="alert alert-success perfil-alert">
            {!! session()->get('feedback.message') !!}
        </div>
    @endif

    <main class="cuenta-page">

        <section class="cuenta-card">

            {{-- CABECERA --}}
            <div class="cuenta-header">

                <div class="cuenta-avatar">
                    <img
                        src="{{ asset('img/usuario.png') }}"
                        alt="Usuario"
                    >
                </div>

                <div class="cuenta-heading">
                    <span>MI CUENTA</span>

                    <h1>
                        Hola, {{ auth()->user()->name }}
                    </h1>

                    <p>
                        Gestioná tu información personal y tus compras.
                    </p>
                </div>

                <div class="cuenta-status">
                    <i></i>
                    Cuenta activa
                </div>

            </div>


            {{-- INFORMACIÓN --}}
            <div class="cuenta-info">

                <div class="cuenta-info-box">

                    <span>Correo electrónico</span>

                    <strong>
                        {{ auth()->user()->email }}
                    </strong>

                </div>


                <div class="cuenta-info-box">

                    <span>Rol</span>

                    <strong>
                        {{ auth()->user()->role }}
                    </strong>

                </div>


                <div class="cuenta-info-box">

                    <span>Perfil creado</span>

                    <strong>
                        {{ auth()->user()->created_at->format('d/m/Y') }}
                    </strong>

                </div>

            </div>


            {{-- ACCIONES --}}
            <div class="cuenta-actions">

                <a
                    href="{{ route('users.edit', ['id' => auth()->user()->id]) }}"
                    class="cuenta-button cuenta-button-primary"
                >
                    Editar perfil
                </a>

                <a
                    href="{{ route('ventas.index') }}"
                    class="cuenta-button cuenta-button-secondary"
                >
                    Mis compras
                </a>

                <form
                    action="{{ route('auth.logout') }}"
                    method="post"
                >
                    @csrf

                    <button
                        type="submit"
                        class="cuenta-button cuenta-button-danger"
                    >
                        Cerrar sesión
                    </button>
                </form>

            </div>

        </section>

    </main>

</x-layout>