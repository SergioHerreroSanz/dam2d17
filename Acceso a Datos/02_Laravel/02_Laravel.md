# Laravel
Laravel es un framework (entorno de desarrollo que contiene librerías y herramientas) para PHP

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
Una ruta es la



Se listan las rutas desde el CMD usando artisan
```bash
php artisan route:list 
```


Para nombrar a una ruta se usa el método `name()`, después de declarar la ruta se utiliza el operador flecha para llamar al método y se le pasa el nombre que se quiere asignar como parámetro.
```php
Route::get('/saludar', function ($num1, $num2) {
    return "hola";
})->name("saludo");
```
Para obtener la URL de una ruta a partir de su nombre se utilizará el método `route()`, que tomará como parámetro 
```php
route("")
```

`redirect()`

### Vistas
Pueden contener un precompilador como blade

```
{{$id}} //echo $id

@if
    //
@endif

@foreach
    //
@endforeach
```

```php
Route::get('/suma/{num1}/{num2}', function ($num1, $num2) {
    return view('vista1', compact('num1','num2'));
});
```
### Controlador
Los controladores se almacenan en `/app/Http/Controllers`, para crearlos se ejecuta un comando desde artisan: 
```bash
php artisan make:controller MiControlador
```
Una vez creados se les debe de crear una ruta, en vez de introducir una función como parámetro se llama a una función del controlador. Si la ruta contiene variables el controlador las captura automáticamente.
```php
Route::get('/saludoControlador', 'MiControlador@f1');
```

```
form action="alumno/mostrar" method="post"
@crsf
```

configurar BD en .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

crear modelo
```bash
php artisan make:model Alumno
```

métodos en controlador a través del ORM Eloquent (using App/Alumnos)
```
//Consultas a la bd a traves del ORM
Alumno::find($id)
      ::finOrFail($id)
      ::all()
      ::destroy($id)
      ::create($arrayAsoc)
      ->delete()
      ->update()
      ->save()
```

tabla (alumnos)
ruta show (/alumno/{id})
controlador (AlumnoController) método show()
modelo (alumno)
vista (show)