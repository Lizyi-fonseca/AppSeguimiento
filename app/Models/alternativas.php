<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alternativas extends Model
{
    protected $table = 'tbl_alternativas';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado'
    ];



    
}
