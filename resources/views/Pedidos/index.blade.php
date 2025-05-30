{{-- este index muestra la visual de PEDIDOS --}}
<x-app-layout>
    <x-slot name="header">
        <h2>Pedidos Recibidos</h2>
    </x-slot>

    <div style="margin-bottom: 20px;">
        <strong>Filtrar por estado:</strong>
        <a href="{{ route('pedidos.index') }}" style="{{ empty($estado) ? 'font-weight:bold; text-decoration:underline;' : '' }}">Todos</a> |
        <a href="{{ route('pedidos.index', ['estado' => 'pendiente']) }}" style="{{ $estado === 'pendiente' ? 'font-weight:bold; text-decoration:underline;' : '' }}">Pendientes</a> |
        <a href="{{ route('pedidos.index', ['estado' => 'aceptado']) }}" style="{{ $estado === 'aceptado' ? 'font-weight:bold; text-decoration:underline;' : '' }}">Aceptados</a> |
        <a href="{{ route('pedidos.index', ['estado' => 'rechazado']) }}" style="{{ $estado === 'rechazado' ? 'font-weight:bold; text-decoration:underline;' : '' }}">Rechazados</a>
    </div>

    @forelse ($pedidos as $pedido)
        <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
            <h3>Pedido #{{ $pedido->id }} - {{ $pedido->created_at->format('d/m/Y H:i') }}</h3>
            <ul>
                @foreach ($pedido->productos as $item)
                    <li>
                        {{ $item->producto->nombre }} - Cantidad: {{ $item->cantidad }} - Precio unitario: ${{ $item->precio_unitario }} - Subtotal: ${{ $item->precio_unitario * $item->cantidad }}
                    </li>
                @endforeach
            </ul>
            <p><strong>Total del pedido:</strong> ${{ $pedido->total }}</p>
            <p><strong>Estado:</strong> {{ ucfirst($pedido->estado) }}</p>

            @if ($pedido->estado === 'pendiente')
                <form method="POST" action="{{ route('pedidos.aceptar', $pedido) }}" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit">Aceptar</button>
                </form>
                <form method="POST" action="{{ route('pedidos.rechazar', $pedido) }}" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit">Rechazar</button>
                </form>
            @endif
        </div>
    @empty
        <p>No hay pedidos todavía.</p>
    @endforelse
</x-app-layout>

