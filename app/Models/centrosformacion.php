<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class centrosformacion extends Model
{
    protected $table = 'tblcentros_formacion';

    protected $primaryKey = 'nis';

    public $timestamps = false; 

    protected $fillable = [
        'codigo',
        'denominacion',
        'direccion',
        'observaciones',
        'tblregionales_nis'
    ];
}
