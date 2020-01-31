<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'email' => 'mcd77.1990@gmail.com',
            'password' => md5('123'),
        ]);


         DB::table('zonas')->insert([
            'descripcion' => 'ZONA NORTE',
        ]);

         DB::table('zonas')->insert([
            'descripcion' => 'ZONA SUR',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => 'JqZXJPbT2x8',
            'titulo' => '«VIVIR SIN ALQUILAR» – RICHARD BARRIO PARQUE ASTOLFI',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => 'Ni8l_F923f0',
            'titulo' => '«PAGAR EN CUOTAS ME PERMITIÓ TENER MI TERRENO» – DIONISIO VECINO DE B. PQUE ASTOLFI',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => 'DDSb4SwzqFo',
            'titulo' => 'PROPIETARIOS DE ASTOLFI NOS CUENTA SU HISTORIA',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => 'lZ8McUqbPZM',
            'titulo' => 'VECINOS DE ASTOLFI: «LAS CUOTAS MÍNIMAS»',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => '9g-YQJqZaJ4',
            'titulo' => 'LA FACILIDAD DE COMPRAR TU TERRENO EN CUOTAS – LEONARDO PROPIETARIO DE BARRIO PARQUE MATHEU',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => '7LV0Xo6a3VI',
            'titulo' => 'TENER TU CASA ES TODO – EMANUEL, PROPIETARIO DE BARRIO PARQUE MATHEU',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => 'Rf5lzgV8lCA',
            'titulo' => 'VECINAS DEL BARRIO RINCÓN DE IRIZAR – ENCONTRAR TU LUGAR',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => '8JfRaagA1Hg',
            'titulo' => 'TERRENOS EN EZEIZA – UNA NUEVA OPORTUNIDAD',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => '7LV0Xo6a3VI',
            'titulo' => '«TENER TU CASA ES TODO» – EMANUEL B. PQUE MATHEU',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => '0JdjVGom1AI',
            'titulo' => '«EL PASO MÁS GRANDE QUE DIMOS HASTA AHORA» – CARO Y JOAQUI RINCÓN DE IRIZAR',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => '9g-YQJqZaJ4',
            'titulo' => '«SUPERAR LA ETAPA DE ALQUILER» – LEONARDO LACO B. PQUE MATHEU',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => 'Rf5lzgV8lCA',
            'titulo' => 'ENCONTRAR MUCHO MÁS QUE UN TERRENO – ADRIANA Y NORMA RINCÓN DE IRIZAR',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => '8JfRaagA1Hg',
            'titulo' => 'TERRENOS EN EZEIZA – BARRIO PARQUE LA ESPERANZA',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => 'xGCQ9DI_IkM',
            'titulo' => 'LLEGAR AL TERRENO PROPIO: 1500 SUEÑOS CUMPLIDOS',
        ]);




         DB::table('testimonios')->insert([
            'link_youtube' => 'wSpX8ePQ0Jg',
            'titulo' => 'Barrio Parque Los Robles - Testimonio Marcela y Ariel',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => 'o8epUj4R9No',
            'titulo' => 'Barrio Parque Derqui - Testimonio Alejandro',
        ]);


         DB::table('testimonios')->insert([
            'link_youtube' => '4gSPgbR_L7k',
            'titulo' => 'Barrio Parque Sakura III - Testimonio Maria y Marcelo',
        ]);
    }
}
