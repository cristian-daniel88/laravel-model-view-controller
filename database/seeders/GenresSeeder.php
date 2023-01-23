<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name' => 'Tango',
        ]);

        DB::table('genres')->insert([
            'name' => 'Argentine Folklore',
        ]);

        DB::table('genres')->insert([
            'name' => 'Classical',
        ]);

        DB::table('genres')->insert([
            'name' => 'Jazz',
        ]);

        DB::table('genres')->insert([
            'name' => 'Bossa Nova',
        ]);

        DB::table('genres')->insert([
            'name' => 'Latin American Music',
        ]);

        DB::table('genres')->insert([
            'name' => 'Flamenco',
        ]);
    }
}
