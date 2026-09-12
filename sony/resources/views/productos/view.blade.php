<x-layout>

    <x-slot:title>
        {{ $producto->nombre }}
    </x-slot:title>

    <section id="producto_seleccionado" class="producto-detalle-modern">

        <article class="producto_seleccionado_article">

            {{-- IMAGEN --}}
            <div class="producto-imagen-container">

                @if ($producto->cover)

                    <div class="producto-imagen-wrapper">
                        <img
                            class="img-detalle-producto"
                            src="{{ \Illuminate\Support\Facades\Storage::url($producto->cover) }}"
                            alt="Imagen de {{ $producto->nombre }}"
                        >
                    </div>

                @else

                    <div class="producto-sin-imagen">
                        <span>Sin portada</span>
                    </div>

                @endif

            </div>


            {{-- INFORMACIÓN --}}
            <div class="producto-info">

                {{-- CATEGORÍAS --}}
                @if ($producto->categorias->count())

                    <div class="producto-categorias">

                        @foreach ($producto->categorias as $categoria)

                            <span class="producto-badge">
                                {{ $categoria->name }}
                            </span>

                        @endforeach

                    </div>

                @endif


                {{-- NOMBRE --}}
                <h1 class="producto-titulo">
                    {{ $producto->nombre }}
                </h1>


                {{-- PRECIO --}}
                <div class="producto-price">
                    <span class="producto-price-label">Precio</span>

                    <strong>
                        ${{ $producto->price }}
                    </strong>
                </div>


                {{-- INFORMACIÓN --}}
                <div class="producto-meta">

                    <div class="producto-meta-item">

                        <span class="producto-meta-label">
                            Desarrollado por
                        </span>

                        <strong>
                            {{ $producto->empresa }}
                        </strong>

                    </div>


                    <div class="producto-meta-item">

                        <span class="producto-meta-label">
                            Fecha de lanzamiento
                        </span>

                        <strong>
                            {{ $producto->date_lanzamiento }}
                        </strong>

                    </div>

                </div>


                {{-- ACCIONES --}}
                <div class="producto-acciones">

                    <button
                        type="button"
                        class="btn btn-success btn-comprar"
                    >
                        <strong>Comprar ahora</strong>
                    </button>


                    <form
                        action="{{ route('carrito.agregar', $producto) }}"
                        method="POST"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-warning btn-carrito"
                        >
                            <strong>Agregar al carrito</strong>
                        </button>

                    </form>

                </div>

            </div>

        </article>


        {{-- DESCRIPCIÓN --}}
        <article class="descripcion">

            <div class="descripcion-header">

                <span>Sobre este producto</span>

                <h2>
                    {{ $producto->nombre }}
                </h2>

            </div>


            <p>
                {{ $producto->description }}
            </p>

        </article>

    </section>

</x-layout>
