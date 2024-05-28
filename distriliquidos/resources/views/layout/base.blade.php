<!-- <!DOCTYPE html> -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/9371cd63b1.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="sidebar">
        <div class="logoContent">
            <div class="logo">
                <img src="{{ asset('images/iconos/distriliquidos.png') }}" alt="logo">
                <div class="logoName">Distriliquidos</div>
            </div>
            <i class="fa-solid fa-bars" id="btn"></i>
        </div>
        <ul class="navList">
            <li>
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search...">
                <span class="tooltip">Search</span>
            </li>
            <li>
                <a href="{{ route('catalog') }}">
                    <i class="fa-solid fa-box"></i>
                    <span class="linksName">Catalogo</span>
                </a>
                <span class="tooltip">Catalogo</span>
            </li>

            <li>
                <a href="{{ route('carrito') }}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="linksName">Carrito</span>
                </a>
                <span class="tooltip">Carrito</span>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-heart"></i>
                    <span class="linksName">Guardado</span>
                </a>
                <span class="tooltip">Guardado</span>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-phone"></i>
                    <span class="linksName">Contactanos</span>
                </a>
                <span class="tooltip">Contactanos</span>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-globe"></i>
                    <span class="linksName">Quienes somos</span>
                </a>
                <span class="tooltip">Quienes somos</span>
            </li>
            <li>
                <a href="{{ route('login') }}">
                    <i class="fa-solid fa-user"></i>
                    <span class="linksName">Usuario</span>
                </a>
                <span class="tooltip">Usuario</span>
            </li>
        </ul>
        <div class="profileContent">
            <div class="profile">
                <div class="profileDetails">
                    <img src="https://api.dicebear.com/8.x/bottts-neutral/svg" alt="fotoPerfil">
                    <div class="nameJob">
                        <div class="name">Rogelio</div>
                        {{-- <div class="job">Cliente</div> --}}
                    </div>
                </div>
                <i class="fa-solid fa-right-from-bracket" id="logOut"></i>
            </div>
        </div>
    </div>
    <div class="homeContent">
        @yield('content')
    </div>
    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");
        let searchBtn = document.querySelector(".fa-magnifying-glass");

        btn.onclick = function(){
            sidebar.classList.toggle("active");
        }
        searchBtn.onclick = function(){
            sidebar.classList.toggle("active");
        }
    </script>
    <script>
        const tipoBebida = document.getElementById('tipoBebida');
        const marcaGroup = document.getElementById('marcaGroup');
        const marcaBebida = document.getElementById('marcaBebida');
    
        const marcas = {
            agua: ["Brisa", "Cristal", "Manantial"],
            cerveza: ["Aguila", "Club Colombia", "Corona", "Budweiser"],
            gaseosa: ["Pool", "Coca-Cola", "Pepsi"],
            jugo: ["Hit", "California", "Nectar"],
            energizante: ["Speed Max", "Gatorade", "Vive100", "RedBull"]
        };
    
        tipoBebida.addEventListener('change', function() {
            const tipoSeleccionado = tipoBebida.value;
            if (tipoSeleccionado) {
                // Mostrar el grupo de marcas y limpiar las opciones anteriores
                marcaGroup.style.display = 'block';
                marcaBebida.innerHTML = '<option value="">Seleccione</option>';
                // Agregar nuevas opciones de marcas
                marcas[tipoSeleccionado].forEach(function(marca) {
                    const option = document.createElement('option');
                    option.value = marca.toLowerCase();
                    option.textContent = marca;
                    marcaBebida.appendChild(option);
                });
            } else {
                marcaGroup.style.display = 'none';
                marcaBebida.innerHTML = '';
            }
        });
    </script>

</body>
</html>
