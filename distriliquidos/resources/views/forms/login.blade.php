@extends('layout.base')

@section('content')
    <div class="containerLoginSignin">
        <div class="containerLogin">

            <form>
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
                <button class="login">Iniciar Sesion</button>
                <div class="links"></div>
            </form>

            {{-- <h1>💻Ingresar con:</h1> --}}
            <h5 for="">También puedes ingresar con:</h5>
            <div class="social-login">
                <button class="google">
                    <i class='bx bxl-google'></i>
                    Google
                </button>
                <button class="google">
                    <i class='bx bxl-apple'></i>
                    Apple
                </button>
            </div>
            
            <div class="divider">
                <div class="line"></div>
                <p>O</p>
                <div class="line"></div>
            </div>

            <a href="#">Olvidaste tu ontraseña?</a>
            <a href="{{route('signin')}}">Aún NO tienes una Cuenta?</a>
        </div>
    </div>

@endsection