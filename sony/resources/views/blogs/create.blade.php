<x-layout>
    <x-slot:title>Publicaciones</x-slot:title>

    @if ($errors->any())
        <div class="alert alert-danger">
            La información ingresada contiene errores.
            Por favor, revisá los campos y probá de nuevo
        </div>
    @endif

    <section id="created">
        <article>
            <h1 class="mb-3">Publicar un blog</h1>
            <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título de la publicación</label>
                    <input
                        type="text"
                        id="titulo"
                        name="titulo"
                        class="form-control @error('titulo') is-invalid @enderror"
                        @error('titulo') aria-invalid="true" aria-errormessage="error-titulo" @enderror
                        value="{{ old('titulo') }}"
                    >
                    @error('titulo')
                        <div id="error-titulo" class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="texto" class="form-label">Ingresar el contenido</label>
                    <input
                        type="text"
                        id="texto"
                        name="texto"
                        class="form-control @error('texto') is-invalid @enderror"
                        @error('texto') aria-invalid="true" aria-errormessage="error-texto" @enderror
                        value="{{ old('texto') }}"
                    >
                    @error('texto')
                        <div id="error-texto" class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cover" class="form-label">Portada</label>
                    <input type="file" id="cover" name="cover" class="form-control">
                    @error('cover')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Publicar</button>
            </form>
        </article>

        <article>
            <section class="mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">IMG</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Contenido</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($blogs as $b)
                            <tr>
                                <td>{{ $b->id }}</td>
                                <td>
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($b->cover) }}" class="img_create" alt="Portada de blog">
                                </td>
                                <td>{{ $b->titulo }}</td>
                                <td>{{ $b->texto }}</td>
                                <td>
                                    <a href="{{ route('blog.edit', ['id' => $b->id]) }}" class="btn btn-secondary">Editar</a>
                                    <a href="{{ route('blog.delete', ['id' => $b->id]) }}" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </article>
    </section>
</x-layout>
