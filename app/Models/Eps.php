<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Eps extends Model
{
      use HasFactory;
protected $table = 'tbl_eps';

protected $primaryKey = 'nis';

public $timestamps = false;


protected $fillable =[

'nis',
'numd',
'denominacion',
'observaciones'

];




}
