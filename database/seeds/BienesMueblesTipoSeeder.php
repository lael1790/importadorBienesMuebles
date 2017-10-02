<?php

use Illuminate\Database\Seeder;

class BienesMueblesTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i=0; $i<3; $i++)
	        $bienes_muebles_tipo = \DB::table('bienes_muebles_tipo')->insert(array(
	        	'id' => $i + 1,
	        	'cve_tipo' => ($i == 0) ? 'CAPITALIZABLE' : ( ($i == 1) ? 'NO CAPITALIZABLE' : 'CUENTAS DE ORDEN')
	        ));
    }
}
