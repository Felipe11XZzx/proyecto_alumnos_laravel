<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Models\Alumno; // Importamos el modelo Alumno para interactuar con la base de datos
use Illuminate\Http\Request; // Importamos la clase Request para trabajar con los datos de la petición

// Controlador AlumnoController que gestiona la lógica relacionada con los alumnos
class AlumnoController extends Controller
{
    // Método para mostrar todos los alumnos
    public function index()
    {
        $alumnos = Alumno::all();   // Recuperamos todos los registros de alumnos desde la base de datos
        return view("alumno.index", ["alumnos" => $alumnos]); // Retornamos la vista 'alumno.index' y le pasamos los alumnos para ser visualizados
    }

    // Método para mostrar el formulario para crear un nuevo alumno
    public function create()
    {
        return view('alumno.create');  // Retornamos la vista 'alumno.create', donde el usuario podrá ingresar los datos de un nuevo alumno
    }

    // Método para almacenar un nuevo alumno en la base de datos
    public function store(StoreAlumnoRequest $request) // Recibe los datos enviados desde el formulario
    {
        $datos = $request->except("_token"); // Se obtiene toda la información del formulario, exceptuando el token de seguridad (_token)
        $alumno = new Alumno($datos); // Creamos una nueva instancia del modelo Alumno con los datos recibidos
        $alumno->save();  // Guardamos el alumno en la base de datos
        session()->flash("status", "Se ha creado el alumno $alumno->name");   // Usamos 'session()->flash' para almacenar un mensaje temporal que será mostrado después
        return redirect()->route('alumno.index'); // Redirigimos al usuario a la ruta 'alumno.index', que es donde se listan todos los alumnos
    }

    public function update(Request $request, Alumno $alumno)
    {
        $datos = $request->input();

        $alumno->update($request->input()); // Actualizamos el alumno en la base de datos con los datos recibidos
        session()->flash("status", "Se ha actualizado el alumno $alumno->name"); // Usamos 'session()->flash' para almacenar un mensaje temporal indicando que el alumno fue actualizado
        return redirect()->route('alumno.index'); // Redirigimos al usuario nuevamente a la lista de alumnos
    }
    public function edit(Alumno $alumno)
    {
        return view("alumnos.edit",["alumno" => $alumno]); // Creamos una nueva instancia del modelo Alumno con los datos recibidos('alumno')); // Retornamos la vista 'alumno.edit' y le pasamos el alumno para ser editado
    }

    // Método para eliminar un alumno específico
    public function destroy(Alumno $alumno)
    {
        $alumno->delete(); // Eliminamos al alumno de la base de datos
        session()->flash("status", "Se ha borrado el alumno $alumno->name"); // Usamos 'session()->flash' para almacenar un mensaje temporal indicando que el alumno fue borrado
        return redirect()->route('alumnos.index'); // Redirigimos al usuario nuevamente a la lista de alumnos
    }
}
   /*
    public function show(Alumno $alumno)
    {
        return view('alumno.show', compact('alumno'));
    }    public function edit(Alumno $alumno)
    {
        return view('alumno.edit', compact('alumno'));
    }    public function update(Request $request, Alumno $alumno)
    {
        $alumno->nombre = $request->nombre;
        $alumno->apellido = $request->apellido;
        $alumno->edad = $request->edad;
        $alumno->save();        return redirect()->route('alumno.index');
    }    public function generateRandom()
    {
        // Generar 10 alumnos aleatorios
        Alumno::factory()->count(10)->create();        return redirect()->route('alumno.index')->with('success', 'Se han generado 10 alumnos aleatorios');
    }*/
