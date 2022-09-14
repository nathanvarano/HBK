<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    protected $movies =
    [
        ['id' => 1, 'name' => 'Top Gun: Maverick'],
        ['id' => 2, 'name' => 'Bullet Train'],
        ['id' => 3, 'name' => 'After Ever Happy'],
        ['id' => 4, 'name' => 'Three Thousand Years of Longing'],
        ['id' => 5, 'name' => 'Elvis'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->upsert($this->movies, ['id']);
    }
}
