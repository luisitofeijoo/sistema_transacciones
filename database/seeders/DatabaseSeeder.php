<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Grupo;
use App\Models\Persona;
use App\Models\TipoPersona;
use App\Models\Ubicacion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'nombres' => 'Coar',
            'apellidos' => 'Arequipa',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('sistemas@111035'),
        ]);

        User::factory()->create([
            'nombres' => 'Editor',
            'apellidos' => 'Editor',
            'email' => 'editor@gmail.com',
            'username' => 'editor',
            'password' => Hash::make('sistemas@111035'),
        ]);

        Ubicacion::create(['nombre' => 'TERCER GRADO A']);
        Ubicacion::create(['nombre' => 'TERCER GRADO B']);
        Ubicacion::create(['nombre' => 'TERCER GRADO C']);
        Ubicacion::create(['nombre' => 'TERCER GRADO D']);
        Ubicacion::create(['nombre' => 'CUARTO GRADO A']);
        Ubicacion::create(['nombre' => 'CUARTO GRADO B']);
        Ubicacion::create(['nombre' => 'CUARTO GRADO C']);
        Ubicacion::create(['nombre' => 'CUARTO GRADO D']);
        Ubicacion::create(['nombre' => 'QUINTO GRADO A']);
        Ubicacion::create(['nombre' => 'QUINTO GRADO B']);
        Ubicacion::create(['nombre' => 'QUINTO GRADO C']);
        Ubicacion::create(['nombre' => 'QUINTO GRADO D']);
        Ubicacion::create(['nombre' => 'CENTRO DE COMUNICACIONES']);
        Ubicacion::create(['nombre' => 'DIRECCIÓN GENERAL']);
        Ubicacion::create(['nombre' => 'DIRECCIÓN ACADÉMICA']);
        Ubicacion::create(['nombre' => 'BIBLIOTECA']);
        Ubicacion::create(['nombre' => 'LABORATORIO FISICA']);
        Ubicacion::create(['nombre' => 'LABORATORIO QUIMICA']);
        Ubicacion::create(['nombre' => 'EDUCACIÓN FISICA']);
        Ubicacion::create(['nombre' => 'BYDE']);

        Grupo::insert([
            ['descripcion' => 'LAPTOPS'],
            ['descripcion' => 'AURICULARES'],
            ['descripcion' => 'USB'],
            ['descripcion' => 'CALCULADORAS']
        ]);



        $this->call([
            PermissionsSeeder::class,
            TipoDocumentoSeeder::class,
            //TipoPersona::class,
            PersonaSeeder::class,
            BienesSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();


    }
}
