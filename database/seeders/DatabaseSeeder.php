<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'name' => "Master Admin",
            'email' => "Master@defender.com",
            'password' => Hash::make("12345678"),
            'type' => 0,
            'org_id' =>0
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
