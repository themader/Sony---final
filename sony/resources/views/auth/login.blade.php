<x-layout>
    <x-slot:title>Iniciar sesión</x-slot:title>

@if (session()->has('feedback.message'))
    <div class="alert alert-success">
        {!! session()->get('feedback.message') !!}
    </div>
@endif

<section id="login_page" class="login-page-modern">

    <div class="login-header">
        <div class="login-icon">
            ⇥
        </div>

        <h1>Iniciar sesión</h1>

        <p class="login-subtitle">
            Ingresá tus datos para acceder a tu cuenta
        </p>
    </div>

    <form action="{{ route('auth.authenticate') }}" method="post" class="form-registro">

        @csrf

        <div class="form-group-modern">
            <label for="email" class="form-label">
                Email
            </label>

            <div class="input-wrapper">
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    placeholder="Ingresá tu email"
                    autocomplete="email"
                    required
                >
            </div>
        </div>

        <div class="form-group-modern">
            <label for="password" class="form-label">
                Contraseña
            </label>

            <div class="input-wrapper">
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    placeholder="Ingresá tu contraseña"
                    autocomplete="current-password"
                    required
                >
            </div>
        </div>

        <div class="button_registre">

            <button type="submit" class="btn btn-primary login-submit">
                Ingresar
            </button>

            <div class="login-divider">
                <span>o continuar con</span>
            </div>

            <div class="opcion_login">

                <a href="{{ route('google.login') }}" class="btn-google">
                    <img
                        src="{{ asset('img/google_mail_gmail_logo_icon_159346.png') }}"
                        alt="Google"
                    >
                    <strong>Continuar con Google</strong>
                </a>

                <div class="btn btn-secondary">
                    <x-nav-link route="users.registre">
                        <strong>Crear una cuenta</strong>
                    </x-nav-link>
                </div>

            </div>

            <p class="login-register-text">
                ¿Todavía no tenés una cuenta? Registrate gratis.
            </p>

        </div>

    </form>
</section>

</x-layout>
