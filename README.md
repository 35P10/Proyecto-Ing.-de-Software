# Proyecto-Ing.-de-Software
## Propósito del proyecto
El presente proyecto tiene la finalidad de aplicar todo lo aprendido a lo largo del semestre del curso de ing de software de la carrera de ciencia de la computación de la Universidad Nacional de San Agustín.Ademas de ello, el presente documento tiene como propósito elicitar ,especificar y analizar los requisitos de software y definir las especificaciones funcionales y no funcionales para el desarrollo de un sistema web que gestiona distintintos eventos y ponencias. Este sistema será utilizado por personal de la Escuela de Ciencia de la Computación

## Tecnologias usadas
En el presente proyecto usamos HTML, CSS ; el gestor de Base de Datos se uso MySQL , para la conexion de la Base de Datos y el frontend se usó PHP 

## Funcionalidades
- Mostrar resumen general: El sistema debe mostrar información general de la Semana de la Computación, así como los ponentes más destacados, los eventos mejor puntuados y acerca de la escuela profesional de Ciencia de la computación.
- Inicio de sesión de usuario: los usuarios deberán identificarse para poder inscribirse a los concursos organizados por la escuela.
- Registrar usuario: El sistema debe permitir al usuario registrarse. El sistema pedirá al usuario ingresar su correo electrónico institucional (si es que es estudiante de la UNSA) o personal (si es un usuario no relacionado con la UNSA) y contraseña.
- Mostrar ediciones de la semana de la computación: El sistema lista los años en los que se realizó la Semana de la computación.
- Mostrar cronograma de eventos por edición: El sistema muestra al usuario el cronograma de la edición elegida. No es necesario que se inicie sesión para tener acceso a la vista. Desde el cronograma el usuario puede seleccionar un evento.
- Visualizar evento: El sistema permite a los usuarios en general tener acceso a los eventos. No es necesario que se inicie sesión.
  - Mostrar información general: Se muestra el título, información del ponente, tema, fecha, hora, lugar o link del evento.
  - Puntuar evento:  El usuario podrá dar una puntuación a los evento de acuerdo a su nivel de satisfacción. 
  - Visualizar material adjunto: El usuario puede visualizar las presentaciones se han adjuntado junto con el evento
- Gestionar eventos: 
  - Publicar evento: El sistema permite al administrador crear un evento, dependiendo el tipo de evento, el sistema pedirá que ingresar la información general del evento : 
  - Presentación: Ingresar un título, nombre del ponente, tema, descripción,  fecha, hora, lugar o link del evento.
  - Concurso: Nombre del concurso, área relacionada, descripción, nombre del docente a cargo, fecha, hora, link del evento.
  - Editar Evento: Solo el administrador puede editar la información de un evento.
  - Eliminar Evento:  Solo el administrador puede eliminar un evento.
- Registrar inscripciones para concursos: El sistema permite a un usuario inscribirse en un concurso. Para ello se requiere que se haya iniciado sesión.
- Buscar por filtro: El sistema permite al usuario buscar un evento por título o etiquetas.
  <p align="center">
    <img src="funcionalidades.png" width="650" >
  </p>

## Práctica de código legible aplicadas

