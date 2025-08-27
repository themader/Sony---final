 <x-layout>
    <x-slot:title>Setear contraseña</x-slot:title>


    <div id="set-password-container">
        

        <form method="POST" class="form-registro" action="{{ route('auth.set_password') }}" >
        <h1 class="set-password-title">Crear una contraseña</h1>
            @csrf

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input id="password" type="password" name="password" class="form-control" required>
                @error('password')
                    <div class="set-password-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
            </div>





            <button type="submit" class="btn btn-primary">Guardar contraseña</button>
        </form>






    </div>
</x-layout>
