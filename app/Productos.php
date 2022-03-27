<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';

    
    public function categoria(){
        return $this->hasOne('App\Categorias','id','id_categoria');
    }
    public function status(){
        if ($this->estado == 1) {
            return '<p class="text-success">DISPONIBLE</p>';
        }else{
            return '<p class="text-danger">NO DISPONIBLE</p>';
        }
    }
}
