{{-- este index muestra la visual de PEDIDOS --}}

<x-app-layout>
    <x-slot name="header">
        <h2>Pedidos Recibidos</h2>
    </x-slot>

    <a href="{{ route('productos.index')  }}">ir a productos</a>
    <a href="{{ route('carrito.index') }}">ir a Carrito</a>

    @forelse ($pedidos as $pedido)
        <div style="border: 1px solid #ccc; padding: 10px; margin: 10px;">
            <h3>Pedido #{{ $pedido->id }} - {{ $pedido->created_at->format('d/m/Y H:i') }}</h3>
            <ul>
                @foreach ($pedido->productos as $item)
                    <li>
                        {{ $item->producto->nombre }} -
                        Cantidad: {{ $item->cantidad }} -
                        Precio unitario: ${{ $item->precio_unitario }} -
                        Subtotal: ${{ $item->precio_unitario * $item->cantidad }}
                    </li>
                @endforeach
            </ul>
            <strong>Total del pedido: ${{ $pedido->total }}</strong>
        </div>
    @empty
        <p>No hay pedidos todavía.</p>
    @endforelse
</x-app-layout>
