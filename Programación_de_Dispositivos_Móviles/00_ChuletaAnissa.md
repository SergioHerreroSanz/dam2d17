# Markdown Starter Worksheet

- [Markdown Starter Worksheet](#markdown-starter-worksheet)
  - [Diseño básico y material](#dise%c3%b1o-b%c3%a1sico-y-material)
  - [Eventos](#eventos)
  - [Actividades](#actividades)
  - [Comunicando](#comunicando)
  - [Permisos](#permisos)
  - [Ciclo de vida](#ciclo-de-vida)
  - [Controles](#controles)
  - [AppBar](#appbar)
  - [Fragmentos I - PDF](#fragmentos-i---pdf)
  - [Pestañas](#pesta%c3%b1as)
  - [ReyclerView - PDF](#reyclerview---pdf)
  - [Preferencias](#preferencias)
  - [Fragmentos II](#fragmentos-ii)
  - [Diálogos](#di%c3%a1logos)
  - [NavigationDrawer](#navigationdrawer)

---

## Diseño básico y material
**//** CREAR UN COLOR
> **Archivo:** res/values/colors.xml
```xml
 <color name=”nombre”>código</color>
```
> **Archivo:** res/values/styles.xml
```xml
 <style name="MiEstilo">
  <item name="android:textColor">@color/miNaranja</item>
 </style>
```
<br>

**//** CREAR UN COLOR PARA UN TEMA
> **Archivo:** res/values/colors.xml
```xml
 <color name="primary">#código</color>
 <color name="primary_dark">#código</color>
 <color name="accent_dos">#código</color>
```
<br>

**//** CREAR UN ESTILO
> **Archivo:** res/values/colors.xml
```xml
 <style name="nombre" parent="Theme.AppCompat.Light.NoActionBar">
  <item name="colorPrimary">@color/primary</item>
  <item name="colorPrimaryDark">@color/primary_dark</item>
  <item name="colorAccent">@color/accent_dos</item>
 </style>  
```
> **MANIFIEST:** android:theme="@style/nombre"

<br>

**//** AÑADIR UN ESTILO A OTRAS ACTIVIDADES
```xml
 <style name="MiTemaDos.NoActionBar">
  <item name="windowActionBar">false</item>
  <item name="windowNoTitle">true</item>
 </style> 
```
<br><br>

## Eventos

```java
· RECOBRAR FOCO
  EditText.requestFocus();

· ASIGNAR DATO
  # String: EditText.setText(cadena);
  # Number: EditText.setText(String.valueOf(numero);

· RECOGER DATO
  String res = EditText.getText.ToString();

· CONTAR CARÁCTERES
  int valor = c.trim.length();

· COLOR FONDO
  ConstraintLayout fondo = findViewById(R.id.layout_main);
  int color;
  color = ContextCompat.getColor(getApplicationContext(), R.color.miColor);
  color = Color.WHITE;
  fondo.setBackgroundColor(color); 

· TRANSPARENCIA
    # Visible: Image.setImageAlpha(255);
    # No visible: Image.setImageAlpha(0);

· AÑADIR LISTENER A VARIOS BOTONES
    1 # implements View.OnClickListener
    2 # Crear botones
    3 # Añadir listener
      btn.setOnClickListener(this);  
    4 # Crear Switch en el método onClick
      switch (v.getId()) {
            case R.id.btn:
            ...
      }
```
<br>
<br>

## Actividades
**//** IR A OTRA ACTIVIDAD
> **Plantilla:** Basic
```java
 Intent nombre = new Intent(getApplicationContext(), NombreClase.class);
 StartActivity(nombre);
```
<br>

**//** ENVIAR 1 DATO A OTRA ACTIVIDAD
> **MainActivity.java**
```java
 Intent nombre = new Intent(getApplicationContext(), NombreClase.class);
 Intent.putExtra = (“nombre”, valor1);
 StartActivity(nombre);
```
> **SegundaActivity.java**
```java
 Bundle bundle = getIntent.getExtras();
 TextView.setText(bundle.getString(“nombre”);
```
<br>

**//** ENVIAR MÁS DE 1 DATO A OTRA ACTIVIDAD
> **MainActivity.java**
```java
 Intent nombre = new Intent(getApplicationContext(), NombreClase.class);
 Bundle bundle = new Bundle();
 Bundle.PutString(“nombre”, valor1);
 Bundle.PutInt(“edad”, valor2);
 Intent.putExtras(bundle)
 StartActivity(nombre);
```
> **SegundaActivity.java**
```java
 Bundle bundle = new Bundle();
 Bundle.getIntent.getExtras();
 TextView.setText(bundle.getString(“nombre”);
```
<br>

**//** ACTIVIDADES INTERCOMUNICADAS
> **MainActivity.java**
```java
 Intent intent = new Intent(getApplicationContext(), SegundaActivity.class);
 Bundle bundle = new Bundle();
 EditText txtNombre = findViewById(R.id.editTextNombre);
 intent.putExtra("nombre", txtNombre.toString());
 startActivityForResult(intent, 1234);
```
> **SegundaActivity.java**
```java
 String resultado = "OK";
 Intent intent = new Intent();
 intent.putExtra("resultado", resultado);
 setResult(RESULT_OK, intent);
 finish();
```
> **MainActivity.java**
```java
    protected void onActivityResult(int requestCode, int resultCode, Intent intent) {
        super.onActivityResult(requestCode, resultCode, intent);
        String res = "Sin resolver";
        if (requestCode == 1234 && resultCode == RESULT_OK) {
            res = intent.getExtras().getString("resultado");
        }
        TextView textView = findViewById(R.id.textView);
        textView.setText(res);
    }
```
<br>
<br>

## Comunicando
**//** MARCA NÚMERO
> **Manual**
```java
Intent marcar = new Intent(Intent.ACTION_DIAL,Uri.parse("tel:976491015"));
startActivity(marcar);
```
<br>

> **Personalizado**
```java
Intent llamada = new Intent(Intent.ACTION_DIAL, Uri.parse("tel:" + txtNumero.getText().toString()));
v.getContext().startActivity(llamada);
```
<br>
<br>

## Permisos
- NORMALES
<br>

**//** IR A SITIO WEB
```java
Intent web = new Intent(Intent.ACTION_VIEW, Uri.parse("http://www.iespabloserrano.es"));
startActivity(web);
```
<br>

**//** GOOGLE MAPS
```java
Intent map = new Intent(Intent.ACTION_VIEW, Uri.parse("geo:41.645121, -0.863877?z=18"));
startActivity(map);
```
<br>

**//** EMAIL
```java
Intent intentEmail = new Intent(Intent.ACTION_SEND, Uri.parse("mail"));
intentEmail.setType("text/plain");
intentEmail.putExtra(Intent.EXTRA_SUBJECT, "Asunto de prueba");
intentEmail.putExtra(Intent.EXTRA_TEXT, "Probando el envío");
intentEmail.putExtra(Intent.EXTRA_EMAIL, new String[] {"anissabenyo@gmail.com"});
startActivity(intentEmail);
```
<br>

- PELIGROSOS
<br>

**1 #** 
```xml
<uses-permission android:name="android.permission.CALL_PHONE"></uses-permission>
```
<br>

```java
private static final int REQUEST_CALL = 1;
ImageView llamada = findViewById(R.id.imageView);
llamada.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View v) {
        // Comprobar si tengo permiso para realizar la llamada
        int comprobarPermiso = ContextCompat.checkSelfPermission(getApplicationContext(), Manifest.permission.CALL_PHONE);
        if (comprobarPermiso == PackageManager.PERMISSION_GRANTED) {
            hacerLlamada();
        } else {
            solicitarPermiso();
        }
    }
});
```
```java
public void hacerLlamada() {
    TextView txtNumero = findViewById(R.id.editText);
    String dial = "tel:";
    Intent llamada = new Intent(Intent.ACTION_CALL, Uri.parse(dial + txtNumero.getText().toString()));
    // Evitar que se rompa en un dispositivo que no realiza llamadas
    if(llamada.resolveActivity(getPackageManager()) != null) {
        startActivity(llamada);
    }
}
```
```java
public void solicitarPermiso() {
    if (ActivityCompat.shouldShowRequestPermissionRationale(this, Manifest.permission.CALL_PHONE)) {
        final Activity activity = this;
        View vista = findViewById(R.id.activity_main);
        Snackbar.make(vista, "Se necesitan permisos", Snackbar.LENGTH_INDEFINITE)
        .setAction("OK", new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                ActivityCompat.requestPermissions(activity, new String[]{Manifest.permission.CALL_PHONE}, REQUEST_CALL);
            }
        })
        .show();
    } else {
        ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.CALL_PHONE}, REQUEST_CALL);
    }
}
```
```java
public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
    if (requestCode == REQUEST_CALL) {
        if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
            hacerLlamada();
        } else {
            Toast.makeText(this, "No se pudo realizar la llamada", Toast.LENGTH_LONG).show();
        }
    }
}
```
<br>

## Ciclo de vida
## Controles
- SPINNER PERSONALIZADO <br>
**# 1** Añadir el spinner al content_main e identificarlo.
**# 2** Crear un layout_item <br>
-> Añadir al ConstraintLayout: ?android:attr/listPreferredItemHeight <br>
**# 3** Crear clase Item.java <br>
Añadir los elementos creados en el layout_item + id
```java
long id;
String api;
Drawable imagen;
```
Crear constructor & getter+setter. <br>
**# 4** Crear el adaptador: MiAdaptador.java <br>
Superclass: android.widget.BaseAdapter <br>
Implementar métodos
```java
private final Activity contexto;
private final ArrayList<Item> lista;
public MiAdaptador(Activity contexto, ArrayList<Item> lista {
    this.contexto = contexto;
    this.lista = lista;
}
```
```java
    public int getCount() {
        return lista.size();
    }
```
```java
public Object getItem(int position) {
    return lista.get(position);
}
```
```java
public long getItemId(int position) {
    return lista.get(position).getId();
}
```
View getView
```java
LayoutInflater inflater = contexto.getLayoutInflater();
convertView = inflater.inflate(R.layout.layout_item, null, true);
Item item = lista.get(position);
TextView textView = convertView.findViewById(R.id.txtViewTitulo);
textView.setText(item.getApi());
ImageView imageView = convertView.findViewById(R.id.imgViewItem);
imageView.setImageDrawable(item.getImagen());
return convertView;
```
**# 5** Crear un array de Drawables / Texto
```xml
Arrays.xml
<array name="logos">
    <item>@drawable/sinlogo</item>
    <item>@drawable/diez</item>
    <item>@drawable/pie</item>
    <item>@drawable/oreo</item>
    <item>@drawable/nougat</item>
    <item>@drawable/marshmallow</item>
    <item>@drawable/lollipop</item>
</array>
```
```xml
Strings.xml
    <array name="version">
        <item>Android 10 (10.0)</item>
        <item>Pie (9.0)</item>
        <item>Oreo(8.0-8.1)</item>
        <item>Nougat(7.0-7.1)</item>
        <item>Marshmallow(6.0)</item>
        <item>Lollipop(5.0-5.1)</item>
    </array>
```
**MainActivity.java**
```java
final Resources resources = getResources();
final String[] version = resources.getStringArray(R.array.version);
final String[] num_api = resources.getStringArray(R.array.num_api);
TypedArray logos = resources.obtainTypedArray(R.array.logos);

ArrayList<Item> lista = new ArrayList<>();
for (int i = 0; i < 6; i++) {
    lista.add(new Item(i + 1, version[i], logos.getDrawable(i)));
}
logos.recycle();

MiAdaptador miAdaptador = new MiAdaptador(this, lista);
Spinner spinner = findViewById(R.id.spinner);
spinner.setAdapter(miAdaptador);
spinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        if (position!=0) {
            String resu = version[position] + " es " + num_api[position];
            Toast.makeText(getApplicationContext(), resu, Toast.LENGTH_SHORT).show();
        }
    }
    @Override
    public void onNothingSelected(AdapterView<?> parent) {
    }
});
```
- Spinner normal
```java
final TextView txtView = findViewById(R.id.textView);
Spinner spinner2 = findViewById(R.id.spinner2);
ArrayAdapter<String> arrayAdapter= new ArrayAdapter<>(this,android.R.layout.simple_spinner_dropdown_item, getResources().getStringArray(R.array.asignaturas));
spinner2.setAdapter(arrayAdapter);
spinner2.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        String[] cursos = getResources().getStringArray(R.array.cursos);
        String resu = "El curso de " + parent.getItemAtPosition(position) + " es " + cursos[position];
        txtView.setText(resu);
    } @
            Override
    public void onNothingSelected(AdapterView<?> parent) {
        txtView.setText("Escoja asignatura");
    }
});
```



## AppBar
> **Plantilla:** Empty
<br>

**Archivo** build-gradle
```java
implementation 'com.google.android.material:material:1.0.0'
```
**Manifiest**
> android:allowBackup="true"
> android:icon="@mipmap/ic_launcher"
> android:label="@string/app_name"
> android:roundIcon="@mipmap/ic_launcher_round"
> android:supportsRtl="true"
> android:theme="@style/MiTemaDos.**NoActionBar"**>

**Styles.xml**
```xml
<style name="AppTheme.AppBarOverlay" parent="ThemeOverlay.AppCompat.Dark.ActionBar" />
<style name="AppTheme.PopupOverlay" parent="ThemeOverlay.AppCompat.Light" />
```
<br>

**ActivityMain.xml**
**tools:context=".MainActivity">**
```xml
<com.google.android.material.appbar.AppBarLayout
    android:layout_width="match_parent"
    android:layout_height="wrap_content"
    android:theme="@style/AppTheme.AppBarOverlay">

    <androidx.appcompat.widget.Toolbar
        android:id="@+id/toolbar"
        android:layout_width="match_parent"
        android:layout_height="?attr/actionBarSize"
        android:background="?attr/colorPrimary"
        app:popupTheme="@style/AppTheme.PopupOverlay" />
</com.google.android.material.appbar.AppBarLayout>
```
*Realizar los mismos pasos para el landscape.*

**ActivityMain.java**
<br>
```java
Toolbar toolbar = findViewById(R.id.toolbar);
setSupportActionBar(toolbar);
-> Import androidx.appcompat.widget.Toolbar
```
Crear un menú: Res - Android Resource Directory: Menu <br>
Posicionarse en Menu - Menu resource file - menu_main
<br>

**Menu_main.xml**
<br>
Añadir **menu_item** dentro del menu.
Atributos a completar
-	Title
-	Id
-	Icon
-	showAsAction
-	orderInCategory

**ActivityMain.java**
<br>
```java
@Override
public boolean onCreateOptionsMenu(Menu menu) {
    getMenuInflater().inflate(R.menu.menu_main, menu);
    return true;
}
@Override
public boolean onOptionsItemSelected(MenuItem item) {
    switch (item.getItemId()) {
        case R.id.item1:
            Toast.makeText(getApplicationContext(), "Test", Toast.LENGTH_LONG).show();
            break;
        case R.id.item2:
            Intent acercaDe = new Intent(getApplicationContext(), SegundaActivity.class);
            startActivity(acercaDe);
            break;
        default:
            return super.onOptionsItemSelected(item);
    }
    return true;
}
```
<br>

> **Plantilla:** Basic

**Menu_main.xml**
<br>
Añadir **menu_item** dentro del menu.
Atributos a completar
-	Title
-	Id
-	Icon
-	showAsAction
-	orderInCategory

**ActivityMain.java**
<br>
```java
@Override
public boolean onCreateOptionsMenu(Menu menu) {
    getMenuInflater().inflate(R.menu.menu_main, menu);
    return true;
}
@Override
public boolean onOptionsItemSelected(MenuItem item) {
    switch (item.getItemId()) {
        case R.id.item1:
            Toast.makeText(getApplicationContext(), "Test", Toast.LENGTH_LONG).show();
            break;
        case R.id.item2:
            Intent acercaDe = new Intent(getApplicationContext(), SegundaActivity.class);
            startActivity(acercaDe);
            break;
        default:
            return super.onOptionsItemSelected(item);
    }
    return true;
}
```
<br>
// SWITCH

**1 # Menu_main.xml:** Añadir switch. <br>
**2 # Switch_item.xml:** Añadirle id al componente. <br>
**3 # Menu_main.xml:** ShowAction: Always <br>
<br>

**ActivityMain.java**
<br>
```java
public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_main, menu);
        <------ COPIAR ESTO
        MenuItem menuItem=menu.findItem(R.id.app_bar_switch);
        View view=menuItem.getActionView();
        Switch miSwitch = view.findViewById(R.id.miSwitch);
        miSwitch.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton buttonView,boolean isChecked) {
                if (isChecked) {
                    Toast.makeText(getApplication(), "ON", Toast.LENGTH_SHORT).show();
                } else {
                    Toast.makeText(getApplication(), "OFF", Toast.LENGTH_SHORT).show();
                }
            }
        });
        ------->
        return true;
    }
```

## Fragmentos I - PDF
## Pestañas
**content_main.xml** <br>
Añadir ViewPager y darle id.

**activity_main.xml. Text**
```xml
    <com.google.android.material.appbar.AppBarLayout
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:theme="@style/AppTheme.AppBarOverlay">

        <androidx.appcompat.widget.Toolbar
            android:id="@+id/toolbar"
            android:layout_width="match_parent"
            android:layout_height="?attr/actionBarSize"
            android:background="?attr/colorPrimary"
            app:popupTheme="@style/AppTheme.PopupOverlay" />

        <com.google.android.material.tabs.TabLayout
            android:id="@+id/tabs"
            android:layout_width="match_parent"
            android:layout_height="match_parent" />

    </com.google.android.material.appbar.AppBarLayout>
```
**strings.xml**
```xml
<string-array name="opciones">
<item>Zaragoza</item>
<item>Huesca</item>
<item>Teruel</item>
</string-array>
<string name="texto">Pestaña seleccionada: %1$s</string>
```
Fragmentos a crear: (lo que se vería en cada lista) <br> 
(Ejemplo) <br>
 -> TextFragment <br>
 -> Layout: Meter textView

**TextFragment.java**
```java
private static final String ARG_NUM_TAB = "numTab";
private String mNumTab;

    public static TextoFragment newInstance(String parametro) {
        TextoFragment fragment = new TextoFragment();
        Bundle args = new Bundle();
        args.putString(ARG_NUM_TAB, parametro);
        fragment.setArguments(args);
        return fragment;
    }
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if (getArguments() != null) {
            mNumTab = getArguments().getString(ARG_NUM_TAB);
        }
    }

    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.fragment_texto, container, false);
        TextView textView = v.findViewById(R.id.txtViewLista);
        textView.setText(getString(R.string.texto, mNumTab));
        return v;
    }
```
**Crear clase MiFragmentPagerAdapter**
```java
public class MiFragmentPagerAdapter extends FragmentPagerAdapter {
    private final String[] textosTab;
    public MiFragmentPagerAdapter(FragmentManager fm, Context context) {
        super(fm);
        textosTab = context.getResources().getStringArray(R.array.opciones);
    }
    @Override
    public int getCount() {
        return 3;
    }
    @Override
    public Fragment getItem(int position) {
        Fragment fragment = null;
        switch (position) {
            case 0:
                fragment = TextoFragment.newInstance(textosTab[position]);
                break;
            case 1:
                fragment = TextoFragment.newInstance(textosTab[position]);
                break;
            case 2:
                fragment = TextoFragment.newInstance(textosTab[position]);
                break;
        }
        return fragment;
    }
    @Override
    public CharSequence getPageTitle(int position) {
        return textosTab[position];
    }
}
```
**MainActivity.java**
```java
ViewPager viewPager = findViewById(R.id.viewPager);
viewPager.setAdapter(new MiFragmentPagerAdapter(getSupportFragmentManager(),getApplicationContext()));
TabLayout tabLayout = findViewById(R.id.tabs);
tabLayout.setTabMode(TabLayout.MODE_SCROLLABLE);
tabLayout.setupWithViewPager(viewPager);
```

## ReyclerView - PDF
## Preferencias 
> Nº de veces que se ha abierto una aplicación
```java
final SharedPreferences prefe = getPreferences(Context.MODE_PRIVATE);
final int veces = prefe.getInt("veces", 1);
textView.setText(String.format("%s %s %s", getString(R.string.texto3), Integer.toString(veces), getString(R.string.texto4)));
Button button = findViewById(R.id.button);
button.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View view) {
        SharedPreferences.Editor editor = prefe.edit();
        editor.putInt("veces", veces + 1);
        editor.apply();
        finish();
    }
});
```
> Preferencias UI

**# 1** New - Activity - Settings Activity <br>
**# 2** Crear una 2nda actividad: GuardarPreferencias. <br>
**content_guardar_preferencias.xml** <br>
Añadir id: content_otra
**GuardarPreferencias.java**
```java
Fragment fragment = new SettingsActivity.SettingsFragment();
getSupportFragmentManager().beginTransaction().replace(R.id.content_otra,fragment).commit();
```
**xml/root_preferences**
Añadir componentes <br>
Atributos a completar:
- key
- title
- summary
- dialogTitle: Título de un ListPreference
- entries y entryValues: ListPreference
**Strings.xml**
```xml
    <string-array name="ver">
        <item>Juan</item>
        <item>Miguel</item>
        <item>Anto</item>
    </string-array>

    <string-array name="guardar">
        <item>0</item>
        <item>1</item>
        <item>2</item>
    </string-array>
```
- defaultValue
- useSimpleSummaryProvider
> Leer preferencias
```java
SharedPreferences preferences = PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
Map<String, ?> prefsMap = preferences.getAll();
for (Map.Entry<String, ?> parejaClaveValor: prefsMap.entrySet()) {
    resultado = resultado + parejaClaveValor.getKey() + " : ";
    if (parejaClaveValor.getKey().equals("graficos")) {
        resultado = resultado + getResources().getStringArray(R.array.paraVerPrimer)[Integer.parseInt(parejaClaveValor.getValue().toString())];
    } else if (parejaClaveValor.getKey().equals("conexion")) {
            resultado = resultado + getResources().getStringArray(R.array.paraVerDos)[Integer.parseInt(parejaClaveValor.getValue().toString())];
    } else {
            resultado = resultado + parejaClaveValor.getValue().toString();
    }
    resultado=resultado+System.getProperty("line.separator");
}
Toast.makeText(getApplicationContext(), resultado, Toast.LENGTH_LONG).show();
```

## Fragmentos II
## Diálogos
> **Plantilla:** Basic
<br>

**1 #** Crear el fragmento Dialog
```java
DialogFragment nFragmento = new MiDialogo();
nFragmento.show(getSupportFragmentManager(), "dialogo");
```

**2 #** Implementar el Listener
```java
public interface MiDialogoListener {
    void onDialogPositiveClick(parametros);
}
private MiDialogoListener mListener;
```
**3 #** Adjuntar el Listener al fragmento
```java
public void onAttach(@NonNull Context context) {
    super.onAttach(context);
    try {
        mListener = (MiDialogoListener) getActivity();
    } catch (ClassCastException e) {
        throw new ClassCastException(Objects.requireNonNull(getActivity()).toString()
                + " must implement MiDialogoListener");
    }
}
```
**4 #** Añadir el tipo de Diálogo

- AlertDialog básico
```java
@NonNull
public Dialog onCreateDialog(Bundle savedInstanceState) {
    AlertDialog.Builder builder = new AlertDialog.Builder(Objects.requireNonNull(getActivity()));
    builder.setTitle("¿Desea cerrar la aplicación?")
            .setMessage("Esta acción no puede deshacerse.")
            .setPositiveButton(android.R.string.ok,
                    new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialog, int id) {
                            mListener.onDialogPositiveClick();
                        }
                    })
            .setNegativeButton(android.R.string.cancel,
                    new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialog, int id) {

                        }
                    });
    return builder.create();
}
```
- Lista Simple
<br>
*El array se crea en strings.xml*
```java
public Dialog onCreateDialog(Bundle savedInstanceState) {
    AlertDialog.Builder builder = new AlertDialog.Builder(Objects.requireNonNull(getActivity()));
    builder.setTitle(getArguments().getString("nombre") + " escoja materia.")
            .setItems (getResources().getStringArray(R.array.materias) , new DialogInterface.OnClickListener() {
                public void onClick(DialogInterface dialog, int which) {
                    String asignatura = getResources().getStringArray(R.array.materias)[which];
                    mListener.onDialogEscogidaClick(asignatura);
                    dismiss();
                }
            });
    return builder.create();
}
```
- Lista de opciones
```java
public Dialog onCreateDialog(Bundle savedInstanceState) {
    AlertDialog.Builder builder = new AlertDialog.Builder(Objects.requireNonNull(getActivity()));
    builder.setTitle(getArguments().getString("nombre") + " escoja materia.")
            .setSingleChoiceItems (getResources().getStringArray(R.array.materias), -1 , new DialogInterface.OnClickListener() {
                public void onClick(DialogInterface dialog, int which) {
                    String asignatura = getResources().getStringArray(R.array.materias)[which];
                    mListener.onDialogEscogidaClick(asignatura);
                    dismiss();
                }
            });
    return builder.create();
}
```
- TimePickerDialog
```java
public class MiDialogo extends DialogFragment implementsTimePickerDialog.OnTimeSetListener {
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
- DatePickerDialog
```java
public class MiDialogo extends DialogFragment implements DatePickerDialog.OnDateSetListener {
    @Override
    public Dialog onCreateDialog(Bundle savedInstanceState) {
        final Calendar c = Calendar.getInstance();
        int year = c.get(Calendar.YEAR);
        int month = c.get(Calendar.MONTH);
        int day = c.get(Calendar.DAY_OF_MONTH);
        return new DatePickerDialog(getActivity(), this, year, month, day);
    }
    public void onDateSet(DatePicker view, int year, int month, int day) {
        Toast.makeText(getActivity(),"Has escogido " + day + "-" + month + "-" +
        year,Toast.LENGTH_LONG).show();
    }
}
```

**5 #** Liberar el escuchador
```java
public void onDetach () {
    super.onDetach();
    mListener=null;
}
```
*En caso de que fuera necesario*
<br>

**6 #** Pasar información desde la **MainActivity** > **FragmentoDialog**

**MainActivity.java**
```java
Button btnLista = findViewById(R.id.btnLista);
btnLista.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View v) {
        EditText editTextNombre = findViewById(R.id.editTextNombre);
        // Pasar Información
        DialogFragment nFragmento = MiDialogo.newInstance(editTextNombre.getText().toString());
        nFragmento.show(getSupportFragmentManager(), "dialogo");
    }
});
```

**MiDialogo.java**
```java
static MiDialogo newInstance(String datoRecogido) {
    MiDialogo newInstance = new MiDialogo();
    Bundle args = new Bundle();
    args.putString("nombre", datoRecogido);
    newInstance.setArguments(args);
    return newInstance;
}
```
**7 #** Pasar información desde el **FragmentoDialog** > **MainActivity**
**MiDialogo.java** <br>
Añadir al escuchador el método listener y el dato a enviar.
```java
    public Dialog onCreateDialog(Bundle savedInstanceState) {
        AlertDialog.Builder builder = new AlertDialog.Builder(Objects.requireNonNull(getActivity()));
        assert getArguments() != null;
        builder.setTitle(getArguments().getString("nombre") + " escoja materia.")
                .setItems (getResources().getStringArray(R.array.materias) , new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int which) {
                      String asignatura = getResources().getStringArray(R.array.materias)[which];
                      mListener.onDialogEscogidaClick(asignatura);
                      dismiss();
                    }
                });
        return builder.create();
    }
```
**MainActivity.java**
```implements MiDialogo.MiDialogoListener```
*Añadir en el método lo que se fuera a hacer con esos datos traídos.*

// Personalizar título de los botones:
```.setPositiveButton(R.string.fotoNueva)```

// Activity - Fragment - Dialog
**Fragment.java**
```java
private FragmentListener mListener;

public interface FragmentListener {
    void onClickFragment();
}
```
onCreate
```java
View view = inflater.inflate(R.layout.fragment_primer, container, false);

Button btnCambiar = view.findViewById(R.id.btnCambiar);
btnCambiar.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View v) {
        mListener.onClickFragment();
    }
});
return view;
```
```java
public void onAttach(@NonNull Context context) {
    super.onAttach(context);
    try {
        mListener = (FragmentListener) getActivity();
    } catch (ClassCastException e) {
        throw new ClassCastException(Objects.requireNonNull(getActivity()).toString()
                + " must implement MiDialogoListener");
    }
}

public void onDetach () {
    super.onDetach();
    mListener = null;
}
```
**MainActivity.java**
```java
implements PrimerFragment.FragmentListener

public void onClickFragment() {
    DialogFragment nFragmento = new MiDialogo();
    nFragmento.show(getSupportFragmentManager(), "dialogo");
}
```
Seguir los pasos para crear un diálogo.

## NavigationDrawer
- Añadir imágenes en drawable. <br>

**# 1** Eliminar la carpeta UI y todos los fragmentos. <br>
**# 2** **values/Strings.xml**. Cambiar el título & el subtítulo de la cabecera.
```xml
<string name="nav_header_title">Android Studio</string>
<string name="nav_header_subtitle">android.studio@android.com</string>
```
Además, cambiar el nombre de los menús para las opciones.
```xml
<string name="menu_zgz">Zaragoza</string>
<string name="menu_huesca">Huesca</string>
<string name="menu_teruel">Teruel</string>
```
**# 3** menu/activity_main_drawer.xml. Text. <br>
Cambiar el **id** y el **título**.
```xml
<item
    android:id="@+id/nav_zgz"
    android:icon="@drawable/ic_menu_camera"
    android:title="@string/menu_zgz" 
/>
```
**# 4** layout/nav_header_main.xml. Design. <br>
Cambiar el icono. <br>
**# 5** Preparar los fragmentos. <br>
(Ejemplo)
- PrimerFragment: Ir a su layout (fragment_primer), y añadir una imagen. Elegir cuál.
- SegundoFragment: Ir a su layout (fragment_segundo), y añadir un texto. Poner cuál.
- TercerFragment: Ir a su layout (fragment_tercer), y añadir un texto & una imagen. Poner cuáles. <br>
**# 6** menu/activity_main_drawer.xml. Design. <br>
Cambiar el **icono** de cada item menu. <br>
**# 7** navigation/mobile_navigation. 
<br>Borrar todos e ir añadiendo los fragmentos.
Text. A cada fragmento, cambiarle su **id** al mismo nombre que tienen en menu_activity_main_drawer.xml.
Además, cambiar su **label** @strings/menu_zara <br>

**# 8** **MainActivity.java**

```java
mAppBarConfiguration = new AppBarConfiguration.Builder(
R.id.nav_zgz, R.id.nav_huesca, R.id.nav_teruel)
```                
Para eliminar la tintura <br>
```navigationView.setItemIconTintList(null);```

## (Enviar datos) Activity - Fragment
**Bundle**
```java
    Bundle bundle = new Bundle();
    bundle.putString("dato", mensaje);
    SegundoFragment fragment = new SegundoFragment();
    fragment.setArguments(bundle);
```
```java
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        Bundle recibidos = getArguments();
        if (recibidos != null) {
            texto = recibidos.getString("dato");
        } else {
            texto = "Está vacío";
        }
    }
```
<br>

**NewInstance**
```java
    public static SegundoFragment newInstance(String mensaje) {
        Bundle bundle = new Bundle();
        bundle.putString("dato", mensaje);

        SegundoFragment fragment = new SegundoFragment();
        fragment.setArguments(bundle);
        return fragment;

    }
```

## OTROS
```java
private ArrayList<Item> leerDatos() {
    ArrayList<Item> datos = new ArrayList<>();
    TypedArray fotos = getResources().obtainTypedArray(R.array.fotos);
    Drawable imagen;
    for(int i = 0; i < 3; i++) {
        imagen = fotos.getDrawable(i);
        datos.add(new Item(imagen));
    }
    fotos.recycle();
    return datos;
}

holder.mIdView.setImageDrawable(mValues.get(position).getImagen());

//Controlar dos fragmentos:
boolean horizontal = false;
if (findViewById(R.id.fragment)!= null) {
    horizontal = true;
}

if(!horizontal) {
    DrawerLayout drawer = findViewById(R.id.drawer_layout);
    NavigationView navigationView = findViewById(R.id.nav_view);
    // Passing each menu ID as a set of Ids because each
    // menu should be considered as top level destinations.
    mAppBarConfiguration = new AppBarConfiguration.Builder(
            R.id.nav_inicio, R.id.nav_optA, R.id.nav_optB)
            .setDrawerLayout(drawer)
            .build();
    NavController navController = Navigation.findNavController(this, R.id.nav_host_fragment);
    NavigationUI.setupActionBarWithNavController(this, navController, mAppBarConfiguration);
    NavigationUI.setupWithNavController(navigationView, navController);
    navigationView.setItemIconTintList(null);
}


//Escuchador Fragmento
    public interface UnoFragmentListener {
        void onAButtonClick();
        void onBButtonClick();
    }
    private UnoFragmentListener mListener;



    public void onAttach(@NonNull Context context) {
        super.onAttach(context);
        try {
            mListener = (UnoFragmentListener) getActivity();
        } catch (ClassCastException e) {
            throw new ClassCastException(Objects.requireNonNull(getActivity()).toString()
                    + " must implement MiDialogoListener");
        }
    }


public void onDetach () {
    super.onDetach();
    mListener=null;
}


getSupportFragmentManager().beginTransaction().add(R.id.miLayout,fragmentInsertado).comm
it();

imagen.setImageDrawable(getResources().getDrawable(R.drawable.zaragoza));
```











