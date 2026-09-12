<x-layout>

```
<x-slot:title>Perfil de {{ $user->name }}</x-slot:title>

<main class="perfil-nuevo">

    <section class="perfil-card">

        <!-- PANEL IZQUIERDO -->
        <aside class="perfil-sidebar">

            <div class="perfil-avatar">
                <img
                    src="{{ asset('img/usuario.png') }}"
                    alt="Usuario"
                >
            </div>

            <h2>{{ $user->name }}</h2>

            <p class="perfil-email">
                {{ $user->email }}
            </p>

            <div class="perfil-role">
                {{ $user->role }}
            </div>

        </aside>


        <!-- CONTENIDO DERECHO -->
        <div class="perfil-content">

            <div class="perfil-title">

                <div>
                    <span>MI CUENTA</span>
                    <h1>Información personal</h1>
                </div>

                <div class="perfil-active">
                    <i></i>
                    Activo
                </div>

            </div>


            <div class="perfil-info-grid">

                <div class="info-box">

                    <div class="info-icon">
                        @
                    </div>

                    <div>
                        <span>Correo electrónico</span>
                        <strong>{{ $user->email }}</strong>
                    </div>

                </div>


                <div class="info-box">

                    <div class="info-icon">
                        #
                    </div>

                    <div>
                        <span>Tipo de usuario</span>
                        <strong>{{ $user->role }}</strong>
                    </div>

                </div>


                <div class="info-box">

                    <div class="info-icon">
                        ✓
                    </div>

                    <div>
                        <span>Estado de cuenta</span>
                        <strong>Cuenta activa</strong>
                    </div>

                </div>


                <div class="info-box">

                    <div class="info-icon">
                        +
                    </div>

                    <div>
                        <span>Miembro desde</span>
                        <strong>
                            {{ $user->created_at->format('d/m/Y') }}
                        </strong>
                    </div>

                </div>

            </div>


            <div class="perfil-footer">

                <div>
                    <strong>Perfil verificado</strong>
                    <span>Tu información se encuentra registrada correctamente.</span>
                </div>

                <div class="perfil-check">
                    ✓
                </div>

            </div>

        </div>

    </section>

</main>
```

</x-layout>
