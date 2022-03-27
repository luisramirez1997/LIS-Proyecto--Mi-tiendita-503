<?php

use Illuminate\Database\Seeder;

class Rol_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'              => 'admin',
            'descripcion'       => 'administrador del sistema',
        ]);

        DB::table('roles')->insert([
            'name'              => 'user',
            'descripcion'       => 'usuario normal del sistema',

        ]);
    }
}