* No colocar JS ni CSS en las plantillas Blade y no coloques HTML en clases de PHP
* Convención de Laravel para los nombres, organización de archivos y carpetas:
  Se siguen los [estándares PSR](http://www.php-fig.org/psr/psr-2/), también, sigue la convención aceptada por la comunidad. Para la organización de archivos y caroetas , técnicamente, se podría escribir el código de una aplicación completo dentro de un solo archivo. Pero eso resultaría en una pesadilla para leer y mantener. Es por ello que siguiendo el MVC se organizaron las carpetas y archivos. 



Qué | Cómo | Bueno | Malo
------------ | ------------- | ------------- | -------------
Controlador | singular | ControladorArticulo | ~~ControladorArticulos~~
Relaciones hasOne o belongsTo | singular | comentarioArticulo | ~~comentariosArticulo, comentario_articulo~~
Propiedad de modelo | snake_case | $model->created_at | ~~$model->createdAt~~
Método | camelCase | traerTodo | ~~traer_todo~~
Vistas | kebab-case | show-filtered.blade.php | ~~showFiltered.blade.php, show_filtered.blade.php~~

A continuación se mostrará la organización de carpetas y archivos, así como el nombramiento de los modelos, controladores, y vistas:
  <p align="center">
    <img src="bp-1.png" width="650" >
    <img src="bp-2.png" width="650" >
    <img src="bp-3.png" width="650" >
  </p>
 Convención de nombres para relaciones de hasOne o belongsTo
 ```php
 public function sesionEvento()
 {
    return $this->hasOne(SesionEvento::class, 'id_evento');
 }
 ```
Convención de nombres para los métodos
```php
    // Muestra opciones para el tipo fe evento que se quiera crear
    public function showCreateOptions($id_sesion)
    {
        return view('evento.show-create-options', compact('id_sesion'));
    }

    // Muestra eventos en específico que pertenecen a una sesión
    public function show(sesion $sesion)
    {
        return view('evento.show', compact('sesion'));
    }

    //Función para eliminar un vento
    public function destroy(evento $evento)
    {
        $evento->delete();
        return redirect()->route('home.index');
    }
```
Convención de nombre para las propiedades de modelo
```php
        $evento->concurso->update(request()->only(['num_participantes', 'requisitos', 'ganadores', 'moderador']));
        $evento->sesionEvento->where('id_evento', $evento->id)->update(request()->only(['hora_inicio']));
```
* Utiliza sintaxis cortas y legibles siempre que sea posible
* No coloques ningún tipo de lógica en los archivos de rutas.
```php
// Rutas de evento
Route::get('evento/mostrar-opciones/{id_sesion}', [EventoController::class, 'showCreateOptions'])->name('evento.mostrarOpciones');
Route::get('sesion/mostrar/{sesion}', [EventoController::class, 'show'])->name('sesion.mostrar');
Route::delete('/evento/{evento}', [EventoController::class, 'destroy'])->name('evento.eliminar');
// Rutas de Concurso
Route::get('/concurso/crear/{id_sesion}', [ConcursoController::class, 'create'])->name('concurso.crear');
Route::post('/concurso/guardar/{sesion}', [ConcursoController::class, 'store'])->name('concurso.guardar');
Route::get('/concurso/editar/{evento}', [ConcursoController::class, 'edit'])->name('concurso.editar');
Route::put('/concurso/{evento}', [ConcursoController::class, 'update'])->name('concurso.actualizar');

// Rutas de ponencia
Route::get('/ponencia/crear/{id_sesion}', [PonenciaController::class, 'create'])->name('ponencia.crear');
Route::post('/ponencia/guardar/{sesion}', [PonenciaController::class, 'store'])->name('ponencia.guardar');
Route::get('/ponencia/editar/{evento}', [PonenciaController::class, 'edit'])->name('ponencia.editar');
Route::put('/ponencia/{evento}', [PonenciaController::class, 'update'])->name('ponencia.actualizar');


```

* Identación consistente:

   Siempre sera una buena praxis mantener una indentación ordenada. No hay un estilo ’mejor’ que todos deberían seguir. En realidad, el mejor estilo, es un estilo consistente. Si se es parte de un equipo o si se está contribuyendo con código a un proyecto, se debe seguir el estilo existente que se está utilizando en ese proyecto.También vale la pena señalar que es una buena idea mantener su estilo de identación de una manera coherente.
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;
use Auth;

class LoginController extends Controller
{
    public function ingresar()
    {
        $credenciales = request()->only(['email', 'password']);
        if (Auth::attempt($credenciales))
        {
            request()->session()->regenerate();

            if(Administrador::find(Auth::user()->dni) != NULL)
                session(['isAdmin' => true]);
            else
                session(['isAdmin' => false]);

            return redirect('home');
        }
        else
        {
            return redirect()->route('login');
        }    
    }

    public function salir()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerate();
        return redirect('home');
    }
}
```

   
* Agrupación de código:

   Casi siempre ciertas tareas requieren unas pocas líneas de código. Es una buena idea mantener estas tareas dentro de bloques separados de código, con algunos espacios entre ellos.
```php
    /**
     * Muestra opciones para el tipo fe evento que se quiera crear
     */
    public function showCreateOptions($id_sesion)
    {
        return view('evento.show-create-options', compact('id_sesion'));
    }

    /**
     * Muestra eventos en específico que pertenecen a una sesión
     */
    public function show(sesion $sesion)
    {
        return view('evento.show', compact('sesion'));
    }

    
    /**
     * Función para eliminar un vento
     */
    public function destroy(evento $evento)
    {
        $evento->delete();
        return redirect()->route('home.index');
    }
