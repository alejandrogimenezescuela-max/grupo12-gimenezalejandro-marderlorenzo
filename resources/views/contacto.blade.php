@extends('plantilla');
@section('title', 'Contacto');

@section('content');

 <div class="container mt-5 mb-4"> 
    <div class="d-flex align-items-center"> <img src="{{ asset('img/logoDragon.png') }}" alt="Logo" class="me-3" style="height: 60px; width: auto;">
    <div class="text-start"> <h1 style="color: #ed1c24; font-weight: bold; text-transform: uppercase; margin-bottom: 5px;">
            Contactanos:
        </h1>
        <div style="background-color: #ed1c24; height: 3px; width: 80px; border-radius: 2px;"></div>
    </div>
</div>

<div class="container mt-4 mb-4">

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
    <input type="text" required="">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required="">
    <label for="message">Mensaje:</label>
    <textarea id="message" name="message" required=""></textarea>
    <button type="submit">Enviar</button>
  </form>
</div>

@endsection;