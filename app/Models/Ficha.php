<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Ficha extends Model
{
    use HasFactory;
    protected $fillable = [
        'dp_apellido_p',
        'dp_apellido_m',
        'dp_nombre',
        'numero_documento',
        'da_numero_celular',
        'da_email',
        'estado_postulante',
        'fecha_confor_carne',
        'AD1',
        'AD2',
        'AD3'
    ];
}
