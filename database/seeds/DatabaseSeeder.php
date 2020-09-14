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
        // $this->call(UserSeeder::class);
        
         App\User::create([
          'name'   => 'Developer',
          'email'     => 'admin@admin.com',
          'password'  => bcrypt('admin123456'),
          'status' => 1
        ]);
    }
}
