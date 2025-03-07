<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'Alumnos';
    protected $fillable = ['nombre', 'dni', 'email', 'password', 'updated_at', 'created_at'];
}
