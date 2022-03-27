<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = 'categorias';

    public function status(){
        if ($this->estado == 1) {
            return '<p class="text-success">DISPONIBLE</p>';
        }else{
            return '<p class="text-danger"> NO DISPONIBLE</p>';
        }
    }
}
