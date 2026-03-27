<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rolesadministrativos extends Model
{
    protected $table = 'tblroles_administrativos';

    protected $primaryKey = 'nis';

    public $timestamps = false; 

    protected $fillable = [
        'nis',
        'descripcion'
    ];


    public function users(){
        return $this->hasMany(User::class, 'rol', 'nis');
    }   
    
}
