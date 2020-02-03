# Laravel

Laravel es un framework (entorno de desarrollo que contiene librerías y herramientas) para PHP

- [Laravel](#laravel)
  - [0- Instalación](#0--instalaci%c3%b3n)
  - [1- Basics](#1--basics)
    - [Rutas](#rutas)
      - [Ver](#ver)
      - [Crear](#crear)
      - [Nombrar](#nombrar)
      - [Redireccionar](#redireccionar)
    - [Vistas](#vistas)
    - [Controlador](#controlador)
    - [Bases de datos](#bases-de-datos)
      - [Modelo](#modelo)
      - [Controlador](#controlador-1)
- [Json](#json)
    - [Migración](#migraci%c3%b3n)

## 0- Instalación

Para instalarlo se usa un gestor de paquetes ([Composer](https://getcomposer.org/download/)) [siguiendo estas instrucciones (Via Composer Create-Project)](https://laravel.com/docs/5.8/installation)

```bash
composer create-project --prefer-dist laravel/laravel blog "5.8.*"
```

## 1- Basics

Desde el CMD podemos usar artisan para averiguar la versión de Laravel.

```bash
php artisan --version
```

### Rutas

Una ruta es la dirección relativa que parte de la raíz del host (o localhost en un servidor local). Todas las rutas se definen el el archivo `routes/web.php`

#### Ver

Se listan las rutas desde el CMD usando artisan.

```bash
php artisan route:list
```

#### Crear

Para crear una ruta llamamos de forma estática al método `get()` de la clase `Route`. En el primer parámetro indicamos la dirección de la ruta como un string, y como segundo parámetro introducimos una función. Esta función la podemos obtener desde un controlador o generarla en el momento,pero siempre debe devolver una vista o un string.

```php
Route::get('/saludo', function(){
    return 'Hola';
});
```

```php
Route::get('/despedida', 'MiControlador@funcionDespedida');
```

Para obtener una vista usamos el método `view()`, que recoge el nombre de la vista por parámetro.

```php
Route::get('/despedida', function () {
    return view('despedida');
});
```

Para recoger parámetros desde una ruta usaremos corchetes, separados por barras, y para pasárselos a una vista usaremos el método `compact()`, que devolverá un array asociativo que contendrá todos los elementos que introduzcamos.

```php
Route::get('/despedida/{nombre}', function () {
    return view('despedida', compact('nombre'));
});
```

#### Nombrar

Para nombrar a una ruta se usa el método `name()`, después de declarar la ruta se utiliza el operador flecha para llamar al método y se le pasa el nombre que se quiere asignar como parámetro.

```php
Route::get('/saludo', function () {
    return "Hola";
})->name("saludo");
```

#### Redireccionar

En caso de querer acceder a una ruta desde otra usaremos el método `redirect()`, que tomará como parámetro la dirección de una ruta como un string. Este método lo utilizaremos para simplificar las rutas largas a otras mas cortas.

```php
Route::get('esta/ruta/es/demasiado/larga', function () {
    return redirect('rutalarga');
});
```

En vez de indicar la dirección de la ruta, podemos obtenerla a partir de su nombre utilizando el método `route()`, que tomará como parámetro un string.

```php
Route::get('/', function () {
    return redirect(route('welcome'));
});
```

### Vistas

Pueden contener un precompilador como Blade. Blade reconoce la sintaxis con `@` y `{}` y procesa la vista antes de ser interpretada por el servidor PHP. Para que el preprocesador

```
{{$id}} //<?php echo $id; ?>

@if
    //
@endif

@foreach
    //
@endforeach

@method()
```

En el caso de contener un formulario que utilice un método diferente de `GET`, se debe de usar `@csrf` para añadir un identificador único.

```php
<form action="alumno/mostrar" method="post">
    @crsf
    //
</form>
```

### Controlador

Los controladores se almacenan en `app/Http/Controllers`, para crearlos se ejecuta un comando desde artisan.

```bash
php artisan make:controller MiControlador
```

Una vez creados se les debe de crear una ruta, en vez de introducir una función como parámetro se llama a una función del controlador. Si la ruta contiene variables el controlador las captura automáticamente.

```php
Route::get('/saludoControlador', 'MiControlador@f1');
```

### Bases de datos

El archivo `.env` contiene unas variables que nos permiten definir la conexión a una base de datos para utilizar un ORM que realice consultas por nosotros.

```txt
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

#### Modelo

Para realizar consultas a la base de datos creamos un modelo. El modelo se debe de llamar como la tabla de la base de datos en singular con la primera letra en mayúscula, y la base de datos se debe llamar en plural y comenzando por minúscula (alumnos -> Alumno).

```bash
php artisan make:model Alumno
```

Usaremos el modelo para realizar consultas y modificaciones a la base de datos a través de Eloquent, el ORM de Laravel.

#### Controlador

En el controlador no deberemos olvidar incluir el modelo que vayamos a utilizar (`use app\Alumno`).

```php
Alumno::find($id)           //buscar
Alumno::findOrFail($id)     //buscar (rompe si no encuentra)
Alumno::all()               //mostrar
Alumno::destroy($id)        //borrar
Alumno::create($arrayAsoc)  //insertar
      ->delete()            //borrar por funcion
      ->update()            //alter
      ->save()              //insertar y alter
```

tabla (alumnos)
ruta show (/alumno/{id})
controlador (AlumnoController) método show()
modelo (alumno)
vista (show)

show ver
destroy borrar
create formulario para nueva alta
store guardar
update actualizar
edit formulario para modificar
index mostrar todos

```php
Route::resource('alumno','AlumnoController');
```

```bash
php artisan make:controller AlumnoController --resource
```


# Json

```php
orderBy(columna)
where("nombre","valor");
orWhere()
get()
first()
pluck()
paginate(num)

(en el modelo Jugador)
public function equipo(){
    return $this->belongsTo(/App/Equipo)
}
(en el modelo Equipo)

public function equipo(){
    return $this->hasMany(/App/Jugador)
}
```

Muestra el solo X elementos cada página
```php
paginate($num);
```

Cuando el nombre del modelo + s no se corresponde con el nombre de la tabla (En el modelo).

```php
Protected $table = "nombretabla";
```

### Migración

```bash
php artisan make:migration create_alumnos_table
```
