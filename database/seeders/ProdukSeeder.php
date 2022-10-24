<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = [
        [
            'id'=>'1',
            'produk'=>'Sistem Informasi Rental Mobil',
            'user_id'=>'2',
            'layanan_id'=>'1',
            'url'=> 'https://webdevelopment.com',
            'pedoman' => 'file',
        ],
        [
            'id' => '2',
            'produk' => 'Sistem Informasi Jasa Loundry',
            'user_id' => '2',
            'layanan_id' => '1',
            'url' => 'https://webdevelopment.com',
            'pedoman' => 'file',
        ],

        [
            'id' => '3',
            'produk' => 'Sistem Informasi Penjualan Lahan Tanah',
            'user_id' => '3',
            'layanan_id' => '2',
            'url' => 'https://androiddevelopment.com',
            'pedoman' => 'file',
        ],

        [
            'id' => '4',
            'produk' => 'Sistem Informasi Penyewaan Lapangan Futsal',
            'user_id' => '3',
            'layanan_id' => '2',
            'url' => 'https://androiddevelopment.com',
            'pedoman' => 'file',
        ],

        [
            'id' => '5',
            'produk' => 'Pendirian PT.Hidup Jaya',
            'user_id' => '4',
            'layanan_id' => '6',
            'url' => 'https://pendirianpt.com',
            'pedoman' => 'file',
        ],

        [
            'id' => '6',
            'produk' => 'Pembuatan Desain Rumah',
            'user_id' => '2',
            'layanan_id' => '8',
            'url' => 'https://desaingrafis.com',
            'pedoman' => 'file',
        ],
        
        ];

        Produk::insert($produk);
    }
}
