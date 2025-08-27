<x-layout>
    <x-slot:title> iniciar Sesion </x-slot:title>

    @if (session()->has('feedback.message'))

                <div class="alert alert-success">
                    {!! session()->get('feedback.message') !!}
                </div>

            @endif


    <section id="login_page">

        <h1 class="mb-3">iniciar a tu Cuenta</h1>
        <h4>Ingresa tus datos para acceder a tu cuenta</h4>
        
        <form action="{{ route('auth.authenticate') }}" method="post" class="form-registro">
         
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
                

                <div class="button_registre">
                    <button type="submit" class="btn btn-primary">Ingresar</button>

                    <div class="opcion_login">
                        <a href="{{ route('google.login') }}" class="btn-google">
                            <img src="{{ asset('img/google_mail_gmail_logo_icon_159346.png') }}" alt="Google Login">
                            <strong>Login</strong>
                        </a>

                        <div class="btn btn-secondary">
                            <x-nav-link route="users.registre">
                                <strong>Registrarse</strong>
                            </x-nav-link>
                        </div>
                    </div>
                </div>



        </form>
    </section>
    

</x-layout>
