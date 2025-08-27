<x-layout>
    <x-slot:title>Editar publicación</x-slot:title>


<section id="edit">
 <h1 class="mb-3">Editar publicación</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            La información ingresada contiene errores.
            Por favor, revisá los campos y probá de nuevo.
        </div>
    @endif

    <form action="{{ route('blog.update', ['id' => $blog->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input
                type="text"
                id="titulo"
                name="titulo"
                class="form-control @error('titulo') is-invalid @enderror"
                value="{{ old('titulo', $blog->titulo) }}"
                @error('titulo') aria-invalid="true" aria-errormessage="error-titulo" @enderror
            >
            @error('titulo')
                <div id="error-titulo" class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="texto" class="form-label">Contenido</label>
            <textarea
                id="texto"
                name="texto"
                class="form-control @error('texto') is-invalid @enderror"
                rows="6"
                @error('texto') aria-invalid="true" aria-errormessage="error-texto" @enderror
            >{{ old('texto', $blog->texto) }}</textarea>
            @error('texto')
                <div id="error-texto" class="text-danger">{{ $message }}</div>
            @enderror
        </div>

   
        @if ($blog->cover)
            <div class="mb-3">
                <p class="form-label">Imagen actual:</p>
                <img src="{{ asset('storage/' . $blog->cover) }}" alt="Portada" style="max-height: 200px;">
            </div>
        @endif

        <div class="mb-3">
            <label for="cover" class="form-label">Reemplazar portada</label>
            <input
                type="file"
                id="cover"
                name="cover"
                class="form-control @error('cover') is-invalid @enderror"
            >
            @error('cover')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar publicación</button>
        <a href="{{ route('blog.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</section>
   
</x-layout>
