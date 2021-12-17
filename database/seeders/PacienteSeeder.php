<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([
        	[
	            'nombres' => 'Jose juan',
	        	'apellidos' => 'Rodriguez Fernandez',
	        	'edad' => 23,
	        	'sexo' => 'Masculino',
	        	'cedula' => '9-021-511',
	        	'tipo_sangre' => 'A+',
	        	'telefono' => 66884523,
	        	'correo' => 'jose@gmail.com',
	        	'direccion' => 'panama oeste, arraijan cabezera'
        	],
			
        	[
	        	'nombres' => 'Lisbeth Alicia',
	        	'apellidos' => 'Gonzales perez',
	        	'edad' => 22,
	        	'sexo' => 'Femenino',
	        	'cedula' => '8-028-452',
	        	'tipo_sangre' => 'O+',
	        	'telefono' => 68994573,
	        	'correo' => 'Lisbeth@gmail.com',
	        	'direccion' => 'ciudad de panama juan diaz '
        	]
        	
        ]);

    }
}
