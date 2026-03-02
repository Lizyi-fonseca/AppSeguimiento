<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles_administrativos extends Model
{
    protected $table = 'tblroles_administrativos';

    protected $primaryKey = 'nis';

    public $timestamps = false; 

    protected $fillable = [
        'nis',
        'descripcion'
    ];
}
