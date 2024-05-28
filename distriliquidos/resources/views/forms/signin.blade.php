@extends('layout.base')

@section('content')
    <div class="containerLoginSignin">
        <div class="containerLogin">
            <h1>Crear una Cuenta 💻</h1>

            <form>
                <label for="nombre">Nombre</label>
                <div class="custome-input">
                    <input type="text" name="nombre" placeholder="Escriba su Nombre..." autocomplete="off">
                    <i class='bx bx-user'></i>
                </div>
                <label for="apellido">Apellido</label>
                <div class="custome-input">
                    <input type="text" name="apellido" placeholder="Escriba su Apellido..." autocomplete="off">
                    <i class='bx bx-user'></i>
                </div>
                <label for="email">Correo Electronico</label>
                <div class="custome-input">
                    <input type="email" name="email" placeholder="Escriba su Correo..." autocomplete="off">
                    <i class='bx bx-at'></i>
                </div>
                <label for="Password">Contraseña</label>
                <div class="custome-input">
                    <input type="password" name="Password" placeholder="Escriba su Contraseña...">
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button class="login">Registrarse</button>
                <div class="links"></div>
                <a href="{{route('login')}}">Ya tienes una Cuenta?</a>
            </form>
        </div>
    </div>

@endsection