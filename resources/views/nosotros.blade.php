@extends('plantilla')

@section('title', 'Nosotros')

@section('content')

{{-- Hero Header Minimalista --}}
<div class="bg-dark text-white py-5 text-center position-relative" style="background: linear-gradient(135deg, #111 0%, #222 100%);">
    <div class="container py-4">
        <span class="text-uppercase fw-bold text-danger" style="letter-spacing: 3px; font-size: 0.9rem;">Detrás del Tatami</span>
        <h1 class="display-4 fw-black text-uppercase mt-2" style="letter-spacing: -1px;">La Forja de TatamiHub</h1>
        <div style="background-color: #ed1c24; height: 4px; width: 60px; border-radius: 2px;" class="mx-auto mt-3"></div>
    </div>
</div>

{{-- Sección: ¿Quiénes Somos? --}}
<div class="container my-5 py-4">
    <div class="row align-items-center">
        <div class="col-md-5 mb-4 mb-md-0 text-center position-relative">
            <div class="position-absolute top-50 start-50 translate-middle bg-danger opacity-10 rounded-circle" style="width: 300px; height: 300px; filter: blur(50px);"></div>
            <img src="{{ asset('img/nosotros/chimpance-peleando.png') }}"
                 alt="Guerrero TatamiHub"
                 class="img-fluid position-relative"
                 style="max-width: 380px; filter: drop-shadow(0 15px 20px rgba(0,0,0,0.15));">
        </div>

        <div class="col-md-7 ps-md-5">
            <div class="mb-4">
                <span class="badge bg-danger text-uppercase px-3 py-2 mb-2" style="font-size: 0.75rem; letter-spacing: 1px;">Propósito</span>
                <h2 class="fw-bold text-uppercase text-dark" style="letter-spacing: -1px; font-size: 2.5rem;">
                    ¿Quiénes somos?
                </h2>
            </div>

            <p class="text-dark fs-5 mb-3" style="line-height: 1.8; font-weight: 400;">
                <span class="fw-bold text-danger">TATAMIHUB</span> no nació en una oficina, nació del sudor del entrenamiento diario. Somos una empresa dedicada a proporcionar equipamiento de alta calidad para artes marciales, fundada por un grupo de entusiastas y emprendedores apasionados por la cultura del combate y la disciplina.
            </p>

            <p class="text-muted" style="font-size: 1.05rem; line-height: 1.8;">
                Nuestro objetivo es que ningún practicante detenga su progreso por falta de herramientas confiables. Acercamos productos duraderos que optimizan tu rendimiento, manteniendo la relación costo-calidad más competitiva del mercado nacional.
            </p>
        </div>
    </div>
</div>

{{-- Sección: Números de la Comunidad (Contadores Creativos) --}}
<div class="border-top border-bottom bg-white py-5">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3">
                <h3 class="display-5 fw-bold text-dark m-0" style="font-family: monospace;">+1,500</h3>
                <p class="text-muted text-uppercase fw-bold small mt-1" style="letter-spacing: 1px;">Gis Entregados</p>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="display-5 fw-bold text-danger m-0" style="font-family: monospace;">100%</h3>
                <p class="text-muted text-uppercase fw-bold small mt-1" style="letter-spacing: 1px;">Región Satisfecha</p>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="display-5 fw-bold text-dark m-0" style="font-family: monospace;">24/7</h3>
                <p class="text-muted text-uppercase fw-bold small mt-1" style="letter-spacing: 1px;">Soporte Atleta</p>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="display-5 fw-bold text-danger m-0" style="font-family: monospace;">+40</h3>
                <p class="text-muted text-uppercase fw-bold small mt-1" style="letter-spacing: 1px;">Academias Aliadas</p>
            </div>
        </div>
    </div>
</div>

