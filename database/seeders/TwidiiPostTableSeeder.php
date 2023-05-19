<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TwidiiPost;

class TwidiiPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $twiidiPosts= [
            ['id'=>1, 'user_id'=>1,'post'=>'welocome to twiidii' ,'status'=>1
         ],
        
        ];

        TwidiiPost::insert($twiidiPosts); 
    }
}
