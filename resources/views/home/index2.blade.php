<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<header style="display:block; background-color:green">
    <nav>
    <h1>
        Inicio
    </h1>
        <form action="{{ route('buscar')}}" method="POST">
            <input name="tema" placeholder="Buscar por Tema">
            <button type="submit">Icon</button>
        </form>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{  route('participante.create') }}">Register</a>

        <!--botones exclusivos del administrador -->
        <a href="{{  route('programa.create') }}">Crear Programa</a>
        <a href="{{  route('sesion.create') }}">Crear Sesion</a>
        <a href="#">Crear evento</a>
        <a href="#">Registrar ponente</a>
    </nav>

    @if ($message = Session::get('success'))
        <div>
            <p>{{ $message }}</p>
        </div>
    @endif

    <section>
        <h2>
            Ediciones
        </h2>  
        <select>
        @foreach ( $data['edicion'] as $edicion)          
        <option><a href="{{ route('programa.show',$edicion->id)}}">{{ $edicion->anio_edicion }} {{ $edicion->nombre }}</a></option>
        <br>
        @endforeach
        </select>
        <br>
        @foreach ( $data['edicion'] as $edicion)          
        <a href="{{ route('programa.show',$edicion->id)}}">{{ $edicion->anio_edicion }}
            {{ $edicion->nombre}}</a><br>
        @endforeach
    </section>
 </header>
 <main style="display:block; background-color:red"> <!--main -->
    <section> <!--session edicion mas reciente -->
        <div style="display:block; background-color:peachpuff">  <!-- titulo -->
            <h1>
                Ultima Edicion: {{  $data['programa'] ->anio_edicion }}
            </h1>

            <h2>{{  $data['programa'] ->nombre}}</h2>
            <br>
        </div>
        <div style="display:block; background-color:thistle"> <!--informacion del programa -->
            descripcion:
            {{  $data['programa'] ->descripcion }}
            <br>
            fecha_inicio:
            {{  $data['programa'] ->fecha_inicio }}
            <br>
            fecha_fin:
            {{  $data['programa'] ->fecha_fin }}

        </div>
        <div style="background-color:burlywood">
            <h3>Sesiones</h3>

            @foreach($data['sesion'] as $sesion)
                <button style="display:block; background-color:peru"> <!--informacion de cada sesion -->
                    {{$sesion->fecha}}
                    {{$sesion->hora}}
                    {{$sesion->enlace_meet}}
                </button>
                <section style="background-color:lemonchiffon"> <!--eventos de cada sesion -->
                    <!--ignorar -->
                    @php 
                    $temp = $data['columns'] 
                    @endphp 
                    <!--ignorar -->

                    @foreach($temp[$sesion->id] as $eventos)
                        <a><p>{{$eventos->hora_inicio}} {{$eventos->tema}}</p></a> <!--se puede aplicar estilos -->
                    @endforeach
                    
                </section>
            @endforeach
        </div>
    </section>

    <section style="width:100% ;background-color:salmon;"> <!--Seccion de ponentes : rojo -->
        <h3>Ponentes</h3>
        <div style="display:flex; text-align:center;">
            @foreach($data['ponentes'] as $ponente)
            <div style="width:30% ;background-color:lightblue;">  <!--celeste -->
                <p>{{$ponente->nombre}}</p>
                <p>{{$ponente->grado_academico}}</p>
                <p>{{$ponente->especialidad}}</p>
                <p>{{$ponente->descripcion}}</p>
            </div>
            @endforeach
        </div>
    </section>
 </main> 

 <header style="display:block; background-color:blue"> <!--header -->
     <p>Ing. Software</p>
 </header>

 </body>
</html>
