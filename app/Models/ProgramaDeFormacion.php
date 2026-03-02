<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramaDeFormacion extends Model
{
    protected $table = 'tblprogramasde_formacion';

    protected $primaryKey = 'nis';

    public $timestamps = false; 

    protected $fillable = [
        'codigo',
        'denominacion',
        'observaciones'
    ];
}
