<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tiposdocumento extends Model
{
    protected $table = 'tbltipos_documentos';

    protected $primaryKey = 'nis';

    public $timestamps = false;

    protected $fillable = [
        'denominacion',
        'observaciones'
    ];
}
