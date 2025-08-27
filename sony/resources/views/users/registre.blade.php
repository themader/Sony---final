<x-layout>
    <x-slot:title>Registro</x-slot:title>

    @auth
        @if (is_null(auth()->user()->password))
            
            <form method="POST" action="{{ route('auth.set_password') }}">
            <h1>Crear contraseña</h1>
            <h2>Configurar/Actualizar contraseña</h2>
                @csrf
                <input type="password" name="password" placeholder="Nueva contraseña" required>
                <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>
                <button type="submit">Guardar</button>
            </form>
        @else
          
            <p>Ya tienes una contraseña configurada.</p>
        @endif
    @else
        
        

        <form class="form-registro" method="POST" action="{{ route('users.storeRegistre') }}">
        <h1>Crear una cuenta</h1>
            @csrf

            <div class="mb-3">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control">
                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="button_registre">
                <button type="submit" class="btn btn-primary">Registrarse</button>
                
               <a href="{{ route('google.login') }}" class="btn-google">
                    <img src="{{ asset('img/google_mail_gmail_logo_icon_159346.png') }}" alt="Google Login">
                    <strong>Autenticar</strong>
                </a>



            </div>

        </form>
    @endauth
</x-layout>
