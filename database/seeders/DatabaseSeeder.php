<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            "name" => 'aaron',
            "email" => 'aaron@aaron.com',
            "password" => bcrypt(123456)
        ]);

        //Group::factory(10)->create();

        $this->call([
            GroupSeeder::class
        ]);

        $this->call([
            ArticleSeeder::class
        ]);
    }
}
