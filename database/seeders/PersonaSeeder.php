<?php

namespace Database\Seeders;

use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Persona::factory()->count(450)->create();

        //Data alumnos COAR

        $archivo = public_path('estudiantes_2024.csv'); // Ruta al archivo CSV

        if (file_exists($archivo)) {
            $datos = array_map(function($linea) {
                return str_getcsv($linea, ';'); // Especificar punto y coma como delimitador
            }, file($archivo));

            foreach ($datos as $dato) {
                Persona::create([
                    'apellido_paterno' => strtoupper($dato[0]),
                    'apellido_materno' => strtoupper($dato[1]),
                    'nombres' => strtoupper($dato[2]),
                    'sexo' => $dato[3],
                    'nro_documento' => $dato[4],
                    //'fecha_nacimiento' => Carbon::createFromFormat("d/m/Y", $dato[4])->toDateString(),
                ])->estudiantes()->create([
                    'grado' => $dato[5],
                    'seccion' => $dato[6]
                ]);
            }
        }
    }
}
