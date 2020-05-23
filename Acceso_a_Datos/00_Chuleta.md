define(nombre, valor)
unset(nombre)

isset(variable)
empty(variable)

__FILE__
__LINE__
PHP_VERSION
PHP_OS

_GET[nombreCampo]
_POST[nombreCampo]
_REQUEST[nombreCampo]

htmlspecialchars(TEXTO)

date()
date(formato, date)
include(archivo)
require(archivo)
include_once(archivo)

fopen(archivo, modo)
feof(f1)
rewind(f1)
fseek(f1, posición)
ftell(f1)

readfile(f1)
file(f1)

fpassthru(f1)
fgets(f1, [longitud])
fgetc(f1)

fwrite(f1, texto, [longitud])
fputs(f1, texto, [longitud])

fclose(f1)
copy(rutaOriginal, rutaCopia)
rename(rutaOriginal, rutNueva)

setcookie(nombre, valor, caducidad)
_COOKIE[nombre]

session_cache_limiter()
session_name(nombre)
session_start()
_SESSION[nombre]

mysqli_connect(url, user, password, db)
mysqli_query(con, sql)
mysqli_fetch_assoc(alumnos)

new PDO(dsn, user, password)
setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
errorInfo()
getMessage()
query(sql)
fetch()
prepare(sql)
bindParam(?, nombre);
execute();
fetchAll();

fetchAll(PDO::FETCH_OBJ);

close();