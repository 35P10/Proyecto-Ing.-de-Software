<!DOCTYPE html>
<html lang="en">
<head>
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/schedule.css')}}"> -->
    <!-- Main Stylesheet File -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

  <!-- Favicons -->
  <link href="img/placeholder.ico" rel="icon">
  <!-- <link href="img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
  <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css"> -->


  <!-- Libraries CSS Files -->
  <!-- <link href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"> -->
  <!-- <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet"> -->
  <!-- <link href="{{asset('lib/venobox/venobox.css')}}" rel="stylesheet"> -->
  <!-- <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="{{ URL::asset('css/owl.css') }}" /> -->
  <link rel="stylesheet" href="{{ URL::asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" />
   
</head>
<body>


  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">

        <a href="#intro" class="scrollto"><img src="{{URL::asset('/img/logo.png')}}" alt="" title=""></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Inicio</a></li>
          <li><a href="#speakers">Ponentes</a></li>
          <li><a href="#schedule">Edicion</a></li>
          <li><a href="#venue">Buscar evento</a></li>
          <li class="block"> 
            <form action="{{ route('buscar')}}" method="POST">
                <input  class="input" name="tema" placeholder="Tema">
            </form>
          </li>
          @auth
          <li>
              <a href="{{ route('logout') }}" class="about-btn-left scrollto">Cerrar Sesión</a>
            </li>
          @else
          <li>
          <a href="{{ route('login') }}" class="about-btn-left scrollto">Iniciar sesion</a>
            <!-- <a href="{{ route('login') }}">
              <button class="button-left" type="submit">Login</button>
            </a> -->
          </li>
          <li>
            <a href="{{  route('participante.create') }}" class="about-btn-right "> Registrate
              <!-- <button class="Main__Header-button" type="submit">Registrate</button> -->
            </a>

          </li>
          @endauth
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">La conferencia anual de <br><span>Programacion</span> </h1>
      <p class="mb-4 pb-0">10-12 Diciembre,Ciencia de la Computacion, UNSA</p>
      <a href="https://www.youtube.com/watch?v=wHEpjKpsqco&t=3s" class="venobox play-btn mb-4" data-vbtype="video"
        data-autoplay="true"></a>
      
      <a href="{{  route('participante.create') }}" class="about-btn scrollto">Registrate Aqui</a>
    </div>
  </section>

  <main id="main">




 <!--==========================
      About Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>Sobre el evento</h2>
            <p>La Semana de la Computación es un Evento organizado por la escuela Profesional de Ciencia de la Computación
               de la Universidad Nacional de San Agustín en el que se exponen trabajos de estudiantes y docentes, 
               se dan charlas de invitados externos, se realiza un concurso de programación y algunas actividades 
               de confraternización.</p>
          </div>
          <div class="col-lg-3">
            <h3>Donde</h3>
            <p>Universidad Nacional de San Agustin , Arequipa</p>
          </div>
          <div class="col-lg-3">
            <h3>Cuando</h3>
            <p>Lunes a miercoles<br>10-12 Diciembre</p>
          </div>
        </div>
      </div>
    </section>



    <!--==========================
      Speakers Section
    ============================-->
    <section id="speakers" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Ponentes del evento</h2>
          <p>Estos son algunos de nuestros ponentes.</p><br>
          @auth
          @if(session('isAdmin'))
            <center>
            <a href="{{  route('ponente.crear') }}" class="about-btn-right">Nuevo Ponente</a>
            </center><br>
          @endif
          @endauth
        </div>

        <div class="row">

        <!-- yield -->
        @yield('ponentes')
        <!-- end yield -->

          </div>
        </div>
      </div>

    </section>


     <!--==========================
      Schedule Section
    ============================-->
    <section id="schedule" class="section-with-bg">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>La Semana de la Computación</h2>
          <p>Aquí está nuestro calendario de eventos</p><br>
          @auth
          @if(session('isAdmin'))
            <center>
            <a href="{{  route('programa.create') }}" class="about-btn-right">Nuevo Programa</a>
            </center>
          @endif
          @endauth
        </div>

        <h3 class="sub-heading">¡El Evento ya comenzó!</h3>

        <div class="tab-content row justify-content-center">

          <!-- Schdule Day 1 -->
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

        <!-- yield -->
        @yield('ediciones_programas')
        <!-- endyield -->

<br><br><br>
</div>
</div>
          <!-- End Schdule Day 1 -->

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript" src="{{asset('css/app.css')}}"></script>

</body>
</html>


