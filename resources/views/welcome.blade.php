@extends('layouts.app')

@section('content')
<div id="back-top">
    <a href="#"><img src="img/flecha.png" alt=""></a>
</div>
        <div class="centrado logo_cotas_jumbotron">
            <img src="img/logo_cotas.png" alt="">
        </div>
        <div id="primary_nav_wrap">
            <ul>
                <li><a href="#" class="nav_li_uno">COTAS OCAMPO</a>
                    <ul>
                        <li><a href="#">Integrantes</a></li>
                        <li><a href="#">Estructura</a></li>
                        <li><a href="#">Características</a></li>
                    </ul>
                </li>
                <li><a href="#">SERVICIOS</a>
                    <ul>
                        <li><a href="#">Asesoría y capacitación <br>
en manejo de recursos naturales</a></li>
                        <li><a href="#">Elaboración y gestión de proyectos <br>
agropecuarios y medioambientales</a>
</li>
                        <li><a href="#">Conciliación de conflictos</a></li>
                        <li><a href="#">Prórrogas y transmisión de títulos <br>
de concesión de aguas nacionales</a></li>
                        <li><a href="#">Programas de uso eficiente del agua</a></li>
                        <li><a href="#">Campañas de cultura del agua</a></li>
                        <li><a href="#">Geoposicionamiento de aprovechamientos
de aguas nacionales</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">ACTIVIDADES</a>
                    <ul>
                        <li><a href="#">Plan de manejo del acuífero</a></li>
                        <li><a href="#">Administración del agua</a></li>
                        <li><a href="#">Cultura del agua</a></li>
                        <li><a href="#">Comités rurales de agua potable</a></li>
                        <li><a href="#">Sesiones de Consejo Directivo</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">PLATAFORMA EXPERIMENTAL</a>
                    <ul>
                        <li><a href="#">El Colorado</a></li>
                        <li><a href="#">Rancho el Refugio</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="galeria_slide">
            <div>
                <img src="img/CARRUSEL_LANDING_01.jpg" alt="">
            </div>
            <div>
                <img src="img/CARRUSEL_LANDING_02.jpg" alt="">
            </div>
            <div>
                <img src="img/CARRUSEL_LANDING_03.jpg" alt="">
            </div>

            <div>
                <img src="img/CARRUSEL_LANDING_04.jpg" alt="">
            </div>
        </div>
        <section class="wrap_fancy">
            <div class="titulo fancy">LO QUE SOMOS</div>
            <div class="descripcion">
            <span>COTAS OCAMPO</span> <br>
el organismo en el que instituciones y sociedad civil con conocimientos de la región,<br>
planean, proponen y gestionan<br>
alternativas para el manejo integral del agua.  
            </div>
        </section>
        <section class="wrap_fancy">
            <div class="titulo fancy">LO QUE HACEMOS</div>
            <div class="descripcion">           
En <span>COTAS OCAMPO</span><br>
trabajamos coordinadamente con las dependencias y entidades de la administración pública federal,<br>
estatal y municipal, ONG’s y sociedad civil con conocimientos de la región,<br>
en el logro del aprovechamiento eficiente de las aguas superficiales y subterráneas,<br>
buscando el desarrollo sustentable del acuífero de Ocampo.
                
            </div>
        </section>
        <section class="wrap_cuadritos_pedorros">
            <div class="cuadrito_pedorro">
                <a href="">
                    <div class="circulito_pedorro">
                        <img src="img/circulo_cotas_ocampo.png" alt="">
                    </div>
                    <div class="titulos_trabajos">
                        REGLAS DE INTEGRACIÓN<br>
    Y FUNCIONAMIENTO
                    </div>                  
                </a>
            </div>
            <div class="cuadrito_pedorro">
                <a href="">
                    <div class="circulito_pedorro">
                        <img src="img/circulo_cotas_ocampo.png" alt="">
                    </div>
                    <div class="titulos_trabajos">
                        LEY DE AGUAS<br>
    NACIONALES
                    </div>
                </a>

            </div>
            <div class="cuadrito_pedorro">
                <a href="">
                    <div class="circulito_pedorro">
                        <img src="img/circulo_cotas_ocampo.png" alt="">
                    </div>
                    <div class="titulos_trabajos">
                        PLAN HÍDRICO<br>
    NACIONAL
                    </div>              
                </a>
            </div>
            <div class="cuadrito_pedorro">
                <a href="">
                    <div class="circulito_pedorro">
                        <img src="img/circulo_cotas_ocampo.png" alt="">
                    </div>
                    <div class="titulos_trabajos">
                        PROGRAMA DE MANEJO
    DEL ACUÍFERO<br>
    DE OCAMPO, GTO.
                    </div>          
                </a>

            </div>
            <div class="cuadrito_pedorro">
                <a href="">
                    <div class="circulito_pedorro">
                        <img src="img/circulo_cotas_ocampo.png" alt="">
                    </div>
                    <div class="titulos_trabajos">
                        REGLAMENTO PARA COMITÉS
    RURALES DE AGUA POTABLE
    DEL MUNICIPIO<br>
    DE OCAMPO, GTO.
                    </div>              
                </a>

            </div>
        </section>
@endsection