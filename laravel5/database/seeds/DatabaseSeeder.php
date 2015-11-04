<?php

use App\Bird;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        Bird::create([
            'type'  => 'Robin',
            'name'  => 'James',
            'color' => 'Red',
            'age'   => 14,
        ]);
        Bird::create([
            'type'  => 'Thrush',
            'name'  => 'Bill',
            'color' => 'Brown',
            'age'   => 10,
        ]);
        Bird::create([
            'type'  => 'Bluejay',
            'name'  => 'John',
            'color' => 'Blue',
            'age'   => 6,
        ]);

        Model::reguard();
    }
}
