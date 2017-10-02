<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClavesModel extends Model
{
    protected $table = 'bienes_muebles';
    public $timestamps = false;
    /*
    protected $fillable = [
    	'cog_id','cve_armonizada','descrip','id_tipo'
    ];
    */
}
