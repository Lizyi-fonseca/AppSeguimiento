<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fichadecaracterizacion extends Model

    {
    protected $table = 'tblfichasde_caracterizacion';

    protected $primaryKey = 'nis';

    public $timestamps = false; 

    protected $fillable = [
        'codigo',
        'denominacion',
        'cupo',
        'fechainicio',
        'fechafin',
        'observacion',
        'tblprogramasde_formacion_nis',
        'tblcentros_formacion_nis',
        'tblcentros_formacion_tblregionales_nis'
    ];
}
