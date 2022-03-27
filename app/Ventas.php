<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table = 'ventas';

    
    public function vendedor(){
        return $this->hasOne('App\User','id','id_vendedor');
    }

    public function producto(){
        return $this->hasOne('App\Productos','id','id_producto');
    }
    public function status(){
        if ($this->estado == 1) {
            return '<p class="text-success">DISPONIBLE</p>';
        }else{
            return '<p class="text-danger">NO DISPONIBLE</p>';
        }
    }
}
