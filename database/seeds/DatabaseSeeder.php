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
            KelurahanTableSeeder::class,
            KelurahanTableSeeder2::class,
            KelurahanTableSeeder3::class,
            KelurahanTableSeeder4::class,
            KelurahanTableSeeder5::class,
            KelurahanTableSeeder6::class,
            KelurahanTableSeeder7::class,
            KategoriProjectTableSeeder::class,
            BankTableSeeder::class,
            ]);
        
    }
}
