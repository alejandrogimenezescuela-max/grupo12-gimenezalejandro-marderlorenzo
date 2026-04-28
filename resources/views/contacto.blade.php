@extends('plantilla')
@section('title', 'Contacto')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row"> <div class="col-md-6">
            <div class="d-flex align-items-center mb-4">
                <img src="{{ asset('img/miscalenea/logoDragon.png') }}" alt="Logo" class="me-3" style="height: 60px; width: auto;">
                <div class="text-start">
                    <h1 style="color: #ed1c24; font-weight: bold; text-transform: uppercase; margin-bottom: 5px;">
                        Contactanos:
                    </h1>
                    <div style="background-color: #ed1c24; height: 3px; width: 80px; border-radius: 2px;"></div>
                </div>
            </div>

            <div class="mb-4 ps-2">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-whatsapp me-2" style="font-size: 1.5rem; color: #e20606;"></i>
                    <a href="https://wa.me/543794123456" class="text-decoration-none" style="color: #ff0404; font-size: 1.2rem;">
                        +54 379 4123456
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <i class="bi bi-instagram me-2" style="font-size: 1.5rem; color: #e20606;"></i>
                    <a href="https://instagram.com/tatamihub" target="_blank" class="text-decoration-none" style="color: #ff0404; font-size: 1.2rem;">
                        @tatamihub
                    </a>
                </div>
            </div>

            <div class="contact-form">
                <span class="heading">Envianos un email</span>
                <form>
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" required="">

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required="">

                    <label for="message">Mensaje:</label>
                    <textarea id="message" name="message" required=""></textarea>

                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div> <div class="col-md-6 d-flex flex-column mt-4 mt-md-0">
            <h3 class="mb-4" style="font-weight: bold; color: #ed1c24; text-transform: uppercase; font-size: 1.5rem;">
                Nuestra Ubicación
            </h3>

            <div class="flex-grow-1">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3539.926500881272!2d-58.80903688817393!3d-27.47154747621982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b6ca10e6e2b%3A0xa03f567172e58c10!2sCentenario%20Shopping!5e0!3m2!1ses!2sar!4v1776471182933!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    width="100%"
                    height="100%"
                    style="border:0; border-radius: 15px; min-height: 450px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <div class="row mt-5">
    <div class="col-12 text-center">
        <h4 style="font-weight: bold; color: #333;">Horarios de Atención</h4>
        <p class="text-muted">Lunes a Viernes: 09:00 - 21:00 | Sábados: 09:00 - 13:00</p>
    </div>
</div>
            </div>
        </div> </div> </div> @endsection
