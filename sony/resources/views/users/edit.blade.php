<x-layout>
    <x-slot:title>Editar usuario {{ $user->name }}</x-slot:title>

    <section id="edit">
        <article>
            <h1 class="mb-3">Editar usuario: {{ $user->name }} {{ $user->surname }}</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    Hay errores en el formulario. Por favor, revisá los campos.
                </div>
            @endif
        </article>

        <article>
            <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $user->name) }}"
                    >
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="surname" class="form-label">Apellido</label>
                    <input
                        type="text"
                        id="surname"
                        name="surname"
                        class="form-control @error('surname') is-invalid @enderror"
                        value="{{ old('surname', $user->surname) }}"
                    >
                    @error('surname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}"
                    >
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        
                    >
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </article>
    </section>
</x-layout>
