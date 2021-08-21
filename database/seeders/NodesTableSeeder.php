<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NodesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('nodes')->delete();
        
        \DB::table('nodes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Organization',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'parent_id' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'School',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'parent_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'School 2',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'parent_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'School 3',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'parent_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Classroom',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'parent_id' => 2,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Classroom',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'parent_id' => 3,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Classroom',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'parent_id' => 4,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Family',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'parent_id' => 5,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Family 2',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'parent_id' => 5,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Node',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'parent_id' => 9,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Node',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'parent_id' => 10,
            ),
        ));
        
        
    }
}