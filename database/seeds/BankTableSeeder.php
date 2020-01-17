<?php
use App\RefBank;
use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank= [[
            'nama_bank' =>'Mandiri',
            'nama_rekening'=>'Aryo',
            'no_rekening'=>'120183740123',
        ],
        [
            'nama_bank' =>'BRI',
            'nama_rekening'=>'Bagas',
            'no_rekening'=>'4212124709723',
        ],
        [
            'nama_bank' =>'BNI',
            'nama_rekening'=>'Fauzan',
            'no_rekening'=>'131735163826',
        ],
        [
            'nama_bank' =>'BCA',
            'nama_rekening'=>'Putri',
            'no_rekening'=>'121308153715',
        ],
        
        ];
        RefBank::insert($bank);
    }
}
