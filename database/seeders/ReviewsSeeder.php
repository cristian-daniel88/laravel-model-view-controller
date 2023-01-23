<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'user_id' => 1,
            'book_id' => 1,
            'review' => 'opinion',
            'rating' => 2.5,
            'created_at' => date("Y-m-d H:i:s")
           
        ]);

        DB::table('reviews')->insert([
            'user_id' => 2,
            'book_id' => 1,
            'review' => 'opinion',
            'rating' => 2.5,
            'created_at' => date("Y-m-d H:i:s")
           
        ]);
    }
}
