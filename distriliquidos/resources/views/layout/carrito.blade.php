@extends('layout.base')

@section('content')
    <div class="cartContainer">
       <h1>Carrito</h1>
            <div class="cartItems">
                {{-- @foreach --}}
                    <div class="cartItem">
                        <img src="images/uploads/canada dry ginger ale pet 1.5lx1und.png" alt="Producto" class="cartImage">
                        <div class="cartItemDetails">
                            <div class="itemNombreContainer">
                                {{-- <span class="itemNombre">{{ $item['name'] }}</span> --}}
                                <span class="itemNombre">Agua pool</span>
                            </div>
                            <div class="itemDescription">
                                <span class="itemCantidad">
                                    <i class="fa-solid fa-square-minus" aria-hidden="true"></i>
                                    {{-- Cantidad: ${{ $item['quantity'] }} --}}
                                    Cantidad: 5
                                    <i class="fa-solid fa-square-plus" aria-hidden="true"></i>
                                </span>
                                <span class="itemPrecio">
                                    {{-- Precio: ${{ $item['price'] }} --}}
                                    Precio: 10.000
                                </span>
                            </div>
                        </div>
                        <form class="cartEliminar" action="http://localhost/projectCopia/distriliquidos/public/cart/remove" method="POST" style="display:inline;">
                            <input type="hidden" name="_token" value="PavRwHbIlqRT8a3I9U62V4tKrL9LnvJI7jUVpwky" autocomplete="off">                        <input type="hidden" name="id" value="33">
                            <button type="submit" class="btnEliminar">
                                <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                            </button>
                        </form>   
                    </div>
                {{-- @endforeach --}}
                    <div class="cartItem">
                        <img src="images/uploads/canada dry ginger ale pet 1.5lx1und.png" alt="Producto" class="cartImage">
                        <div class="cartItemDetails">
                            <div class="itemNombreContainer">
                                {{-- <span class="itemNombre">{{ $item['name'] }}</span> --}}
                                <span class="itemNombre">Agua pool</span>
                            </div>
                            <div class="itemDescription">
                                <span class="itemCantidad">
                                    <i class="fa-solid fa-square-minus" aria-hidden="true"></i>
                                    {{-- Cantidad: ${{ $item['quantity'] }} --}}
                                    Cantidad: 5
                                    <i class="fa-solid fa-square-plus" aria-hidden="true"></i>
                                </span>
                                <span class="itemPrecio">
                                    {{-- Precio: ${{ $item['price'] }} --}}
                                    Precio: 10.000
                                </span>
                            </div>
                        </div>
                        <form class="cartEliminar" action="http://localhost/projectCopia/distriliquidos/public/cart/remove" method="POST" style="display:inline;">
                            <input type="hidden" name="_token" value="PavRwHbIlqRT8a3I9U62V4tKrL9LnvJI7jUVpwky" autocomplete="off">                        <input type="hidden" name="id" value="33">
                            <button type="submit" class="btnEliminar">
                                <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                            </button>
                        </form>   
                    </div>
            </div>
    </div>

@endsection