<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        $user = User::create([
            'name' => 'alessio',
            'email' => 'alessio@alessio.it',
            'password' => Hash::make('password')
        ]);


        User::factory(10)->create();
        Book::factory(10)->create();

        $users = User::all();
        foreach ($users as $user) {
            for ($i = 0; $i < rand(2, 5); $i++) {
                $user->library()->attach(rand(1, Book::count()), [
                    'add_date' => Carbon::now()->subDays(rand(1, 10)),
                    'completed_readings' => rand(1, 5)
                ]);
            }
        }
    }
}
