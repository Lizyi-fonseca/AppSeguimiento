<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipos_documentos extends Model
{
    protected $table = 'tbltipos_documentos';

    protected $primaryKey = 'nis';

    public $timestamps = false; 

    protected $fillable = [
        'denominacion',
        'observaciones'
    ];
}
