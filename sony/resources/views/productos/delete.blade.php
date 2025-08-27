<x-layout>

    <x-slot:title>Detalle del {{ $producto->nombre }}</x-slot:title>

    <h1 class="mb-3">confirmacion para eliminar {{$producto->nombre}}</h1>
    <h3>Atencionm estas a punto de eliminar el producto {{ $producto->nombre }}</h3>

    <section id="producto_seleccionado">
        <article class="producto_seleccionado_article">
            <div>
                <img class="img-detalle-producto" src="{{ \Illuminate\Support\Facades\Storage::url($producto->cover) }}" alt="Imagen de {{ $producto->nombre }}">
            </div>
            <div>
                <h1 class="mb-3"><strong>{{ $producto->nombre }}</strong></h1>

                <h2>Precio: ${{ $producto->price }}</h2>
                <h3>Desarrollado por <strong>{{ $producto->empresa }}</strong></h3>
                <h4>Fecha de lanzamiento: {{ $producto->categoria }}</h4>
                <h4>Fecha de lanzamiento: {{ $producto->date_lanzamiento }}</h4>
                <h4>Fecha de publicacion: {{ $producto->created_at }}</h4>
                <h4>Fecha de ultima vez actualizado: {{ $producto->updated_at }}</h4>


                <form action="{{ route('producto.destroy', ['id' => $producto->id]) }}" method="post" class="mb-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar {{ $producto->nombre }} de {{ $producto->empresa }}</button>

                </form>
                
            </div>
        </article>
        <br>
        <article class="descripcion">
            <h3><Strong>Descripcion de {{ $producto->nombre }}</Strong></h3>
            <h4>{{ $producto->description }}</h4>
        </article>
    </section>


    

</x-layout>