```

* Comentar y Documentar: 

    Para un mejor entendimiento por parte de quien visualice el codigo, se ha comentado las funciones importantes.
* Longitud límite de línea:

   Es menos cansado leer 5 filas de amplitud corta que un largo texto a ras de hoja, por ello es una buena prática evitar escribir líneas largas y horizontales.

## Estilos de Programación aplicados
* Estilo de indentación
* Programacion Orientada a Objetos
* Código mantenible: 
   Esto quiere decir que pueda ser actualizado cada cierto tiempo y que así el programa perdure.
* Capitalizar Palabras Especiales de SQL: 
   La interacción de bases de datos es una gran parte de la mayoría de las aplicaciones web. Si está escribiendo consultas SQL sin procesar, es una buena idea mantenerlas    legibles también. A pesar de que las palabras especiales y los nombres de funciones de SQL no distinguen entre mayúsculas y minúsculas, es una práctica común escribirlas en mayúsculas para distinguirlas de sus nombres de tabla y columna.

## Principios SOLID aplicados
* Single-responsability : 
  El principio de responsabilidad única ( SRP ) es un principio de programación de computadoras que establece que cada módulo , clase o función en un programa de computadora debe   tener responsabilidad sobre una sola parte de la funcionalidad de ese programa , y debe encapsular esa parte. Todo eso de la función módulo, clase o servicios deben estar alineados estrechamente con esa responsabilidad.
  - Si una Clase tiene muchas responsabilidades, aumenta la posibilidad de errores porque hacer cambios en una de sus responsabilidades podría afectar a las otras sin que usted     lo sepa.
  -  "Una clase debe tener solo una razón para cambiar"
  Se eligió esta clase porque cumple con las características de este, es decir, la Clase User se encarga únicamente de recopilar la información de una persona como nombre, email,  password.
 
 ```php
<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'persona';
    public $timestamps = false;
    protected $primaryKey = 'dni';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nombre',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}


