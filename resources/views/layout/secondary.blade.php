<!DOCTYPE html>
<html lang="en">
<head>
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
  <title>@yield('title')</title> 
</head>
<body>


  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
       
        <a href="#intro" class="scrollto"><img src="{{URL::asset('/img/logo.png')}}" alt="" title=""></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Edición</a></li>
          <li><a href="#schedule">Sesiones</a></li>
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
      About Section
    ============================-->
<section id="about">
<div class="container">
<br><br><br><br><br>
@yield('detalles_programas')
</div>
</section>



    <!--==========================
      Schedule Section
    ============================-->
    <section id="schedule" class="section-with-bg">
      <div class="container wow fadeInUp">
        <div class="section-header">
          
        <h2>@yield('header')</h2>
          @section('descripcion_programa')
          <p>Aquí está nuestro calendario de eventos</p>
          @show
          <br>
          <center>
          @yield('boton_crear')
          </center>
        </div>

        <h3 class="sub-heading">¡El Evento ya comenzó!</h3>

        <div class="tab-content row justify-content-center">

          <!-- Schdule Day 1 -->
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">



          
            @yield('sesiones')
            @yield('eventos')
            @yield('info_ponentes')
          </div>

</div>

      <br><br><br>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript" src="{{asset('css/app.css')}}"></script>

</body>
</html>


