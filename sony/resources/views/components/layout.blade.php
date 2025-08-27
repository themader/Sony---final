<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="{{ url('./css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('./css/style.css') }}" />
    <link rel="icon" href="img/logo.png" type="image/x-icon" />

    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <title>{{ $title ?? '' }} :: Parcial 1: SONY</title>
</head>

<body>
    <header>
        <nav id="nav" class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
            <div class="container-fluid d-flex align-items-center">
                <h1 class="navbar-brand text-white mb-0">
                    <strong><x-nav-link route="home">SONY</x-nav-link></strong>
                </h1>

                <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar menú de navegación">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <section id="menu_logeado">
                                <li class="nav-item">
                                    <x-nav-link route="users.index">
                                        👤 {{ auth()->user()->name }} {{ auth()->user()->surname }}
                                    </x-nav-link>
                                </li>
                                @if (auth()->user()->role !== 'Cliente')
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Opciones
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item"><x-nav-link route="users.create">Lista de usuarios</x-nav-link></li>
                                            <li class="dropdown-item"><x-nav-link route="producto.create">Lista de productos</x-nav-link></li>
                                            <li class="dropdown-item"><x-nav-link route="blog.create">Lista blogs</x-nav-link></li>
                                            <li class="dropdown-item"><x-nav-link route="ventas.index">Ventas</x-nav-link></li>
                                        </ul>
                                    </li>
                                @endif
                            </section>
                        @else
                            <li class="nav-item">
                                <x-nav-link route="auth.login">👤 My sony</x-nav-link>
                            </li>
                            <li class="nav-item"><x-nav-link route="users.registre">Registrarse</x-nav-link></li>
                        @endauth

                        <li class="nav-item"><x-nav-link route="home">Home</x-nav-link></li>
                        <li class="nav-item"><x-nav-link route="blog.index">Novedades</x-nav-link></li>
                        <li class="nav-item"><x-nav-link route="producto.index">Productos</x-nav-link></li>

                        <li class="nav-item carrito">
                            <a role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                                aria-controls="offcanvasScrolling">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" fill="white" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1a1 1 0 0 1 1-1h1.172a1 1 0 0 1 .949.684L3.89 3H14a1 1 0 0 1 .98 1.197l-1.5 8A1 1 0 0 1 12.5 13H4a1 1 0 0 1-1-.82L1.01 2.607 0 2V1zm3.102 3l1.313 7h8.086l1.312-7H3.102zM5 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling"
            aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Mi carrito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </div>
            <div class="offcanvas-body">

                @auth
                    @php
                        $carrito = auth()->user()->carrito;
                    @endphp

                    @if ($carrito->isEmpty())
                        <h3>El carrito está vacío</h3>
                    @else
                        <table class="table caption-top">
                            <caption>Mi carrito</caption>
                            <thead>
                                <tr>
                                    <th>Img</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carrito as $producto)
                                    <tr>
                                        <td><img src="{{ \Illuminate\Support\Facades\Storage::url($producto->cover) }}" class="img_carrito" alt="{{ $producto->nombre }}"></td>
                                        <td>{{ $producto->nombre }}</td>
                                        <td>
                                            {{ isset($producto->price) ? '$' . number_format($producto->price, 2) : 'Sin precio' }}
                                        </td>
                                        <td>
                                            <form action="{{ route('carrito.eliminar', $producto->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">🗑️</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"><strong>Total:</strong></td>
                                    <td colspan="2">
                                        <strong>${{ number_format($carrito->sum('price'), 2) }}</strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Botón que abre el modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalConfirmarCompra">
                            COMPRAR
                        </button>

                    @endif
                @else
                    <div class="text-center">
                        <h5>Debes iniciar sesión para ver el carrito.</h5>
                        <a class="btn btn-secondary" href="{{ route('auth.login') }}">Iniciar sesión</a>
                    </div>
                @endauth

            </div>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="footer text-bg-dark text-center">
        <p>Sony Argentina</p>
        <section id="menu_footer">
            <article>
                <h4>Menu de opciones</h4>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <x-nav-link route="home">Home</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link route="novedades">Novedades</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link route="producto.index">Productos</x-nav-link>
                    </li>
                </ul>
            </article>

            <article class="redes">
                <h4>Nuestras redes y contacto</h4>
                <div class="redes_2">
                    <a class="nav-item" href="https://www.instagram.com/sonylatin/?hl=es"><img src="/img/ig.png"
                            alt="Instagram" width="30px" /> Síguenos</a>
                    <a class="nav-item" href="https://www.youtube.com/user/Sony"><img src="/img/youtube.webp"
                            alt="YouTube" width="30px" /> Nuestro canal</a>
                    <a class="nav-item" href="https://store.sony.com.ar/atencion-al-cliente">Reclamos</a>
                </div>
            </article>
        </section>
    </footer>

<!-- Modal de Confirmación de Compra -->
@auth
    @php
        $carrito = auth()->user()->carrito;
    @endphp

    <div class="modal fade" id="modalConfirmarCompra" tabindex="-1" aria-labelledby="modalConfirmarCompraLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalConfirmarCompraLabel">Confirmar compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <h2>¿Estás seguro de que quieres finalizar la compra?</h2>
                    <h4>Estás comprando:</h4>
                    <table class="table caption-top">
                        <thead>
                            <tr>
                                <th>Img</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carrito as $producto)
                                <tr>
                                    <td><img src="{{ \Illuminate\Support\Facades\Storage::url($producto->cover) }}" class="img_carrito" alt="{{ $producto->nombre }}"></td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ isset($producto->price) ? '$' . number_format($producto->price, 2) : 'Sin precio' }}</td>
                                    <td>
                                        <form action="{{ route('carrito.eliminar', $producto->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">🗑️</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"><strong>Total:</strong></td>
                                <td colspan="2">
                                    <strong>${{ number_format($carrito->sum('price'), 2) }}</strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="formCompra" action="{{ route('carrito.comprar') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Confirmar compra ${{ number_format($carrito->sum('price'), 2) }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endauth


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