```
   El principio de responsabilidad única busca que el código quede encapsulado y exista independencia entre las clases, sus funcionalidades. Al utilizar clases hemos procurado   cumplir con este criterio, ya que encapsulamos la funcionalidad de cada una para que realicen una única función. 

   <p align="center">
      <img src="/imagenesINGSoft/respUnica4.png" >
      </p>

   Por ejemplo, en la imagen se ve que se han independizado las funciones, entre ellas editar la sesión, y otras. Esto también ayuda a la reutilización del código en caso de cambios o mantenimiento. 

*  Open-Closed:
   
   Entonces una clase debe quedar abierto para extensión y cerrado para modificación. Para añadir funcionalidades debe escribirse nuevo código, no modificar código existente,   escribir código que no se tenga que cambiar cada vez que cambian los requerimientos . Ej con herencia y polimorfismo

   Por ejemplo la clase persona es la clase base que utilizaremos  para las clases usuario y ponente

   <p align="center">
      <img src="/imagenesINGSoft/AC1.jpeg" >
      </p>

*  Segregación de la Interfaz: 

   Según este principio es mejor tener una clase pequeña y especializada que una muy grande, para poder hacer un mejor objetivo hacia las necesidades del sistema. 
   En nuestro trabajo, hemos procurado seguir esta norma al no sobrecargar las funcionalidades de las clases sin más de lo que se necesite. Por ejemplo en la captura se ve que      cada función está dirigida a un único fin, aunque pertenezcan al mismo sistema, estan especializados. 

   <p align="center">
     <img src="/imagenesINGSoft/segI.png" >
      </p>

* Inversión de dependencia: 

  El principio de inversión de dependencia busca reducir el acople entre sistemas de software. 
  En nuestro caso, el sistema independiza la tecnología de bases de datos, ya que podríamos migrar con facilidad a otro sistema de bases de datos, pues utilizamos el framework  Laravel, donde existe una abstracción que nos permite cambiar el tipo de BD utilizada mediante modificar algunos datos de forma sencilla. Esto nos brinda libertad para la implementación y cambiar de tecnología de BD afectando mínimamente las partes del sistema

   <p align="center">
      <img src="/imagenesINGSoft/si.jpeg" >
   </p>
   No dependemos de la tecnología que empleamos en la base de datos, ya que la comunicación entre los componentes del sistema es siempre mediante interfaces, y esto nos permite tener libertad a la hora de decidir las implementaciones concretas de cada elemento. Por ejemplo, podríamos cambiar la conexión a la base de datos de mysql a mongodb o postgresql sin afectar a ninguna parte del sistema.

## Conceptos DDD aplicados
* Modules:
 
  Cada parte del proyecto tiene un dominio que aísla los códigos formados por módulos de clases relacionadas con una funcionalidad de la aplicación.

   <p align="center">
    <img src="/imagenesINGSoft/dd1.png" >
      </p>

* Entities: 

  Existen diferentes entidades en el Sistema que desarrollamos, entre ellas podríamos mencionar las entidades Ponente, Participante y Evento, ya que son objeto del dominio que  mantienen un estado y comportamiento más allá de la ejecución de la aplicación. A continuación se muestra la entidad Ponente, que posee una identificación única mediante su DNI.

   <p align="center">
      <img src="/imagenesINGSoft/dd2.png" >
       </p>
      
*  Value Objects:

   Los Value Objects (VO) son solo valores, no entidades, por si solos no significan nada, tienen que estar acompañados de una entidad para que signifiquen algo o ser interpretados. 
   En nuestro sistema identificamos algunos Value Objects, como el siguiente: 
    
    <p align="center">
       <img src="/imagenesINGSoft/dd3.png" >
      </p>
   La clase SesionEvento si bien aparece como un Entity en realidad solo es un dato que conecta la relacion N-M de las entidades Sesión y Evento y almacena el dato de la hora de Inicio. Sin estas otras entidades perdería sentido por sí misma. Es un Value Object.
 
*  Ubiquitous Language: 

   Es un concepto de gran importancia porque, además de servir de vehículo de entendimiento en el negocio y entre el negocio e IT, también sirve para identificar las particiones del Domain, que darán lugar a soluciones modulares

   <p align="center">
  <img src="/imagenesINGSoft/dd4.png" >
    <img src="/imagenesINGSoft/dd5.png" >
      </p>

*  Aggregates: 
   Los agregados representan el límite lógico de un conjunto de datos, permiten modelar el sistema en pequeños subconjuntos. Para acceder a los elementos de un agregado debemos  acceder mediante una entidad principal, que le sirve a modo de entrada. 

   Existe un agregado “Sesión” ya que esta entidad posee relaciones con otras a nivel de negocio y su acceso es mediante la entidad Programa.
    
    <p align="center">
  <img src="/imagenesINGSoft/dd6.png" >
      <img src="/imagenesINGSoft/dd7.png">
      </p>

* Repository:
 
  En nuestro proyecto tenemos clases, o más famosamente llamados controladores (MVC), que tienen la función de repositorio, ya que, son los que controlan, dirigen, a la aplicación   por dónde debe ir dependiendo de lo que el usuario requiera al interactuar con dicha aplicación.

     <p align="center">
       <img src="/imagenesINGSoft/dd8.png" >
     </p>

  Un claro ejemplo sería en controlador de Sesión, que guarda diferentes funciones en donde consultamos dichos datos a la base de datos para que luego sean mostrados al usuario.

