<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['name_categoria' => 'Carnes'],
            ['name_categoria' => 'Granos'],
            ['name_categoria' => 'Lácteos'],
        ]);
    }
}
