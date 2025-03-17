<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'gigi',
            'email' => 'gigi19@gmail.com',
            'password' => Hash::make('gigi19'),
        ]);

        // $this->call(ArcticleSeeder::class);

        // $this->call(CommentSeeder::class);


        
    }
}
