<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bitacora extends Model
{

    protected $table = 'tbl_bitacoras';

    protected $primaryKey = 'nis';

    public $timestamps = true;


    protected $fillable = [
        'nis',
        'archivo',
    ];
}
