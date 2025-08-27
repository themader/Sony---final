<x-layout>
    <x-slot:title>Visualización de ventas</x-slot:title>

    <div class="container">
        <h1>Historial de Compras</h1>


        <article id="filtro" class="mb-3">

            <form method="GET" action="{{ route('ventas.index') }}" class="mb-3">
                <label for="s-created_at">Filtrar por fecha:</label>
                <input type="date" name="s-created_at" id="s-created_at" value="{{ request('s-created_at') }}">
                <button type="submit" class="btn btn-sm btn-outline-primary">Buscar</button>
            </form>
        </article>
        

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>{{ $venta->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('users.view', ['id' => $venta->user->id]) }}">
                                {{ $venta->user->name }} {{ $venta->user->surname }}
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detalleVenta{{ $venta->id }}">
                                Ver detalles
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- ✅ MODALES -->
        @foreach ($ventas as $venta)
            <div class="modal fade" id="detalleVenta{{ $venta->id }}" tabindex="-1" aria-labelledby="detalleVentaLabel{{ $venta->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detalleVentaLabel{{ $venta->id }}">Detalle de la compra #{{ $venta->id }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Categorías</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($venta->productos as $producto)
                                        <tr>
                                            <td>{{ $producto->nombre }}</td>
                                            <td>${{ number_format($producto->price, 2) }}</td>
                                            <td>
                                                @foreach ($producto->categorias as $categoria)
                                                    <span class="badge bg-primary">{{ $categoria->name }}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p class="mt-3"><strong>Total:</strong> ${{ number_format($venta->productos->sum('price'), 2) }}</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- ✅ Paginación -->
        <article class="paginado">
            <div class="mt-3 d-flex justify-content-center">
                {{ $ventas->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>
        </article>
    </div>
</x-layout>
