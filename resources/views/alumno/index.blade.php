<x-layouts.layout>
    <!-- Contenedor principal con estilo para el contenido -->
    <div class="max-h-full overflow-x-auto p-4">
        
        <!-- Mostrar mensaje de estado si existe -->
        @if (session()->has ("status"))
            <h2>{{session()->get("status")}}</h2>
        @endif

        <!-- Botón para crear un nuevo alumno -->
        <a href="alumnos/create" class="btn mb-4" style="background-color:rgb(19, 143, 46); border: 2px solid #7E828D;">Crear alumno</a>

        <!-- Contenedor para la tabla -->
        <div class="overflow-x-auto">
            <div class="bg-white">
                <!-- Tabla que muestra los alumnos -->
                <table class="table table-zebra table-xs w-full shadow-lg">
                    <thead>
                        <tr>
                            <!-- Encabezados de las columnas de la tabla -->
                            <th class="text-center font-semibold text-white text-xl bg-footer">NOMBRE</th>
                            <th class="text-center font-semibold text-white text-xl bg-footer">DNI</th>
                            <th class="text-center font-semibold text-white text-xl bg-footer">EMAIL</th>
                            <th class="text-center font-semibold text-white text-xl bg-footer"></th>
                            <th class="text-center font-semibold text-white text-xl bg-footer"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Recorrer cada alumno y mostrar sus datos en la tabla -->
                        @foreach($alumnos as $alumno)
                            <tr class="hover:bg-gray-100">
                               
                                <td class="text-center text-lg">{{$alumno->name}}</td>
                                
                                <td class="text-center text-lg">{{$alumno->dni}}</td>
                                
                                <td class="text-center text-lg">{{$alumno->email}}</td>
                                 <!-- Columna para la opción de editar (aunque no tiene funcionalidad aún) -->
                                 <td> 
                                    <a href="{{route("alumnos.edit",$alumno->id)}}">
                                    <!-- Icono para editar (aunque no hace nada en este momento) -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-6 hover:bg-red-700 hover:text-white">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    <h2>Editar</h2>
                                </td>

                                <!-- Columna para la opción de borrar el alumno -->
                                <td>
                                    <!-- Formulario para eliminar al alumno, pero no se envía automáticamente -->
                                    <form onsubmit=event.preventDefault() id="formulario{{$alumno->id}}" action="{{route('alumnos.destroy', $alumno->id)}}" method="POST">
                                        @method("DELETE") <!-- Indica que es una petición DELETE -->
                                        @csrf <!-- Se incluye el token de seguridad de Laravel -->
                                        
                                        <button onclick="confirmarDelete({{$alumno->id}})">
                                            <!-- Icono para eliminar al alumno -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                            </svg>
                                            <h2>Borrar</h2>
                                        </button>
                                    
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Script para confirmar antes de borrar un alumno -->
        <script>
            // Función que muestra una alerta de confirmación antes de eliminar
            function confirmarDelete(id){
                swal({
                    title: "¿Estas seguro?",
                    text: "No podrás revertir esta acción",
                    icon: "warning", 
                    buttons: true, // Mostramos los botones de confirmación
                }).then((ok) => {
                    // Si el usuario confirma la eliminación
                    if(ok){
                        // Enviar el formulario para eliminar al alumno
                        document.getElementById(`formulario${id}`).submit();
                    }
                });
            }
        </script>
    </div>
    </x-layouts.layout>