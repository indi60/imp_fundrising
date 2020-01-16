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
        $this->call([
            UsersTableSeeder::class,
            ProvinsiTableSeeder::class,
            KabupatenTableSeeder::class,
            KecamatanTableSeeder::class,
            KategoriProjectTableSeeder::class,
            BankTableSeeder::class,
            ]);
        
    }
}
