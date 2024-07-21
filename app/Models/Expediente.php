<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_persona',
        'nombre_razonsocial',
        'nro_documento',
        'nombre_razonsocial',
        'direccion',
        'celular',
        'email',
        'asunto',
        'descripcion',
        'url_drive',
        'folio',
        'archivo',
        'tipo_documento_id',
    ];

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }

    public function getCreatedAtAttribute($value)
    {
//        return Carbon::parse($value)->diffForHumans();
        $carbonDate = Carbon::parse($value);

        if ($carbonDate->isToday()) {
            return $carbonDate->format('H:i');
        } elseif ($carbonDate->isCurrentYear()) {
            return $carbonDate->format('d M');
        } else {
            return $carbonDate->format('d M Y');
        }
    }

}
