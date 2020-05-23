# Programación de Dispositivos Móviles (Ev1)

- [Programación de Dispositivos Móviles (Ev1)](#programaci%c3%b3n-de-dispositivos-m%c3%b3viles-ev1)
  - [Diseño básico](#dise%c3%b1o-b%c3%a1sico)
  - [Material](#material)
  - [Eventos](#eventos)
  - [Comunicando actividades](#comunicando-actividades)
    - [Intent explícito](#intent-expl%c3%adcito)
    - [Bundle](#bundle)
  - [Comunicando aplicaciones](#comunicando-aplicaciones)
    - [Intent implícito](#intent-impl%c3%adcito)
  - [~~Permisos e intents~~](#spermisos-e-intentss)
  - [Ciclo de vida actividad](#ciclo-de-vida-actividad)
  - [Controles de selección](#controles-de-selecci%c3%b3n)
    - [Spinner](#spinner)
    - [ListView](#listview)
    - [GridView](#gridview)
  - [AppBar](#appbar)
  - [Pestañas](#pesta%c3%b1as)
  - [RecyclerView](#recyclerview)
  - [Preferencias](#preferencias)
  - [Fragmentos](#fragmentos)
  - [Diálogos](#di%c3%a1logos)
    - [AlertDialog (Mensaje y botones)](#alertdialog-mensaje-y-botones)
    - [Alert Dialog (Lista de elementos)](#alert-dialog-lista-de-elementos)
    - [TimePickerDialog](#timepickerdialog)
    - [DatePickerDialog](#datepickerdialog)
  - [Navigation Drawer](#navigation-drawer)
- [Programación de Dispositivos Móviles (Ev2)](#programaci%c3%b3n-de-dispositivos-m%c3%b3viles-ev2)
  - [Notificaciones](#notificaciones)
  - [SQLite](#sqlite)
  - [Content providers](#content-providers)
    - [URIs](#uris)
      - [Nativos](#nativos)
      - [Propios](#propios)
    - [Modelo de datos (BD)](#modelo-de-datos-bd)
    - [Constantes](#constantes)
    - [ContentProvider](#contentprovider)
    - [Permisos](#permisos)
    - [Usar Content provider](#usar-content-provider)
  - [Broadcast Receiver](#broadcast-receiver)
  - [Servicios](#servicios)
    - [Nativos](#nativos-1)
  - [Propios](#propios-1)
    - [Locales/Iniciados](#localesiniciados)
    - [Vinculados/Remotos](#vinculadosremotos)
  - [Acceso a datos Remotos](#acceso-a-datos-remotos)
    - [Volley](#volley)

## Diseño básico

## Material

## Eventos

## Comunicando actividades

### Intent explícito

```java
//Main Activity
Intent miIntent = new Intent(getApplicationContext(),SegundaActivity.class);
startActivity(miIntent);                //Si no se devuelven datos
startActivityForResult(miIntent, id)    //Si se devuelven datos mediante el método:

//Main Activity
protected void onActivityResult(int requestCode, int resultCode, Intent intent) {
    String res="Sin resolver";
    if(requestCode==1234 && resultCode==RESULT_OK){
        res=intent.getExtras().getString("resultado");
    }
    TextView textView=findViewById(R.id.textView);
    textView.setText(res);
}

//Second Activity
Intent miIntent = new Intent();
miIntent.putExtra("resultado", resultado);
setResult(RESULT_OK, miIntent);     //Justo antes de 'finish();'
```

### Bundle

```java
//Main Activity
Bundle miBundle = new Bundle();
miBundle.putString("nombre", txtNombre.getText().toString());
miBundle.putInt("edad",8);
miIntent.putExtra(miBundle);

//Second Activity
Bundle miBundle = getIntent().getExtras();
miBundle.getString("nombre");   //Contenido de 'txtNombre'
miBundle.getString("edad");     //8
```

## Comunicando aplicaciones

### Intent implícito

```java
Intent i = new Intent(Intent.ACTION_CALL, Uri.parse("tel:976491015"));
Intent i = new Intent(Intent.ACTION_VIEW, Uri.parse("http://www.google.com/"));
Intent i = new Intent(Intent.ACTION_SEND);
    i.setType("text/plain");
    i.putExtra(Intent.EXTRA_EMAIL, new String[] { "bsoler@iespabloserrano.com"});
    i.putExtra(Intent.EXTRA_SUBJECT, "Asunto");
    i.putExtra(Intent.EXTRA_TEXT, "Texto");

```

## ~~Permisos e intents~~

## Ciclo de vida actividad

## Controles de selección

### Spinner

```xml
<!-- Crear el layout de cada item (layout_item.xml) -->
<?xml version="1.0" encoding="utf-8"?>
<androidx.constraintlayout.widget.ConstraintLayout xmlns:android="http://schemas.android.com/apk/res/android"
    xmlns:app="http://schemas.android.com/apk/res-auto"
    xmlns:tools="http://schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="@android:dimen/notification_large_icon_height">

    <ImageView
        android:id="@+id/imageView"
        android:layout_width="64dp"
        android:layout_height="64dp"
        app:layout_constraintBottom_toBottomOf="parent"
        app:layout_constraintEnd_toStartOf="@+id/textView2"
        app:layout_constraintHorizontal_bias="0.181"
        app:layout_constraintStart_toStartOf="parent"
        app:layout_constraintTop_toTopOf="parent"
        tools:srcCompat="@tools:sample/avatars" />

    <TextView
        android:id="@+id/textView2"
        android:layout_width="343dp"
        android:layout_height="wrap_content"
        android:layout_marginStart="8dp"
        android:text="TextView"
        app:layout_constraintBottom_toBottomOf="parent"
        app:layout_constraintEnd_toEndOf="parent"
        app:layout_constraintStart_toEndOf="@+id/imageView"
        app:layout_constraintTop_toTopOf="parent"
        app:layout_constraintVertical_bias="0.511" />
</androidx.constraintlayout.widget.ConstraintLayout>
```

```java
//Crear la clase POJO Item (Item)
public class Item {
    /* Simplemente es una clase que contendrá las variables necesarias para
     * almacenar los elementos que más tarde queremos que aparezcan en el
     * Spinner. En nuestro caso:
     * long id: posición del ítem dentro de la lista
     * String api: texto que aparece en el ítem
     * Drawable imagen: imagen que aparece en el ítem
     */
    long id;
    String api;
    Drawable imagen;

    public Item(long id, String api, Drawable imagen) {
        this.id = id;
        this.api = api;
        this.imagen = imagen;
    }

    public long getId() {
        return id;
    }

    public String getApi() {
        return api;
    }

    public Drawable getImagen() {
        return imagen;
    }
}

//Crear el adapter (MiAdaptador)
public class MiAdaptador extends BaseAdapter {
    /*
     * Esta clase contiene dos atributos: de tipo Activity el primero y de tipo
     * ArrayList<ItemLista> el segundo. Ambos son pasados al constructor para
     * inicializar el adapter. El atributo Activity es necesario para poder
     * generar el layout que hemos creado anteriormente para nuestros item en el
     * Spinner. El atributo ArrayList de items contiene los elementos que se
     * mostrarán.
     */

    private final Activity contexto;
    private final ArrayList<Item> lista;

    public MiAdaptador(Activity contexto, ArrayList<Item> lista) {
        this.contexto = contexto;
        this.lista = lista;
    }

    @Override
    public int getCount() {
        return lista.size();
    }

    @Override
    public Object getItem(int position) {
        return lista.get(position);
    }

    @Override
    public long getItemId(int position) {
        return lista.get(position).getId();
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        /*
         * Debe “inflarse” el layout XML que hemos creado.
         * Esto consiste en  consultar el XML de nuestro layout y crear
         * e inicializar la estructura de objetos java equivalente. Para ello,
         * crearemos un nuevo  objeto LayoutInflater y
         * generaremos la estructura de objetos mediante su método inflate(id_layout).
         */
        LayoutInflater inflater = contexto.getLayoutInflater();
        convertView = inflater.inflate(R.layout.layout_item, null, true);

        /*
         *Una vez que la vista para el item está preparada recuperamos el ítem que
         *  vamos a mostrar utilizando el segundo parámetro que recibe el método getView
         * y el ArrayList que tenemos con los items.  A continuación vamos
         * recuperando los componentes de la vista y rellenándolos con los datos adecuados.
         * */
        Item item = lista.get(position);
        TextView textView = convertView.findViewById(R.id.textView2);
        textView.setText(item.getApi());
        ImageView imageView = convertView.findViewById(R.id.imageView);
        imageView.setImageDrawable(item.getImagen());

        // Finalmente devolvemos la vista terminada de configurar.

        return convertView;
    }
}


//Obtener el Spinner, aintroducir valores con el adapter y manejar los eventos (Main)
final Resources resources = getResources();
final String[] version = resources.getStringArray(R.array.version);
final String[] num_api = resources.getStringArray(R.array.num_api);
TypedArray logos = resources.obtainTypedArray(R.array.logos);
/*
    * Construimos la lista de nuestro adapter asociando cada item
    * con su número de api y su imagen
    */
ArrayList<Item> lista = new ArrayList<>();
for (int i = 0; i < 7; i++) {
    lista.add(new Item(i + 1, version[i], logos.getDrawable(i)));
}
logos.recycle();
MiAdaptador miAdaptador = new MiAdaptador(this, lista);
Spinner spinner = findViewById(R.id.spinner);
spinner.setAdapter(miAdaptador);
spinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        if (position != 0) {
            String resu = version[position] + " es " + num_api[position];
            Toast.makeText(getApplicationContext(), resu, Toast.LENGTH_SHORT).show();
        }
    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }
});
```

### ListView

### GridView

## AppBar

## Pestañas

## RecyclerView

## Preferencias

## Fragmentos

## Diálogos

Extendemos de la clase padre `DialogFragment` o de las hijas:

- `AlertDialog`: Título, mensaje y hasta 3 botones.
- `DatePickerDialog`: Título y seleccionar fecha.
- `TimePickerDialog` Título y seleccionar hora.

```java
//Lanzar (Main)
DialogFragment nuevoFragmento = new MiDialogo();
nuevoFragmento.show(getSupportFragmentManager(), "nombre/id");



//Interfaz para poder realizar acciones en el main. (MiDialogo)
public interface MiDialogoListener {
    public void onDialogPositiveClick(String devuelto);
    public void onDialogNegativeClick(int escogido);
    public void onDialogNeutralClick(int escogido);
}
MiDialogoListener miEscuchador;

//Instanciar el Listener (MiDialogo)
@Override
public void onAttach(Context context) {
    super.onAttach(context);
    try {
        miEscuchador = (MiDialogoListener) getActivity();
    } catch(ClassCastException e) {
        throw new ClassCastException(getActivity().toString()  + " must implement MiDialogoListener");
    }
}

//Acciones a realizar cuando se sale sin realizar acciones (MiDialogo)
@Override
public void onDetach () {
    super.onDetach();
    miEscuchador=null;
}

//Implementar MiDialogo.MiDialogoListener y hacer override de los métodos de la interfaz (Main)
public class MainActivity extends Activity implements OnClickListener, MiDialogo.MiDialogoListener {
    @Override public void onDialogPositiveClick(String devuelto) {
        //stuff
    }
}
```

### AlertDialog (Mensaje y botones)

Extendemos la clase `DialogFragment` y en el método `onCreateDialog` un builder para definir los elementos:

- `setTitle(String)`
- `setMessage(String)`
- `setPositiveButton(String, Listener)`
- `setNegativeButton(String, Listener)`
- `setNeutralButton(String, Listener)`

```java
public class MiDialogo extends DialogFragment {
    @Override public Dialog onCreateDialog(Bundle savedInstanceState) {
        AlertDialog.Builder builder = new AlertDialog.Builder(getActivity());
        builder
        //Capturar botones
        .setTitle("Título, puede estar en string.xml")
        .setMessage("Este mensaje puede estar en strings.xml")
        .setPositiveButton(android.R.string.ok,  new DialogInterface.OnClickListener() {
            public void onClick(DialogInterface dialog, int id) {
                Toast.makeText(getActivity(), "Has pulsado Ok", Toast.LENGTH_LONG).show();
            }
        })
        .setNegativeButton(android.R.string.cancel, new DialogInterface.OnClickListener() {
            public void onClick(DialogInterface dialog, int id) {
                Toast.makeText(getActivity(),"Has pulsado Cancel",
                Toast.LENGTH_LONG).show();
            }
        })
        .setNeutralButton(android.R.string.cancel, new DialogInterface.OnClickListener() {
            public void onClick(DialogInterface dialog, int id) {
                Toast.makeText(getActivity(),"Has pulsado Cancel",
                Toast.LENGTH_LONG).show();
            }
        });
        return builder.create();
    }
}

```

### Alert Dialog (Lista de elementos)

Extendemos la clase `DialogFragment` y en el método `onCreateDialog` un builder para definir los elementos (No todos son compatibles entre sí):

- `setTitle(String)`
- `setItems(String[], Listener)`
- `setSingleChoiceItems(String[], int seleccionado, Listener)`: Items con radioButton (Botón de aceptar necesario).
- `SetMultChoiceItems()`: Items con checkBox (Botón de aceptar necesario).

```java
public class MiDialogo extends DialogFragment {
    String[] colores = { "rojo", "azul", "amarillo" };

    @Override  public Dialog onCreateDialog(Bundle savedInstanceState) {
        AlertDialog.Builder builder = new AlertDialog.Builder(getActivity());
        builder.setTitle("Escoge color")
        //Lista normal
        .setItems(colores, new DialogInterface.OnClickListener() {
            public void onClick(DialogInterface dialog, int posicion) {
                Toast.makeText(getActivity(), "Has escogido "+colores[posicion],Toast.LENGTH_LONG).show();
            }
        })
        //Lista con radioButton (+ botón de confirmar)
        .setSingleChoiceItems (colores, -1 ,new DialogInterface.OnClickListener(){
            public void onClick(DialogInterface dialog, int which) {
                Toast.makeText(getActivity(), "Has escogido "+colores[which], Toast.LENGTH_LONG).show();
            }
        })
        //Lista con checkBox (+ botón de confirmar)
        items_selecc = new Vector<String>();    //Valores se guardan aquí
        .setMultiChoiceItems(colores, null, new DialogInterface.OnMultiChoiceClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which, boolean isChecked) {
                if (isChecked) {
                    items_selecc.add(colores[which]);
                } else if (items_selecc.contains(which)) {
                    items_selecc.remove(colores[which]);
                }
            }
        });

        return builder.create();
    }
}
```

### TimePickerDialog

Extendemos la clase `DialogFragment` e implementamos `TimePickerDialog.OnTimeSetListener`. En el método `onCreateDialog` creamos un elemento `Calendar`. Para capturar la hora utilizamos el método `onTimeSet()

```java
public  class MiDialogo extends DialogFragment implements TimePickerDialog.OnTimeSetListener {

@Override
public Dialog onCreateDialog(Bundle savedInstanceState) {
    final Calendar c = Calendar.getInstance();
    int hour = c.get(Calendar.HOUR_OF_DAY);
    int minute = c.get(Calendar.MINUTE);
    return new TimePickerDialog(getActivity(), this, hour, minute,DateFormat.is24HourFormat(getActivity()));
}

public void onTimeSet(TimePicker view, int hora, int min) {
    Toast.makeText(getActivity(),"Has escogido " + hora+":"+min,Toast.LENGTH_LONG).show();
    }
}
```

### DatePickerDialog

Extendemos la clase `DialogFragment` e implementamos `DatePickerDialog.OnDateSetListener`. En el método `onCreateDialog` creamos un elemento `Calendar`. Para capturar el día utilizamos el método `onDateSet()`.

```java
public class MiDialogo extends DialogFragment implements DatePickerDialog.OnDateSetListener {
    @Override  public Dialog onCreateDialog(Bundle savedInstanceState) {
        final Calendar c = Calendar.getInstance();
        int year = c.get(Calendar.YEAR);
        int month = c.get(Calendar.MONTH);
        int day = c.get(Calendar.DAY_OF_MONTH);

        return new DatePickerDialog(getActivity(), this, year, month, day);
    }

 public void onDateSet(DatePicker view, int year, int month, int day) {
    Toast.makeText(getActivity(),"Has escogido " + day + "-" + month + "-" + year,Toast.LENGTH_LONG).show();
    }
}
```

## Navigation Drawer

---

# Programación de Dispositivos Móviles (Ev2)

## Notificaciones

```java
//Declaración global
NotificationManager notificationManager;
Notification.Builder builder;
NotificationChannel miCanal;
Notification notification;

//Declaración de propiedades
String idCanal = "miIdCanal";
String nombreCanal = "miNombreCanal";
int idNotificacion = 0;
int importancia = NotificationManager.IMPORTANCE_DEFAULT;

Uri defaultSound = RingtoneManager.getDefaultUri(RingtoneManager.TYPE_NOTIFICATION);
Drawable drawable = getApplicationContext().getDrawable(R.drawable.mango_llave_allen_cut);
Bitmap iconoGrande = ((BitmapDrawable) drawable).getBitmap();

if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O) {
    //Crear NotificationManager
    notificationManager = (NotificationManager) getSystemService(NOTIFICATION_SERVICE);
    //Crear canal de notificación
    miCanal = new NotificationChannel(idCanal, nombreCanal, importancia);
    miCanal
            //Sonido
            .setSound(defaultSound, null)
            //Color del led de notificaciones
            .setLightColor(Color.GREEN)
            //Led de notificaciones
            .enableLights(true)
            //Patrón de vibración (añadir permisos en manifest)
            .setVibrationPattern(new long[]{2000, 500, 2000, 500, 2000, 500, 2000, 500})
            //Vibración
            .enableVibration(true)
            //Ocultar icono en launcher
            .setShowBadge(false);
    //Crear la notificación
    builder = new Notification.Builder(getApplicationContext(), idCanal);
    builder
            //Título
            .setContentTitle("Título")
            //Mensaje
            .setContentText("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed ")
            //Icono barra de notificación
            .setSmallIcon(android.R.drawable.ic_popup_reminder)
            //Icono grande
            .setLargeIcon(iconoGrande)
            //Hora de creación
            .setShowWhen(true);
            //Acciones
            Intent intentNotificacion = new Intent(this, MainActivity.class);
            TaskStackBuilder stackBuilder = TaskStackBuilder.create(this);
            stackBuilder.addNextIntentWithParentStack(intentNotificacion);
            PendingIntent intentPendiente = stackBuilder.getPendingIntent(0, PendingIntent.FLAG_UPDATE_CURRENT);
            //PendingIntent intentPendiente = PendingIntent.getActivity(this, 0, intentNotificacion, PendingIntent.FLAG_UPDATE_CURRENT);
            builder
                    //Añadir acción
                    .setContentIntent(intentPendiente)
                    //Cerrar al pulsar
                    .setAutoCancel(true);
                    //notificationManager.cancel(idNotificacion);
                    //notificationManager.cancelAll();
            //Botones
//TODO Añadiendo botones pag 9
    notification = builder.build();
    //Mostrar la notificación
    if (notificationManager != null) {
        notificationManager.createNotificationChannel(miCanal);
        notificationManager.notify(idNotificacion, notification);
    }
} else {
    // Fijar (si interesa) características similares a las del canal
}
```

## SQLite

Clase que extiende a SQLiteOpenHelper (Maneja la BD)

```java
public class MiAdminSQLite extends SQLiteOpenHelper {
    public MiAdminSQLite(@Nullable Context context,
                         @Nullable String name,
                         @Nullable SQLiteDatabase.CursorFactory factory,
                         int version) {
        super(context, name, factory, version);
    }

    @Override
    public void onCreate(SQLiteDatabase sqLiteDatabase) {
        //Se ejecuta la sentencia SQL de creación de la tabla
        sqLiteDatabase.execSQL("CREATE TABLE usuarios (nombre TEXT primary key, email TEXT)");
    }

    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int oldVersion, int newVersion) {
        // NOTA: Por simplicidad del ejemplo aquí utilizamos directamente la opción
        // de eliminar la tabla anterior y crearla de nuevo vacía con el nuevo formato.
        sqLiteDatabase.execSQL("DROP TABLE IF EXISTS usuarios");
        sqLiteDatabase.execSQL("CREATE TABLE usuarios (nombre TEXT primary key, email TEXT)");
        // Sin embargo lo normal será que haya que migrar datos de la tabla antigua
        // a la nueva, por lo que este método debería ser más elaborado.
    }
}
```

Obtener la instancia de la BD usando el patrón Singleton.

```java
private static MiAdminSQLite sInstance;
public static synchronized MiAdminSQLite getInstance (Context context,
                                                      String name,
                                                      SQLiteDatabase.CursorFactory factory,
                                                      int version){
    if (sInstance == null) {
        sInstance = new MiAdminSQLite(context.getApplicationContext(), name, factory, version);
    }
    return sInstance;
}
```

Crear la BD (si no existe ya) y obtenerla.

```java
MiAdminSQLite admin = MiAdminSQLite.getInstance(getApplicationContext(), "miBD.db", null, 1);
SQLiteDatabase db = admin.getWritableDatabase();
if (db != null) {
    Toast.makeText(this, "BD_Ejemplo correcta", Toast.LENGTH_SHORT).show();
    //Acciones
    db.close();
}
```

Insertar datos

```java
ContentValues registro = new ContentValues();
registro.put("nombre", "valor");
bd.insert("usuarios", null, registro);

Toast.makeText(getApplicationContext(), "Se cargaron los datos de la persona", Toast.LENGTH_SHORT).show();
```

Borrar datos

```java
int cant = bd.delete("usuarios", "nombre='" + "valor" + "'", null);
if (cant > 0){
    Toast.makeText(getApplicationContext(), "Se borró la persona con dicho nombre", Toast.LENGTH_SHORT).show();
} else {
    Toast.makeText(getApplicationContext(), "No existe una persona con dicho nombre",Toast.LENGTH_SHORT).show();
}
```

Modificar datos

```java
ContentValues registro = new ContentValues();
registro.put("email", nuevomail.getText().toString());
int cant = bd.update("usuarios", registro, "nombre='" + valor + "'", null);
bd.close();
if (cant > 0) {
    Toast.makeText(getApplicationContext(), "Se modificaron los datos", Toast.LENGTH_SHORT).show();
} else {
    Toast.makeText(getApplicationContext(), "No existe una persona con dicho nombre", Toast.LENGTH_SHORT).show();
}
```

Consultar datos

```java
Cursor fila = bd.rawQuery("select email  from usuarios where nombre='" + buscado + "'", null);
if (fila.moveToFirst()) {
    email.setText(fila.getString(0));
} else {
    email.setText("No existe una persona con dicho nombre");
}
fila.close();
```

Para ejecutar consultas a partir de SQL si devuelven datos

```java
.rawQuery(String consulta, string[] valores)
.query();
.moveToFirst()  //Mover la primer registro
.moveToNext();  //Avanzar al siguiente registro
```

Para ejecutar consultas a partir de SQL si no devuelven datos

```java
.execSQL(String consulta)
```

## Content providers

### URIs

#### Nativos

Android define varios providers predefinidos a los que podremos añadir datos si tenemos permisos.

```java
MediaStore.Images.Media.INTERNAL_CONTENT_URI
MediaStore.Images.Media.EXTERNAL_CONTENT_URI
Contacts.People.CONTENT_URI
```

#### Propios

Se necesita declarar un URI que identifique a la tabla o al registro al que se desea acceder.

```uri
content://<authoridad>/<ruta_de_datos>/<identificador>

content://com.pdm.qqq/clientes/7
```

### Modelo de datos (BD)

Crea la base de datos

```java
public class MiAdminSqlite extends SQLiteOpenHelper {
    private static MiAdminSqlite sInstance;
    public static synchronized MiAdminSqlite getInstance(Context context, String name, SQLiteDatabase.CursorFactory factory, int version) {
        //Patrón singleton, si no se ha creado una instancia la crea y la devuelve
        if (sInstance == null) {
            sInstance = new MiAdminSqlite(context.getApplicationContext(),name,factory,version);
        }
        return sInstance;
    }

    public MiAdminSqlite(Context context, String name, SQLiteDatabase.CursorFactory factory, int version) {
        super(context, name, factory, version);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL("CREATE TABLE platos (_id INTEGER primary key AUTOINCREMENT, nombre TEXT, tipo TEXT, cantidad INTEGER)");
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("DROP TABLE IF EXISTS platos");
        db.execSQL("CREATE TABLE platos (_id INTEGER primary key AUTOINCREMENT, nombre TEXT, tipo TEXT, cantidad INTEGER)");
    }
}
```

### Constantes

Clase que almacena constantes que se usarán repetidas veces.

```java
public class Constantes {
    //Constantes para la Base de Datos
    static final String BD_NOMBRE = "restaurante.db";
    static final int BD_VERSION = 1;

    //Autoridad del Content Provider
    static final String AUTHORITY = "com.pdm.restaurante";
    // Representación de la tabla a consultar
    static final String TABLA = "platos";
    // URI de contenido principal
    static final String uri = "content://" + AUTHORITY + "/" + TABLA;
    static final Uri CONTENT_URI =Uri.parse(uri);

    //Tipo MIME que devuelve la consulta de una sola fila
    static final String MIME_SIMPLE ="vnd.android.cursor.item/vnd.pdm." + TABLA;
    //Tipo MIME que devuelve la consulta de todas las filas
    static final String MIME_MULTIPLE ="vnd.android.cursor.dir/vnd.pdm." + TABLA;

    // Para URIs de multiples registros
    static final int TODOS = 0;
    // Para URIS de un solo registro
    static final int UNO = 1;

    // Comparador de URIs de contenido
    static final UriMatcher uriMatcher;
    // Asignación de URIs
    static {
        uriMatcher = new UriMatcher(UriMatcher.NO_MATCH);
        uriMatcher.addURI(AUTHORITY, TABLA, TODOS);
        uriMatcher.addURI(AUTHORITY, TABLA + "/#", UNO);
    }
}
```

### ContentProvider

```java
public class MiProveedor extends ContentProvider {
    public MiProveedor() {
    }

    @Override
    public int delete(@NonNull Uri uri, String selection, String[] selectionArgs) {
        int cont;
        try (SQLiteDatabase db = getSqLiteDatabase()) {
            String where = getString(uri, selection);
            cont = db.delete(Constantes.TABLA, where, selectionArgs);
        }
        return cont;
    }

    @Nullable
    private String getString(@NonNull Uri uri, String selection) {
        String where = null;
        switch (Constantes.uriMatcher.match(uri)) {
            case Constantes.TODOS:
                where = selection;
                break;
            case Constantes.UNO:
                where = " _id = " + uri.getLastPathSegment();
                break;
        }
        return where;
    }

    private SQLiteDatabase getSqLiteDatabase() {
        MiAdminSqlite admin = MiAdminSqlite.getInstance(getContext(), Constantes.BD_NOMBRE, null, Constantes.BD_VERSION);
        return admin.getWritableDatabase();
    }


    @Override
    public String getType(@NonNull Uri uri) {
        int match = Constantes.uriMatcher.match(uri);
        switch (match) {
            case Constantes.TODOS:
                return Constantes.MIME_MULTIPLE;
            case Constantes.UNO:
                return Constantes.MIME_SIMPLE;
            default:
                return null;
        }
    }

    @Override
    public Uri insert(@NonNull Uri uri, ContentValues values) {
        SQLiteDatabase db = getSqLiteDatabase();
        long regId = db.insert(Constantes.TABLA, null, values);
        return ContentUris.withAppendedId(Constantes.CONTENT_URI, regId);
    }

    @Override
    public boolean onCreate() {
        SQLiteDatabase db = getSqLiteDatabase();
        if (db == null) {
            return false;
        }
        if (db.isReadOnly()) {
            db.close();
            return false;
        }
        db.close();
        return true;
    }

    @Override
    public Cursor query(@NonNull Uri uri, String[] projection, String selection, String[] selectionArgs, String sortOrder) {
        SQLiteDatabase db = getSqLiteDatabase();
        String where = null;
        switch (Constantes.uriMatcher.match(uri)) {
            case Constantes.TODOS:
                where = selection;
                break;
            case Constantes.UNO:
                where = " _id = " + uri.getLastPathSegment();
                break;
        }
        return db.query(Constantes.TABLA, projection, where, selectionArgs, null, null, sortOrder);
    }

    @Override
    public int update(@NonNull Uri uri, ContentValues values, String selection,
                      String[] selectionArgs) {
        SQLiteDatabase db = getSqLiteDatabase();
        String where = null;
        switch (Constantes.uriMatcher.match(uri)) {
            case Constantes.TODOS:
                where = selection;
                break;
            case Constantes.UNO:
                where = " _id = " + uri.getLastPathSegment();
                break;
        }
        return db.update(Constantes.TABLA, values, where, selectionArgs);
    }
}
```

### Permisos

```xml
<provider
    android:name=".MiProveedor"
    android:authorities="com.pdm.restaurante"
    android:enabled="true"
    android:exported="true">
<provider>
```

### Usar Content provider

## Broadcast Receiver

Nueva clase que extiende de BroadcastReceiver (New->Other->Broadcast Receiver)

```java
public class MyReceiver extends BroadcastReceiver {

    @Override
    public void onReceive(Context context, Intent intent) {
        // TODO: This method is called when the BroadcastReceiver is receiving an Intent broadcast.
    }
}
```

Para que funcione se tiene que definir el Broadcast Receiver.

- De forma estática: en el Manifest

```xml
<receiver
    android:name=".MyReceiver"
    android:enabled="true"
    android:exported="true">
    <intent-filter>
        <action android:name="android.intent.action.BATTERY_LOW" />
    </intent-filter>
</receiver>
```

- De forma dinámica: por código

```java
registerReceiver(EjemploReceiver,new IntentFilter(Intent.ACTION_BATTERY_LOW));
unregisterReceiver(EjemploReceiver);
```

## Servicios

### Nativos

Notification Manager
Alarm Manager

```java
alarmManager.set();
alarmManager.exact();
alarmManager.cancel();

PendingIntent
```

JobScheduler

## Propios

### Locales/Iniciados

New->Service->Service

```java


```

### Vinculados/Remotos

## Acceso a datos Remotos

### Volley

```xml
implementation 'com.android.volley:volley:1.1.1'
```
