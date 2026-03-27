<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class entecoformadores extends Model
{
    protected $table = 'tblente_coformadores';

    protected $primaryKey = 'nis';

    public $timestamps = false; 

    protected $fillable = [
        'tdoc',
        'numdoc',
        'razonsocial',
        'direccion',
        'telefono',
        'correoint'
        
    ];
}
