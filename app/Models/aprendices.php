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
        'tblfichasde_caracterizacion_tblprogramasde_formacion_nis',
        'tbl_eps_nis'
    ];

    public function ficha()
    {
        return $this->belongsTo(fichasde_caracterizacion::class, 'tblfichasde_caracterizacion_nis', 'nis');
    }

    public function programa()
    {
        return $this->belongsTo(ProgramaDeFormacion::class, 'tblfichasde_caracterizacion_tblprogramasde_formacion_nis', 'nis');
    }

    public function eps()
    {
        return $this->belongsTo(eps::class, 'tbl_eps_nis', 'nis');
    }
}
