<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'titulo'=> 'Colmesdant',
            'foto' => 'https://www.plmconnection.com/plmservices/PharmaSearchEngine/Mexico/DEF/SIDEF/400x400/stendhal_colmesdant_solinyec_cj1fc150mg.png',
            'descripcion' => 'Medicamento para el tratamiento de infecciones agudas o crónicas',
            'precioU'=> 2473,
            'precioV'=> 1400,
            'cantidadP'=> 5
          ]);
          Producto::create([
            'titulo'=> 'Corovir 100mg',
            'foto' => 'https://www.dstamaria.com/wp-content/uploads/2021/04/corovir.png',
            'descripcion' => 'Medicamento para tratar el SARS-CoV-2 (COVID-19)',
            'precioU'=> 7000,
            'precioV'=> 10000,
            'cantidadP'=> 2
        ]);
        Producto::create([
            'titulo'=> 'Asparaginasa 10.000 UI',
            'foto' => 'https://www.plmconnection.com/plmservices/PharmaSearchEngine/Mexico/DEF/SIDEF/400x400/sanfer_leunase_solinyect_cajafcoampula.png',
            'descripcion' => 'Medicamento para tratar el SARS-CoV-2 (COVID-19)',
            'precioU'=> 7000,
            'precioV'=> 10000,
            'cantidadP'=> 58
        ]);
        Producto::create([
            'titulo'=> 'Aclasta 5mg/100ml',
            'foto' => 'https://www.farmaciasespecializadas.com/ccstore/v1/images/?source=/file/v8950861158894261580/products/19276.png&height=475&width=475',
            'descripcion' => 'Medicamento para la osteoporosis',
            'precioU'=> 800,
            'precioV'=> 1800,
            'cantidadP'=> 35
        ]);
        Producto::create([
            'titulo'=> 'Tempra 500 mg',
            'foto' => 'https://farmaciamexicanabuenasalud.farm/wp-content/uploads/2018/01/Fsp275Wx275H_42060014.png',
            'descripcion' => 'Medicamento para el dolor de cuerpo',
            'precioU'=> 11747,
            'precioV'=> 9800,
            'cantidadP'=> 6
        ]);
        Producto::create([
            'titulo'=> 'RoActemra 200mg',
            'foto' => 'https://www.farmaciasespecializadas.com/ccstore/v1/images/?source=/file/v9201874867925644490/products/21444.png&height=475&width=475',
            'descripcion' => 'Medicamento para el tratamiento de reumas ',
            'precioU'=> 4500,
            'precioV'=> 9918,
            'cantidadP'=> 5
        ]);
        Producto::create([
            'titulo'=> 'Alfa-Dornasa 2.5mg/2.5ml c/6 amp. Pulmozyme',
            'foto' => 'https://www.farmaciasespecializadas.com/ccstore/v1/images/?source=/file/v6479824702638911335/products/10066.png&height=475&width=475',
            'descripcion' => 'Medicamento anti-convulsivo',
            'precioU'=> 7625,
            'precioV'=> 5800,
            'cantidadP'=> 2
        ]);
    }
}