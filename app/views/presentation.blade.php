<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=1024" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>Desde mi Calle - Presentacion</title>

    <meta name="description" content="impress.js is a presentation tool based on the power of CSS3 transforms and transitions in modern browsers and inspired by the idea behind prezi.com." />
    <meta name="author" content="Bartek Szopka" />

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:regular,semibold,italic,italicsemibold|PT+Sans:400,700,400italic,700italic|PT+Serif:400,700,400italic,700italic" rel="stylesheet" />


    <link href="{{asset('presentation_files/css/icons.css')}}" rel="stylesheet" />
    <link href="{{asset('presentation_files/css/impress-demo.css')}}" rel="stylesheet" />

    <link rel="shortcut icon" href="{{asset('presentation_files/favicon.png')}}" />
    <link rel="apple-touch-icon" href="{{asset('presentation_files/apple-touch-icon.png')}}" />
</head>

<body class="impress-not-supported">

<div class="fallback-message">
    <p>Your browser <b>doesn't support the features required</b> by impress.js, so you are presented with a simplified version of this presentation.</p>
    <p>For the best experience please use the latest <b>Chrome</b>, <b>Safari</b> or <b>Firefox</b> browser.</p>
</div>
<div id="impress">

    <div id="bored" class="step slide" data-x="-1000" data-y="-1500" style="background-image: url('{{asset('presentation_files/img/2.jpg')}}'); background-size: cover; text-align:center;">
        <br/><br/> <img src="{{asset('presentation_files/img/logo.png')}}"><br/><br/>
        <p style="color: #fff">Un proyecto auspiciado por:<br/><img src="{{asset('presentation_files/img/logo-hivos.png')}}">&nbsp;&nbsp;&nbsp;<img src="{{asset('presentation_files/img/logo-tech.png')}}"></p>
    </div>

    <div class="step slide" data-x="0" data-y="-1500" style="background-image: url('{{asset('presentation_files/img/4.jpg')}}'); background-size: cover; color:#fff; background-position: center;">
        <h2>DATOS CONTEXTUALES <span class="icon-stats-dots"></span></h2>
        <ul  class="side-column">
            <li>En La Paz hay 20 personas por Kilómetro cuadrado (Datos Fundación Milenio, 2013). Haciendo de esta ciudad una de las más pobladas de Bolivia.</li>
            <li>Un 83% de los bolivianos posee un teléfono celular (Página Siete, 2013) </li>
        </ul>
    </div>

    <div class="step slide" data-x="1000" data-y="-1500" style="background-image: url('{{asset('presentation_files/img/1.jpg')}}'); background-size: cover;  color:#fff; background-position: center;">
        <h2>DATOS CONTEXTUALES <span class="icon-stats-dots"></span></h2>
        <ul   class="side-column">
            <li>En La Paz un 9,9% de la población no tiene celular(Página Siete, 2013).</li>
            <li>Según el Censo del 2012, el 74% de las viviendas tiene un radio, el 67% posee un televisor y un 23% cuenta con una computadora.</li>
        </ul>
    </div>

    <div class="step slide" data-x="2000" data-y="-1500" style="background-image: url('{{asset('presentation_files/img/3.jpg')}}'); background-size: cover;  color:#fff; background-position: center;">
        <h2>DATOS CONTEXTUALES <span class="icon-stats-dots"></span></h2>
        <ul class="side-column">
            <li>Según el INE, un 71,5% de la población tiene acceso a una cuenta de telefonía fija o celular (Página Siete, 2013)</li>
            <li>Las personas empadronadas en La Paz son: 766.468(367.742 Hombres y 398.726 Mujeres), de 4 años o más (INE, 2012)</li>
        </ul>
    </div>


    <div id="title" class="step" data-x="0" data-y="0" data-scale="4">
        <span class="try"> <span class="icon-bullhorn"></span> la comunicación importa</span>
        <h1>mejorémos</h1>
        <span class="footnote">nuestra calidad de vida <span class="icon-trophy icon-big"></span> con tecnología  <span class="icon-mobile icon-big"></span></span>
    </div>

    <div id="its" class="step" data-x="850" data-y="3000" data-rotate="90" data-scale="5">
        <h2>EXPERIENCIAS PREVIAS <i class="icon-blog"></i></h2>
        <h3>ON TRACK</h3>
        <p class="side-column">Buscaba monitorear las obras del municipio, revisar su implementación, y realizar comentarios u observaciones de lo que ocurría realmente. Fue incorporadacomo un enlace dentro del portal municipal<br/> http://www.lapaz.bo/ bajo el rotulo de: Barrio Digital.</p><img width="45%" src="{{asset('presentation_files/img/11421644_10153268823116539_836907381_n.jpg')}}">
    </div>
    <div id="tiny" class="step" data-x="2825" data-y="2325" data-z="-3000" data-rotate="300" data-scale="1">
        <h3>SEGURIDAD CIUDADANA</h3>
        <p>El Ministerio de Gobierno realizó un proyecto de implementación de un mapa del crimen usando smartphones con sistema Android con financiamiento del BID.</p><img src="{{asset('presentation_files/img/seguridad.jpg')}}">
    </div>

    <div id="big" class="step" data-x="3500" data-y="2100" data-rotate="180" data-scale="6">
        <h3>CAZADOR URBANO</h3>
        <p class="side-column">Es un segmento diario dentro de los noticieros regulares de una cadena nacional de noticias (UNITEL) el cual se encarga de recoger denuncias ciudadanas sobre obras fantasmas, incompletas o mal ejecutadas.</p><img src="{{asset('presentation_files/img/11304451_10153268822451539_13280386_n.jpg')}}">

    </div>
    <div id="imagination" class="step" data-x="6700" data-y="-300" data-scale="6">
        <p class="imagination">OBJETIVO DE <br/> <img src="{{asset('presentation_files/img/logo2.png')}}"></p>
    </div>
    <div id="ing" class="step" data-x="3500" data-y="-850" data-rotate="270" data-scale="6">
        <ul class="side-column">
            <li>Se trabajará con periodistas especializados en temas de seguimiento de obras.</li>
            <li>En alianza con una ONG especializada en temas de género se mapeara los lugares de asistencia judicial, médica.</li>
        </ul><img width="45%" src="{{asset('presentation_files/img/periodismo-en-red.png')}}">
    </div>
    <div id="source" class="step" data-x="6300" data-y="2000" data-rotate="20" data-scale="4">
        <ul class="side-column">
            <li>Se implementarán talleres respecto al uso de la aplicación entre los vecinos jóvenes con acceso a smartphones debido al bajo índice de acceso a internet cableado.</li>
            <li>Se evaluará la pertinencia de implementar esta actividad usando centros comunitarios de Internet o Cibercafés.</li>
        </ul><img width="45%" src="{{asset('presentation_files/img/capacitacion.png')}}">
    </div>

    <div id="one-more-thing" class="step" data-x="6000" data-y="4000" data-scale="2">
        <p>Se busca implementar una aplicación ciudadana con origen y representación de la sociedad civil (no ligada al gobierno en cualquier nivel) y que a la vez esta sea fuente de información para medios de prensa, puede crear un nexo entre la <b>DENUNCIA-VERIFICACIÓN-RESPUESTA</b> que generará aceptación entre los ciudadanos.</p>
        <img src="{{asset('presentation_files/img/pasos-verificar.png')}}">
    </div>
    <div id="its-in-3d" class="step" data-x="6200" data-y="4300" data-z="-100" data-rotate-x="-40" data-rotate-y="10" data-scale="2">
        <img src="{{asset('presentation_files/img/pasos.png')}}">
    </div>
    <!--div id="its-in-3d" class="step" data-x="6200" data-y="4300" data-z="-100" data-rotate-x="-40" data-rotate-y="10" data-scale="2">
                <h2>PLAN DE ACCIÓN <span class="icon-profile"></span></h2>
                <OL type="A">
                <LI> Implementación de la Aplicación</LI>
                <LI> Construcción de la Alianza y la modalidad de trabajo para el uso de la herramienta</LI>
                <LI> Establecimiento de alianzas con uno o más medios (o periodistas)</LI>
                <LI> Establecer un barrio o zona de La Paz donde hacer seguimiento específico de la evolución del uso de la aplicación)</LI>
                </OL>
    </div-->

    <div id="overview" class="step" data-x="3000" data-y="1500" data-scale="10">
    </div>

</div>


<script>
    if ("ontouchstart" in document.documentElement) {
        document.querySelector(".hint").innerHTML = "<p>Tap on the left or right to navigate</p>";
    }
</script>

<script src="{{asset('presentation_files/js/impress.js')}}"></script>
<script>impress().init();</script>

</body>
</html>
