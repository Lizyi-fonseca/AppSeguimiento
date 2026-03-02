<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class regionales extends Model
{
     protected $table = 'tblregionales';

    protected $primaryKey = 'nis';

    public $timestamps = false; 

    protected $fillable = [
       'codigo',
       'denominacion',
       'direccion',
       'observacion'
    ];
}
