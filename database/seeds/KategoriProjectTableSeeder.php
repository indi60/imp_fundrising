<?php
use App\MKategoriProject;
use Illuminate\Database\Seeder;

class KategoriProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'kategori_project' => 'Bantuan Medis & Kesehatan',
            ],  
            [
                'kategori_project' => 'Balita & Anak Sakit',
            ],  
            [
                'kategori_project' => 'Kemanusiaan',
            ],  
            [
                'kategori_project' => 'Bencana Alam',
            ],  
            [
                'kategori_project' => 'Rumah Ibadah',
            ],  
            [
                'kategori_project' => 'Kegiatan Sosial',
            ],  
            [
                'kategori_project' => 'Zakat',
            ],  
            [
                'kategori_project' => 'Beasiswa & Pendidikan',
            ],  
            [
                'kategori_project' => 'Sarana Infrastruktur',
            ],  
            [
                'kategori_project' => 'Run For Charity',
            ],  
            [
                'kategori_project' => 'Panti Asuhan',
            ],  
            [
                'kategori_project' => 'Produk & Inovasi',
            ],  
            [
                'kategori_project' => 'Hadiah & Apresiasi',
            ],  
            [
                'kategori_project' => 'Difabel',
            ],  
            [
                'kategori_project' => 'Menolong Hewan',
            ],  
            [
                'kategori_project' => 'Birthday Fundraising',
            ],  
            [
                'kategori_project' => 'Family For Family',
            ],  
            [
                'kategori_project' => 'Karya Kreatif(Film,Buku, dll)',
            ],  
            [
                'kategori_project' => 'Lingkungan',
            ],  
        
        ];
        MKategoriProject::insert($data);
    }
}
