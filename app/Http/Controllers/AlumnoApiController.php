<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Resources\AlumnoResource;
use App\Models\Alumno;
use App\Http\Resources\AlumnoCollection;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class AlumnoApiController extends Controller
{
    // NO FUNCIONA EL SWAGGER PENDIENTE DE IMPLEMENTARLO.
    /**
     * @OA\Info(
     *    version="1.0.0",
     *    title="API PARA ALUMNOS",
     *    description="API para consultar alumnos del instituto",
     *     @OA\Contact(
     *         email="felipe1111r@gmail.com"
     *     ),
     *      @OA\License(
     *          name="MIT",
     *          url="https://opensource.org/license/mit"
     *      )
     * )
     */
    public function index()
    {
        return new AlumnoCollection(Alumno::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        // recojo los datos y los guardo
        $datos=$request->input("data.attributes");
        $alumno=new Alumno($datos);
        $alumno->save();
        return new AlumnoResource($alumno);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
