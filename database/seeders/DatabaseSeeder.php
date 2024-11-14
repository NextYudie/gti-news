<?php

namespace Database\Seeders;

use App\Models\Noticia;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Victor',
            'email' => 'victor@victor.com',
            'password' => Hash::make('123'),
        ]);
        User::factory(10)->create();
        Noticia::factory(100)->create();
        }
    }