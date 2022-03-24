<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        User::create([
            'name' => 'alessio',
            'email' => 'alessio@alessio.it',
            'password' => Hash::make('password')
        ]);

        User::factory(10)->create();
        Book::factory(10)->create();
    }
}
