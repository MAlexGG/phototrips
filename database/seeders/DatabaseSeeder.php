<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory()->create([
            'name' => 'Alex',
            'email'=> 'mail@mail.com',
            'isAdmin' => true
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@mail.com',
            'isAdmin' => false
        ]);
        Photo::factory(2)->create([
            'continent' => 'Asia',
        ]);
        Photo::factory(2)->create([
            'continent' => 'America',
        ]);
        Photo::factory(2)->create([
            'continent' => 'Europe',
            'country' => 'Spain',
        ]);
        Photo::factory(2)->create([
            'continent' => 'Europa',
            'country' => 'Netherlands',
        ]);
        Photo::factory(2)->create([
            'continent' => 'Oceania',
        ]);
        Photo::factory(2)->create([
            'continent' => 'Africa',
        ]);
    }
}
