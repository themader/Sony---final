<x-layout>

    <x-slot:title>Editar producto {{ $producto->nombre }}</x-slot:title>



<section id="edit">
    <article>
        <h1 class="mb-3">Editar el producto seleccionado: {{ $producto->nombre }} desarrollado por {{ $producto->empresa }}</h1>
         @if ($errors->any())
            <div class="alert alert-danger">
                La información ingresada contiene errores.
            </div>
        @endif
    </article>
    <article>
        <form action="{{ route('producto.update', ['id' => $producto->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                class="form-control @error('nombre') is-invalid  @enderror"
                @error('nombre') aria-invalid="true" aria-errormessage="error-nombre" @enderror
                value="{{ old('nombre', $producto->nombre ) }}"
            >
           @error('nombre')
                <div id="error-nombre" class="text-danger">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-3">
            <fieldset class="mb-3">
                <legend>Categorías</legend>
                @foreach ($categorias as $categoria)
                    <label class="me-3">
                        <input
                            type="checkbox"
                            name="categoria_id[]"
                            value="{{ $categoria->categoria_id }}"
                            @checked(in_array($categoria->categoria_id, old('categoria_id', $selectedCategorias ?? [])))
                        >
                        {{ $categoria->name }}
                    </label>
                @endforeach
                @error('categoria_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </fieldset>
        </div>


        <div class="mb-3">
            <label for="empresa" class="form-label">Empresa desarrolladora</label>
            <input
                type="text"
                id="empresa"
                name="empresa"
                class="form-control @error('empresa') is-invalid  @enderror"
                @error('nombre') aria-invalid="true" aria-errormessage="error-nombre" @enderror
                value="{{ old('empresa', $producto->empresa ) }}"
            >
            @error('empresa')
                <div id="error-empresa" class="text-danger">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input
                type="text"
                id="price"
                name="price"
                class="form-control @error('price') is-invalid  @enderror"
                @error('price') aria-invalid="true" aria-errormessage="error-price" @enderror
                value="{{ old('price', $producto->price) }}"
            >
            @error('price')
                <div id="error-price" class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date_lanzamiento" class="form-label">Fecha de lanzamiento</label>
            <input
                type="date"
                id="date_lanzamiento"
                name="date_lanzamiento"
                class="form-control"
                value="{{ old('date_lanzamiento', $producto->date_lanzamiento) }}"
            >
           @error('date_lanzamiento')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción del producto</label>
            <textarea
                name="description"
                id="description"
                class="form-control @error('description') is-invalid @enderror"
            >{{ old('description', $producto->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">

            <p>portada actual</p>
            @if ($producto->cover)
                <img
                    class="img-fluid"
                    src="{{ \Illuminate\Support\Facades\Storage::url($producto->cover) }}"
                    alt=""
                    style="max-width: 300px"
                >

            @else
                <p>Sin imagen cargada</p>
            @endif

        </div>

        <div class="mb-3">
                <label for="cover" class="form-label">
                    Portada <span class="small">(Opcional)</span>
                </label>
                <input type="file" id="cover" name="cover" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Aplicar cambios</button>

    </form>
    </article>
    


</section>
    


</x-layout>
