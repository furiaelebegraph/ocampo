<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>COTAS OCAMPO</title>
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/general.css">

</head>
<body>
    <div class="contenido">
        <nav class="navbar">
            <div class="min_navbar">
                <div class="cosas_nav sociales">
                    <a class="link_social" href="https://www.facebook.com/cotas.ocampo?fref=ts" target="_blank">
                        <img src="img/btn_facebook_cotas_ocampo.png" alt="facebook">
                    </a>
                    <a class="link_social" href="https://twitter.com" target="_blank">
                        <img src="img/btn_twitter_cotas_ocampo.png"  alt="twitter">
                    </a>
                </div>
                <div class="cosas_nav btn_navbar">
                    <div>
                        <a href="index.php">INICIO</a>
                    </div>
                    <img src="img/separador_nav.png" alt="">
                    <div>
                        <a href="noticias.php">NOTICIAS</a>
                    </div>
                    <img src="img/separador_nav.png" alt="">
                    <div>
                        <a href="galeria.php">GALERIA</a>
                    </div>
                    <img src="img/separador_nav.png" alt="">
                    <div>
                        <a href="contacto.php">CONTACTO</a>
                    </div>
                </div>              
            </div>
        </nav>

        @yield('content')

    </div>
    <section class="consejo_agua">
        CONSEJO TECNICO DE AGUAS DE OCAMPO GTO.
    </section>
    <section class="footer">
        <div>
            <img src="img/logo_cotas_blanco.png" alt="">
        </div>
        <div>
            <div class="titulo_footer">
                UBICACIÓN

            </div>
            <div>
                Escobedo 204-A <br>
                Colonia Centro C.P. 37630
                Ocampo, Gto.
            </div>
        </div>
        <div>
            <div class="titulo_footer">CONTACTO</div>
            <div>
                cotasocampo.com.mx
                cotas_ocampo@yahoo.com.mx <br>
                T (428) 683 04 29
            </div>
        </div>
        <div>
            <div class="titulo_footer">CONAGUA</div>
            <div>
                <a href="http://conagua.gob.mx/">www.conagua.gob.mx</a>
            </div>
        </div>
    </section>
</body>
<script src="js/jquery.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/general.js"></script>
</html>