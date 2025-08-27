<x-layout>

    <x-slot:title>Detalle del producto seleccionado: {{ $producto->nombre }}</x-slot:title>

    <section id="producto_seleccionado">
        <article class="producto_seleccionado_article">
            <div>
                @if ($producto->cover)
                    <img class="img-detalle-producto" src="{{ \Illuminate\Support\Facades\Storage::url($producto->cover) }}" alt="Imagen de {{ $producto->nombre }}">
                @else
                    <p>Sin portada</p>
                @endif
            </div>
            <div>
                @foreach ($producto->categorias as $categoria)
                    <span class="badge bg-primary">{{ $categoria->name }}</span>
                @endforeach

                <h1 class="mb-3"><strong>{{ $producto->nombre }}</strong></h1>

                <h2>Precio: ${{ $producto->price }}</h2>
                <h3>Desarrollado por <strong>{{ $producto->empresa }}</strong></h3>
                <h3>Fecha de lanzamiento: {{ $producto->date_lanzamiento }}</h3>
                <div  class="d-grid gap-2">
                    <button class="btn btn-success"><strong>Comprar</strong></button>

                    <form action="{{ route('carrito.agregar', $producto) }}" method="POST" class="d-grid gap-2">
                        @csrf
                        <button type="submit" class="btn btn-warning">
                            <strong>Agregar al carrito</strong> 
                        </button>
                    </form>
                </div>

            </div>
        </article>
        <br>
        <article class="descripcion">
            <h3><Strong>Descripcion de {{ $producto->nombre }}</Strong></h3>
            <h4>{{ $producto->description }}</h4>
        </article>
    </section>



</x-layout>