{{-- Sección: Nuestra Historia (Línea de Tiempo Dinámica) --}}
<div class="container my-5 py-5">
    <div class="row justify-content-center mb-5 text-center">
        <div class="col-auto">
            <span class="text-danger fw-bold text-uppercase small" style="letter-spacing: 2px;">El Camino Recorrido</span>
            <h2 class="fw-bold text-uppercase mt-1" style="letter-spacing: -1px; font-size: 2.5rem;">
                Nuestra Historia
            </h2>
            <div style="background-color: #ed1c24; height: 4px; width: 100px; border-radius: 2px;" class="mx-auto mt-2"></div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row align-items-center mb-5">
                <div class="col-md-3 text-center text-md-end">
                    <span class="badge bg-dark px-3 py-1 mb-2 text-uppercase" style="letter-spacing: 1px; font-size: 0.75rem;">Fase 1</span>
                    <h3 class="fw-bold display-4 m-0 text-danger" style="line-height: 1;">2024</h3>
                    <span class="text-uppercase fw-bold text-muted small" style="letter-spacing: 1px;">El Chispazo</span>
                </div>
                <div class="col-md-9 border-start border-2 ps-4" style="border-color: #ed1c24 !important;">
                    <h4 class="fw-bold text-dark mb-2">Nacidos en el Tatami</h4>
                    <p class="text-muted m-0 fs-6" style="line-height: 1.7;">
                        Todo comenzó entre entrenamientos pesados, kimonos rotos y la constante frustración de no conseguir equipamiento de calidad en la región sin pagar fortunas en envíos. Como practicantes activos, entendíamos el dolor de tener que esperar semanas por un Gi (kimono) o un protector que realmente aguantara el roce diario. Ahí nació la idea: crear un centro de distribución especializado hecho <em>por y para</em> luchadores.
                    </p>
                </div>
            </div>

            <div class="row align-items-center mb-5">
                <div class="col-md-3 text-center text-md-end">
                    <span class="badge bg-dark px-3 py-1 mb-2 text-uppercase" style="letter-spacing: 1px; font-size: 0.75rem;">Fase 2</span>
                    <h3 class="fw-bold display-4 m-0 text-danger" style="line-height: 1;">2025</h3>
                    <span class="text-uppercase fw-bold text-muted small" style="letter-spacing: 1px;">A Pulmón</span>
                </div>
                <div class="col-md-9 border-start border-2 ps-4" style="border-color: #ed1c24 !important;">
                    <h4 class="fw-bold text-dark mb-2">Del Cuarto a las Redes</h4>
                    <p class="text-muted m-0 fs-6" style="line-height: 1.7;">
                        Empezamos stockeando unos pocos kimonos y cinturones en una habitación, moviendo el catálogo a puro boca en boca dentro de las academias locales. Cada entrega era personalizada, conversando con los profesores y alumnos para entender qué marcas buscaban y qué costuras aguantaban mejor los agarres más duros. La respuesta de la comunidad marcial nos obligó a pensar en grande.
                    </p>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-3 text-center text-md-end">
                    <span class="badge bg-danger px-3 py-1 mb-2 text-uppercase" style="letter-spacing: 1px; font-size: 0.75rem;">Actualidad</span>
                    <h3 class="fw-bold display-4 m-0 text-dark" style="line-height: 1;">2026</h3>
                    <span class="text-uppercase fw-bold text-muted small" style="letter-spacing: 1px;">Consolidación</span>
                </div>
                <div class="col-md-9 border-start border-2 ps-4" style="border-color: #ed1c24 !important;">
                    <h4 class="fw-bold text-dark mb-2">E-Commerce y Expansión Nacional</h4>
                    <p class="text-muted m-0 fs-6" style="line-height: 1.7;">
                        Hoy, con el lanzamiento de nuestra plataforma web e-commerce y alianzas estratégicas con las marcas internacionales más pesadas del mercado, <strong>TatamiHub</strong> se transforma en el Hub de referencia en el NEA y todo el país. Logramos abrir nuestro punto físico de atención en las instalaciones del Shopping Centenario y automatizar envíos a toda la Argentina, manteniendo siempre el mismo norte: el respeto por la disciplina y el soporte incondicional al atleta.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Sección: Filosofía (Bloque Destacado Tipo Cita de Honor) --}}
