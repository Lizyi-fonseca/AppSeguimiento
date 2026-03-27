<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class instructores extends Model
{
    protected $table = 'tblinstructores';

    protected $primaryKey = 'nis';

    public $timestamps = false; 

    protected $fillable = [
        'numdoc',
        'nombres',
        'apellidos',
        'direccion',
        'telefono',
        'correoint',
        'correoprs',
        'sexo',
        'fechadn',
        'tblroles_administrativos_nis',
        'tbltipos_documentos_nis',
         'tbl_eps_nis',
         'users_id'
    ];


    public function usuario()  {
        return $this->belongsTo(User::class, 'users_id', 'nis');
    }
}