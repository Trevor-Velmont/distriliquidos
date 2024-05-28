@foreach ($productos as $producto)
    <div class="card" data-id="{{ $producto->idProducto }}" data-existencias="{{ $producto->capacidad }}" data-precio="{{ $producto->precioVenta }}">
        <img src="{{ $producto->rutaImagen }}" alt="Producto">
        <div class="cardContent">
            <p class="cardDescription">{{ $producto->nombre }}</p>
            <span class="cardPlusMinus">
                <i class="fa-solid fa-square-minus"></i>
                <span class="cardCantidad">1</span>
                <i class="fa-solid fa-square-plus"></i>
                <span class="precioTotal">{{ number_format($producto->precioVenta, 0, ',', '.') }}</span> COP
            </span>
        </div>
        <button class="cardButton">Agregar al carrito</button>
    </div>
@endforeach
