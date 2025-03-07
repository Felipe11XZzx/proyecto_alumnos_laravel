<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreAlumnoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; /* autorizar la petición */
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function dni():string {
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $num=$this->faker->unique()->randomNumber(8);
        $cif = $num."-".$letras[$num % 23];
        return $cif;
    }
    public function rules(): array
    {
        return [
            "data.attributes.nombre"=> "required|string|max:255",
            "data.attributes.dni"=> "required|string|size:10|unique:Alumnos,dni|regex:/^[0-9]{8}[A-Z]$/}",
            "data.attributes.email"=> "required|email|unique:Alumnos,email",
        ];
    }
}
