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
            'nama_bank' =>'Bank Mandiri',
            'nama_rekening'=>'CV Informatika Media Pratama',
            'no_rekening'=>'054753645453',
        ],
        [
            'nama_bank' =>'Bank BRI',
            'nama_rekening'=>'CV Informatika Media Pratama',
            'no_rekening'=>'0510-01-00040456-2',
        ],
        [
            'nama_bank' =>'Bank BNI',
            'nama_rekening'=>'CV Informatika Media Pratama',
            'no_rekening'=>'7694660057',
        ],
        
        ];
        RefBank::insert($bank);
    }
}
