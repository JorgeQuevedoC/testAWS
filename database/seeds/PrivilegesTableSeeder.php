<?php

use Illuminate\Database\Seeder;

class PrivilegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privileges')->insert([
            'id' => 1,
            'privilege' => 'director',
        ]);

        DB::table('privileges')->insert([
            'id' => 2,
            'privilege' => 'general manager',
        ]);

        DB::table('privileges')->insert([
            'id' => 3,
            'privilege' => 'fc senior',
        ]);

        DB::table('privileges')->insert([
            'id' => 4,
            'privilege' => 'fc junior',
        ]);

        DB::table('privileges')->insert([
            'id' => 5,
            'privilege' => 'admin senior',
        ]);

        DB::table('privileges')->insert([
            'id' => 6,
            'privilege' => 'admin junior',
        ]);

        DB::table('privileges')->insert([
            'id' => 7,
            'privilege' => 'human resources',
        ]);

        DB::table('privileges')->insert([
            'id' => 8,
            'privilege' => 'membership',
        ]);

        DB::table('privileges')->insert([
            'id' => 9,
            'privilege' => 'customer service senior',
        ]);

        DB::table('privileges')->insert([
            'id' => 10,
            'privilege' => 'customer service junior',
        ]);

        DB::table('privileges')->insert([
            'id' => 11,
            'privilege' => 'trainee',
        ]);

        DB::table('privileges')->insert([
            'id' => 12,
            'privilege' => 'fltplan customer',
        ]);

        DB::table('privileges')->insert([
            'id' => 13,
            'privilege' => 'cst customer pro',
        ]);

        DB::table('privileges')->insert([
            'id' => 14,
            'privilege' => 'cst customer',
        ]);
    }
}
