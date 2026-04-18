@extends("plantilla")
@section('title', 'Perfil')
@section('content')

<style>
    input[type="checkbox"] {
    accent-color: #ff0000; /* El rojo de TatamiHUB */
    width: 16px;           /* Un poquito más grande para que se vea bien */
    height: 16px;
    cursor: pointer;
}
    /* Contenedor principal para centrar todo en la pantalla */
    .login-wrapper {
        min-height: 85vh; /* Ocupa casi toda la altura de la pantalla */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    /* Estilos de tu Formulario (Más grande y con sombra) */
    .form {
        display: flex;
        flex-direction: column;
        gap: 15px;
        background-color: #ffffff;
        padding: 45px; /* Más espacio interno */
        width: 100%;
        max-width: 500px; /* Ancho imponente */
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1); /* Sombra suave */
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .flex-column > label {
        color: #000000;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .inputForm {
        border: 1.5px solid #ecedec;
        border-radius: 10px;
        height: 55px; /* Inputs más altos */
        display: flex;
        align-items: center;
        padding-left: 15px;
        transition: 0.2s ease-in-out;
    }

    .input {
        margin-left: 10px;
        border: none;
        width: 85%;
        height: 100%;
        outline: none;
    }

    .inputForm:focus-within {
        border: 1.5px solid #ed1c24; /* Rojo TatamiHUB al hacer foco */
    }

    .flex-row {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
        justify-content: space-between;
    }

    .span {
        font-size: 14px;
        color: #ed1c24;
        font-weight: 600;
        cursor: pointer;
    }

    .button-submit {
        margin: 20px 0 10px 0;
        background-color: #ed1c24; /* Botón Rojo de la marca */
        border: none;
        color: white;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
        height: 55px;
        width: 100%;
        cursor: pointer;
        transition: 0.3s;
    }

    .button-submit:hover {
        background-color: #c4131a;
    }

    .p {
        text-align: center;
        color: black;
        font-size: 14px;
        margin: 5px 0;
    }

    .btn {
        margin-top: 10px;
        width: 100%;
        height: 50px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 500;
        gap: 10px;
        border: 1px solid #ededef;
        background-color: white;
        cursor: pointer;
        transition: 0.2s ease-in-out;
    }

    .btn:hover {
        border: 1px solid #ed1c24;
    }

    /* Estilo para el texto de bienvenida */
    .welcome-text h1 {
        font-size: 4rem;
        font-weight: 900;
        color: #000000;
        margin-bottom: 10px;
    }
</style>

<div class="login-wrapper">
    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-md-6 d-none d-md-block px-5">
                <div class="welcome-text">
                    <h1>¡Hola de nuevo!</h1>
                    <p class="lead">
                        Entrená tu mente, potenciá tu cuerpo.<br>
                        Entrá a tu cuenta de TatamiHUB para ver tus pedidos y suplementos favoritos.
                    </p>
                    <img src="{{ asset('img/logoDragon.png') }}" alt="Logo" class="me-3" style="height: 60px; width: auto;">
                </div>
            </div>

            <div class="col-md-6 d-flex justify-content-center">
                <form class="form">
                    <h2 class="text-center mb-4" style="font-weight: 800;">INICIAR SESIÓN</h2>
                    
                    <div class="flex-column">
                        <label>Email</label>
                    </div>
                    <div class="inputForm">
                        <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></svg>
                        <input type="text" class="input" placeholder="Ingrese su Email">
                    </div>
                    
                    <div class="flex-column">
                        <label>Contraseña</label>
                    </div>
                    <div class="inputForm">
                        <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>
                        <input type="password" class="input" placeholder="Ingrese su Contraseña">
                    </div>
                    
                    <div class="flex-row">
                        <div>
                            <input type="checkbox">
                            <label style="font-size: 14px;">Recordarme</label>
                        </div>
                        <span class="span">¿Olvidaste tu contraseña?</span>
                    </div>

                    <button type="submit" class="button-submit">Sign In</button>
                    
                    <p class="p">¿No tenés una cuenta? <span class="span">Crear cuenta</span></p>
                    <p class="p" style="color: #000000; margin: 15px 0;">O ingresá con</p>

                    <div class="flex-row">
                        <button type="button" class="btn">
                            <img src="https://www.gstatic.com/images/branding/product/1x/gsa_512dp.png" width="20"> Google
                        </button>
                        <button type="button" class="btn">
                            <svg height="20" width="20" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg> GitHub
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection