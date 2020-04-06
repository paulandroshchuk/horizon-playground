<?php

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
        foreach (range(0, 10000) as $item) {
            \App\User::create([
                'name' => 'John',
                'email' => \Illuminate\Support\Str::random(50),
                'password' => 'yo',
            ]);
        }

        foreach (range(0, 10000) as $item) {
            \App\Models\Number::create();
            \App\Models\Recipient::create();
        }

        foreach (range(0, 10000) as $item) {
            \App\Models\Schedule::create();
        }
    }
}