<div class="bg-dark text-white py-5 my-5 shadow-lg position-relative overflow-hidden" style="background-image: linear-gradient(rgba(0,0,0,0.85), rgba(0,0,0,0.85));">
    <div class="container text-center py-4 position-relative z-index-1">
        <span class="text-danger fs-1 d-block mb-2" style="font-family: Georgia, serif; line-height: 0;">“</span>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <p class="fs-3 fw-light lh-base italic-style" style="letter-spacing: -0.5px;">
                    En <span class="fw-bold text-danger">TATAMIHUB</span> entendemos que el tatami es un lugar sagrado donde se forja el carácter. Nuestra filosofía no se basa solo en vender productos, sino en acompañar el camino de cada practicante, <span class="text-danger fw-bold">desde el cinturón blanco hasta el maestro</span>.
                </p>
                <div style="background-color: #ed1c24; height: 2px; width: 50px;" class="mx-auto mt-4"></div>
                <small class="text-uppercase fw-bold text-muted mt-2 d-block" style="letter-spacing: 2px; font-size: 0.75rem;">Código de Honor TatamiHub</small>
            </div>
        </div>
    </div>
</div>

{{-- Sección: Nuestro Equipo (Fichas de Atletas Rediseñadas) --}}
<div class="container my-5 py-4 text-center">
    <div class="row justify-content-center mb-5">
        <div class="col-auto">
            <span class="text-danger fw-bold text-uppercase small" style="letter-spacing: 2px;">Los Fundadores & Staff</span>
            <h2 class="fw-bold text-uppercase mt-1" style="letter-spacing: -1px; font-size: 2.5rem;">
                Nuestro equipo
            </h2>
            <div style="background-color: #ed1c24; height: 4px; width: 100px; border-radius: 2px;" class="mx-auto mt-2"></div>
        </div>
    </div>

    {{-- Fila 1: Desarrolladores (Los Carnets Reales) --}}
    <div class="row justify-content-center align-items-center g-5 mb-5">
        <div class="col-md-5">
            <div class="card border-0 bg-transparent align-items-center">
                <div class="position-relative overflow-hidden rounded-3 shadow-sm mb-3 group-hover-effect" style="max-width: 380px;">
                    <img src="{{ asset('img/nosotros/carnet1.png') }}"
                         alt="Carnet Lorenzo"
                         class="img-fluid carnet-hover"
                         style="transition: all 0.3s ease; filter: drop-shadow(0 5px 10px rgba(0,0,0,0.1));">
                </div>
                <span class="badge bg-dark text-uppercase mb-1 px-3" style="letter-spacing: 1px;">Co-Founder & Full-Stack Developer</span>
                <h4 class="fw-bold m-0 text-dark">Lorenzo Marder</h4>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card border-0 bg-transparent align-items-center">
                <div class="position-relative overflow-hidden rounded-3 shadow-sm mb-3 group-hover-effect" style="max-width: 380px;">
                    <img src="{{ asset('img/nosotros/carnet2.png') }}"
                         alt="Carnet Alejandro"
                         class="img-fluid carnet-hover"
                         style="transition: all 0.3s ease; filter: drop-shadow(0 5px 10px rgba(0,0,0,0.1));">
                </div>
                <span class="badge bg-danger text-uppercase mb-1 px-3" style="letter-spacing: 1px;">Co-Founder & Full-Stack Developer</span>
                <h4 class="fw-bold m-0 text-dark">Alejandro Gimenez</h4>
            </div>
        </div>
    </div>

    {{-- Fila 2: Nuevos Integrantes Inventados (Staff) --}}
    <div class="row justify-content-center align-items-center g-5">
        <div class="col-md-5">
            <div class="card border-0 bg-transparent align-items-center">
                <div class="position-relative overflow-hidden rounded-3 shadow-sm mb-3 group-hover-effect" style="max-width: 380px;">
                    <img src="{{ asset('img/nosotros/chimpance-peleando.png') }}"
                         alt="Sofía Benítez"
                         class="img-fluid carnet-hover p-4 bg-light"
                         style="max-width: 380px; height: 240px; object-fit: contain; filter: drop-shadow(0 5px 10px rgba(0,0,0,0.1)); border-radius: 8px;">
                </div>
                <span class="badge bg-dark text-uppercase mb-1 px-3" style="letter-spacing: 1px;">UI/UX Designer & Product Owner</span>
                <h4 class="fw-bold m-0 text-dark">Sofía Benítez</h4>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card border-0 bg-transparent align-items-center">
                <div class="position-relative overflow-hidden rounded-3 shadow-sm mb-3 group-hover-effect" style="max-width: 380px;">
                    <img src="{{ asset('img/nosotros/chimpance-peleando.png') }}"
                         alt="Mateo Silva"
                         class="img-fluid carnet-hover p-4 bg-light"
                         style="max-width: 380px; height: 240px; object-fit: contain; filter: drop-shadow(0 5px 10px rgba(0,0,0,0.1)); border-radius: 8px;">
                </div>
                <span class="badge bg-danger text-uppercase mb-1 px-3" style="letter-spacing: 1px;">Marketing & Logistics Manager</span>
                <h4 class="fw-bold m-0 text-dark">Mateo Silva</h4>
            </div>
        </div>
    </div>
