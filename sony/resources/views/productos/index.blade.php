<x-layout>
    <x-slot:title>Listado</x-slot:title>
    
    

    
    <section id="productos">    
           @if (session()->has('feedback.message'))

                <div class="alert alert-success">
                    {!! session()->get('feedback.message') !!}
                </div>

            @endif

        <article id="filtro" class="mb-3">
             <h1>Listado de Productos</h1>
        <h2>Filtro</h2>
        <form action="{{ route('producto.index') }}" method="get">
            <div class="d-flex gap-3 align-items-end mb-3">
                <div>
                    <label for="s-nombre" class="form-label">Nombre</label>
                    <input
                        type="search"
                        id="s-nombre"
                        name="s-nombre"
                        class="form-control"
                        value="{{ request('s-nombre') }}"
                    >
                </div>

                <div>
                    <label for="s-categoria" class="form-label">Categoría</label>
                    <select name="s-categoria" id="s-categoria" class="form-control">
                        <option value="">Todas</option>
                        @foreach ($categorias as $categoria)
                            <option
                                value="{{ $categoria->categoria_id }}"
                                @selected($categoria->categoria_id == request('s-categoria'))
                            >
                                {{ $categoria->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
    </article>
        <article id="productosExpuestos">
            
<div class="grid-productos">
    @foreach ($productos as $p)
    <a href="{{ route('producto.view', ['id' => $p->id]) }}" >
        <div class="col">
            <div class="card custom-card h-100">
                <div class="img">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($p->cover) }}"
                     class="card-img-top"
                     alt="{{ $p->nombre }}">
                </div>
                

                <div class="card-body">
                    <h5 class="card-title">{{ $p->nombre }}</h5>
                    <p class="card-text text-success fw-bold">${{ $p->price }}</p>

                    @foreach ($p->categorias as $categoria)
                        <span class="badge bg-secondary">{{ $categoria->name }}</span>
                    @endforeach

                    <p class="card-text mt-2">De: <strong>{{ $p->empresa }}</strong></p>
                </div>

                <div class="card-footer d-flex justify-content-between align-items-center bg-light">
                    

                    <form action="{{ route('carrito.agregar', $p) }}" method="POST" class="m-0 ms-2">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="white" viewBox="0 0 16 16">
                                <path d="M0 1a1 1 0 0 1 1-1h1.172a1 1 0 0 1 .949.684L3.89 3H14a1 1 0 0 1 .98 1.197l-1.5 8A1 1 0 0 1 12.5 13H4a1 1 0 0 1-1-.82L1.01 2.607 0 2V1zm3.102 3l1.313 7h8.086l1.312-7H3.102zM5 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>

            
        </article>
        <article class="paginado">
            <div class="mt-3 d-flex justify-content-center">
                {{ $productos->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>
        </article>
           

        
    </section>
    
</x-layout>
