<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstrumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instruments')->insert([
            'name' => 'guitar',
        ]);

        DB::table('instruments')->insert([
            'name' => 'piano',
        ]);

        DB::table('instruments')->insert([
            'name' => 'trumpet',
        ]);

        DB::table('instruments')->insert([
            'name' => 'orquest',
        ]);

        DB::table('instruments')->insert([
            'name' => 'big band jazz',
        ]);
    }
}
