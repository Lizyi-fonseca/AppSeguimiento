<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aprendices extends Model
{

    protected $table = 'tblaprendices';

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
        'tbltipos_documentos_nis',
        'tblfichasde_caracterizacion_nis',
        'tbl_eps_nis',
        'users_id'
    ];

    public function ficha()
    {
        return $this->belongsTo(fichadecaracterizacion::class, 'tblfichasde_caracterizacion_nis', 'nis');
    }

    public function tiposdocumento()
    {
        return $this->belongsTo(tiposdocumento::class, 'tbltipos_documentos_nis', 'nis');
    }

    public function eps()
    {
        return $this->belongsTo(Eps::class, 'tbl_eps_nis', 'nis');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'users_id', 'nis');
    }
}