</div>

{{-- Sección: Preguntas Frecuentes (FAQ Rediseñada) --}}
<div class="bg-light py-5 border-top border-bottom">
    <div class="container py-4">
        <div class="row justify-content-center mb-5 text-center">
            <div class="col-auto">
                <span class="text-danger fw-bold text-uppercase small" style="letter-spacing: 2px;">Soporte Inmediato</span>
                <h2 class="fw-bold text-uppercase mt-1" style="letter-spacing: -1px; font-size: 2.5rem;">
                    Preguntas frecuentes
                </h2>
                <div style="background-color: #ed1c24; height: 4px; width: 100px; border-radius: 2px;" class="mx-auto mt-2"></div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="accordion accordion-flush shadow-sm rounded-3 overflow-hidden" id="accordionFAQ">

                    {{-- FAQ 1 --}}
                    <div class="accordion-item border-0 mb-2 rounded-3">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-bold collapsed text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <span class="text-danger me-2">//</span> ¿Hacen envíos a todo el país?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body text-muted bg-white">
                                Sí, hacemos envíos a todo el país mediante empresas líderes como <strong>OCA</strong> y <strong>Andreani</strong>, garantizando que tu pedido llegue seguro a tu puerta o sucursal más cercana.
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="accordion-item border-0 mb-2 rounded-3">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <span class="text-danger me-2">//</span> ¿Los kimonos vienen con cinturón incluido?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body text-muted bg-white">
                                Por lo general, los kimonos de BJJ y Judo se venden por separado del cinturón, a menos que la descripción del kit específico en el catálogo aclare lo contrario.
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="accordion-item border-0 rounded-3">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <span class="text-danger me-2">//</span> ¿Tienen tienda física?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body text-muted bg-white">
                                ¡Sí! Nos encontrás en <strong>Av. Centenario 3535 (Centenario Shopping), Local 15, Corrientes</strong>. Podés consultar mapas y horarios detallados haciendo clic en el botón de contacto abajo.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Botón de Acción Final Animado --}}
<div class="d-flex justify-content-center my-5 py-4">
    <a href="{{ url('/contacto') }}" style="text-decoration: none;">
        <button class="animated-button">
            <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
            </svg>
            <span class="text">Contactanos</span>
            <span class="circle"></span>
            <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path>
            </svg>
        </button>
    </a>
</div>

@endsection
