<x-layout>
    <x-slot:title>Publicar un producto</x-slot:title>

    @if (session()->has('feedback.message'))

                <div class="alert alert-success">
                    {!! session()->get('feedback.message') !!}
                </div>

            @endif


    @if ($errors->any())
        <div class="alert alert-danger">
            La información ingresada contiene errores.
            Por favor, revisá los campos y probá de nuevo
        </div>
    @endif

    <section id="created">

        <article>
            <h1 class="mb-3">Publicar un producto</h1>
            <form action="{{ route('producto.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        class="form-control @error('nombre') is-invalid @enderror"
                        @error('nombre') aria-invalid="true" aria-errormessage="error-nombre" @enderror
                        value="{{ old('nombre') }}"
                    >
                    @error('nombre')
                        <div id="error-nombre" class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    {{-- NUEVO: Checkboxes de categorías --}}
                <fieldset class="mb-3">
                    <legend>Categorías adicionales</legend>
                    @foreach ($categorias as $categoria)
                        <label class="me-3">
                            <input
                                type="checkbox"
                                name="categoria_id[]"
                                value="{{ $categoria->categoria_id }}"
                                @checked(in_array($categoria->categoria_id, old('categoria_id', [])))
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
                    <label for="empresa" class="form-label">Empresa</label>
                    <input
                        type="text"
                        id="empresa"
                        name="empresa"
                        class="form-control @error('empresa') is-invalid @enderror"
                        value="{{ old('empresa') }}"
                    >
                    @error('empresa')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Precio</label>
                    <input
                        type="number"
                        step="0.01"
                        id="price"
                        name="price"
                        class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price') }}"
                    >
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date_lanzamiento" class="form-label">Fecha de Lanzamiento</label>
                    <input
                        type="date"
                        id="date_lanzamiento"
                        name="date_lanzamiento"
                        class="form-control @error('date_lanzamiento') is-invalid @enderror"
                        value="{{ old('date_lanzamiento') }}"
                    >
                    @error('date_lanzamiento')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea
                        name="description"
                        id="description"
                        class="form-control @error('description') is-invalid @enderror"
                        rows="5"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
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
                    <h2>Filtro</h2>
                    <form action="{{ route('producto.create') }}" method="get">
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
                </section>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">IMG</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">


                 @foreach ($productos as $p)
                    <tr>
                    <td>{{ $p->id}}</td>
                    <td><img src="{{ \Illuminate\Support\Facades\Storage::url($p->cover) }}" class="img_create"></td>
                    <td>{{ $p->nombre}}</td>
                    <td>@foreach ($p->categorias as $categoria)
                    <span class="badge bg-primary">{{ $categoria->name }}</span>
                @endforeach</td>
                    <td>{{ $p->empresa}}</td>
                    <td>
                        <a href="{{ route('producto.view', ['id' => $p->id]) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('producto.edit', ['id' => $p->id]) }}" class="btn btn-secondary">Editar</a>
                        <a href="{{ route('producto.delete', ['id' => $p->id]) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                    </tr>
                  @endforeach

                </tbody>
            </table>
            <div class="mt-3 d-flex justify-content-center">
                {{ $productos->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>
        </article>
    </section>


    <section id="created_mobile">
        <article>
        <form action="{{ route('producto.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        class="form-control @error('nombre') is-invalid @enderror"
                        @error('nombre') aria-invalid="true" aria-errormessage="error-nombre" @enderror
                        value="{{ old('nombre') }}"
                    >
                    @error('nombre')
                        <div id="error-nombre" class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                     {{-- NUEVO: Checkboxes de categorías --}}
    <fieldset class="mb-3">
        <legend>Categorías adicionales</legend>
        @foreach ($categorias as $categoria)
            <label class="me-3">
                <input
                    type="checkbox"
                    name="categoria_id[]"
                    value="{{ $categoria->categoria_id }}"
                    @checked(in_array($categoria->categoria_id, old('categoria_id', [])))
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
                    <label for="empresa" class="form-label">Empresa</label>
                    <input
                        type="text"
                        id="empresa"
                        name="empresa"
                        class="form-control @error('empresa') is-invalid @enderror"
                        value="{{ old('empresa') }}"
                    >
                    @error('empresa')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Precio</label>
                    <input
                        type="number"
                        step="0.01"
                        id="price"
                        name="price"
                        class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price') }}"
                    >
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date_lanzamiento" class="form-label">Fecha de Lanzamiento</label>
                    <input
                        type="date"
                        id="date_lanzamiento"
                        name="date_lanzamiento"
                        class="form-control @error('date_lanzamiento') is-invalid @enderror"
                        value="{{ old('date_lanzamiento') }}"
                    >
                    @error('date_lanzamiento')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea
                        name="description"
                        id="description"
                        class="form-control @error('description') is-invalid @enderror"
                        rows="5"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Publicar</button>
            </form>
        </article>
        
        <article>
            <div class="row">
                 <h2>Filtro</h2>
                    <form action="{{ route('producto.create') }}" method="get">
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
            </div>
                   
            <div class="row">
                @foreach ($productos as $p)
                    <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="/img/producto.png" class="card-img-top" alt="Imagen del producto">
                        <div class="card-body">
                        <h5 class="card-title">{{ $p->nombre }}</h5>
                        <p class="card-text">
                            <strong>Categoría:</strong> {{ $p->categoria }}<br>
                            <strong>Empresa:</strong> {{ $p->empresa }}
                        </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('producto.view', ['id' => $p->id]) }}" class="btn btn-primary btn-sm">Ver</a>
                        <a href="{{ route('producto.edit', ['id' => $p->id]) }}" class="btn btn-secondary btn-sm">Editar</a>
                        <a href="{{ route('producto.delete', ['id' => $p->id]) }}" class="btn btn-danger btn-sm">Eliminar</a>
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>
        </article>

    </section>

</x-layout>




