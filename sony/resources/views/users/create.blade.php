<x-layout> 
    <x-slot:title>Crear usuario</x-slot:title>

    @if (session()->has('feedback.message'))
        <div class="alert alert-success">
            {!! session()->get('feedback.message') !!}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            La información ingresada contiene errores. Por favor, revisá los campos y probá de nuevo.
        </div>
    @endif

    <section id="created">
        <article>
            <h1 class="mb-3">Crear una cuenta de personal</h1>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" id="name" name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Crear contraseña</label>
                    <input type="password" id="password" name="password"
                           class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Rol</label>
                    <input type="text" id="role" name="role"
                           class="form-control @error('role') is-invalid @enderror"
                           value="{{ old('role') }}">
                    @error('role')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Crear usuario</button>
            </form>
        </article>

        {{-- Tabla modo escritorio --}}
        <article>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($users as $u)
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->role }}</td>
                            <td>
                                <a href="{{ route('users.view', $u->id) }}" class="btn btn-primary">Ver</a>
                                <a href="{{ route('users.edit', $u->id) }}" class="btn btn-secondary">Editar</a>
                                <a href="{{ route('users.delete', $u->id) }}" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </article>
    </section>

    {{-- Sección móvil --}}
    <section id="created_mobile">
        <article>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" id="name" name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Crear contraseña</label>
                    <input type="password" id="password" name="password"
                           class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Rol</label>
                    <input type="text" id="role" name="role"
                           class="form-control @error('role') is-invalid @enderror"
                           value="{{ old('role') }}">
                    @error('role')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Crear usuario</button>
            </form>
        </article>

        <article>
            <div class="row">
                @foreach ($users as $u)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $u->name }}</h5>
                                <p class="card-text">
                                    <strong>Email:</strong> {{ $u->email }}<br>
                                    <strong>Rol:</strong> {{ $u->role }}
                                </p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('users.view', $u->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                <a href="{{ route('users.edit', $u->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                                <a href="{{ route('users.delete', $u->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
    </section>
</x-layout>




