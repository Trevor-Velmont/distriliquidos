@extends('layout.base')

@section('content')
<div class="catalogContainer">
    <h1>Catalogo de productos</h1>
    <div class="filterContainer">
        <div class="filter-group custom-select-wrapper">
            <label for="tipoBebida">Tipo de Bebida:</label>
            <select id="tipoBebida" name="tipoBebida" class="custom-select">
                <option value="">Seleccione</option>
                <option value="agua">Agua</option>
                <option value="cerveza">Cerveza</option>
                <option value="gaseosa">Gaseosa</option>
                <option value="jugo">Jugo</option>
                <option value="energizante">Energizante</option>
            </select>
        </div>
        <div class="filter-group" id="marcaGroup" style="display:none;">
            <label for="marcaBebida">Marca:</label>
            <select id="marcaBebida" class="my-select">
                <option value="">Seleccione</option>
                <!-- Las opciones se agregarán dinámicamente -->
            </select>
        </div>
    </div>

    <div class="containerProducts" id="containerProducts">
        @include('partials.productos', ['productos' => $productos])
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tipoBebidaSelect = document.getElementById('tipoBebida');
        const marcaBebidaSelect = document.getElementById('marcaBebida');
        const marcaGroup = document.getElementById('marcaGroup');
        const containerProducts = document.getElementById('containerProducts');

        tipoBebidaSelect.addEventListener('change', function () {
            const tipoBebida = this.value;

            // Obtener las marcas
            fetch(`/catalog/marcas?tipoBebida=${tipoBebida}`)
                .then(response => response.json())
                .then(marcas => {
                    marcaBebidaSelect.innerHTML = '<option value="">Seleccione</option>';
                    marcas.forEach(marca => {
                        const option = document.createElement('option');
                        option.value = marca;
                        option.textContent = marca;
                        marcaBebidaSelect.appendChild(option);
                    });

                    marcaGroup.style.display = marcas.length > 0 ? 'block' : 'none';
                });

            // Filtrar productos
            filterProducts();
        });

        marcaBebidaSelect.addEventListener('change', filterProducts);

        function filterProducts() {
            const tipoBebida = tipoBebidaSelect.value;
            const marcaBebida = marcaBebidaSelect.value;

            let url = `/catalog?tipoBebida=${tipoBebida}`;
            if (marcaBebida) {
                url += `&marcaBebida=${marcaBebida}`;
            }

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.text())
                .then(html => {
                    containerProducts.innerHTML = html;
                    attachEventListeners();
                });
        }

        function attachEventListeners() {
            const minusIcons = document.querySelectorAll('.fa-square-minus');
            const plusIcons = document.querySelectorAll('.fa-square-plus');

            minusIcons.forEach(icon => {
                icon.addEventListener('click', function () {
                    const card = this.closest('.card');
                    const quantitySpan = card.querySelector('.cardCantidad');
                    let quantity = parseInt(quantitySpan.textContent);
                    if (quantity > 1) {
                        quantity--;
                        quantitySpan.textContent = quantity;
                        updatePrice(card, quantity);
                    }
                });
            });

            plusIcons.forEach(icon => {
                icon.addEventListener('click', function () {
                    const card = this.closest('.card');
                    const quantitySpan = card.querySelector('.cardCantidad');
                    let quantity = parseInt(quantitySpan.textContent);
                    const maxQuantity = parseInt(card.getAttribute('data-existencias'));
                    if (quantity < maxQuantity) {
                        quantity++;
                        quantitySpan.textContent = quantity;
                        updatePrice(card, quantity);
                    }
                });
            });

            // Agregar evento de clic para agregar al carrito
            const addToCartButtons = document.querySelectorAll('.cardButton');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const card = this.closest('.card');
                    const productId = card.dataset.id;
                    const productName = card.querySelector('.cardDescription').textContent;
                    const productPrice = card.querySelector('.precioTotal').textContent;

                    let cart = JSON.parse(localStorage.getItem('cart')) || [];
                    cart.push({
                        id: productId,
                        name: productName,
                        price: productPrice
                    });
                    localStorage.setItem('cart', JSON.stringify(cart));
                });
            });
        }

        function updatePrice(card, quantity) {
            const priceElement = card.querySelector('.precioTotal');
            const unitPrice = parseFloat(card.getAttribute('data-precio'));
            const totalPrice = unitPrice * quantity;
            priceElement.textContent = new Intl.NumberFormat('es-CO').format(totalPrice);
        }

        // Inicializar los event listeners al cargar la página
        attachEventListeners();
    });
</script>
@endsection
