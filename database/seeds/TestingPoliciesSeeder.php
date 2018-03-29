<?php

use Illuminate\Database\Seeder;

class TestingPoliciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('policies')->insert([
            'policy' => 'FullFalse',
            'section_id' => '1'
        ]);

        DB::table('policies')->insert([
            'policy' => 'indexProduct',
            'section_id' => '3'
        ]);
        DB::table('policies')->insert([
            'policy' => 'createProduct',
            'section_id' => '3'
        ]);
        DB::table('policies')->insert([
            'policy' => 'updateProduct',
            'section_id' => '3'
        ]);
        DB::table('policies')->insert([
            'policy' => 'readProduct',
            'section_id' => '3'
        ]);
        DB::table('policies')->insert([
            'policy' => 'deleteProduct',
            'section_id' => '3'
        ]);

    }
}
