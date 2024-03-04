<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Produk;
use App\Models\ProduKategori;
use App\Models\Pelanggan;
//coy

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username'=> 'adilhyz',
            'namalengkap'=>'Adilhyz Sanrei',
            'password'=> bcrypt('333'),
            'passwordbiasa'=> '333',
            // 'passwordlama'=> '333',
            // 'passwordkonfirmasi'=> '333',
            'jk'=>'laki-laki',
            'tempatlahir'=>'Sumedang',
            'tanggallahir'=>'2005-08-30',
            'level'=>'Admin',
            // 'remember_token'=>'aDiLhYz'
        ]);
        User::create([
            'username'=> 'ayanami',
            'namalengkap'=>'Ayanami Rei',
            'password'=> bcrypt('111'),
            'passwordbiasa'=> '111',
            // 'passwordlama'=> '111',
            // 'passwordkonfirmasi'=> '111',
            'jk'=>'perempuan',
            'tempatlahir'=>'Hokkaido',
            'tanggallahir'=>'2001-03-30',
            'level'=>'Petugas',
            // 'remember_token'=>'aYaNaMi'
        ]);

        //kategoricoy
        ProduKategori::create([
            'namakategori'=>'Aksesoris',
            'slug'=>'aksesoris'
        ]);

        ProduKategori::create([
            'namakategori'=>'Elektronik',
            'slug'=>'elektronik'
        ]);

        ProduKategori::create([
            'namakategori'=>'Pakaian',
            'slug'=>'pakaian'
        ]);

        ProduKategori::create([
            'namakategori'=>'mainan',
            'slug'=>'mainan'
        ]);
        //produkcoy
        Produk::create([
            'namaproduk'=> 'Sepatu',
            'slug'=> 'sepatu',
            'idkategori'=> 3,
            'harga'=> 50000,
            'stok'=> 20,
            'iduser' => 2
        ]);
        Produk::create([
            'namaproduk'=> 'Sepatu Ekin',
            'slug'=> 'sepatu-ekin',
            'idkategori'=> 3,
            'harga'=> 70000,
            'stok'=> 35,
            'iduser' => 2
        ]);
        Produk::create([
            'namaproduk'=> 'Sepatu Ekin Purple',
            'slug'=> 'sepatu-ekin-purple',
            'idkategori'=> 3,
            'harga'=> 70000,
            'stok'=> 50,
            'iduser' => 2
        ]);
        Produk::create([
            'namaproduk'=> 'Baju',
            'slug'=> 'baju',
            'idkategori'=> 3,
            'harga'=> 25000,
            'stok'=> 15,
            'iduser' => 1
        ]);
        Produk::create([
            'namaproduk'=> 'Baju Batik',
            'slug'=> 'baju-batik',
            'idkategori'=> 3,
            'harga'=> 55000,
            'stok'=> 40,
            'iduser' => 1
        ]);
        Produk::create([
            'namaproduk'=> 'Baju Kerah',
            'slug'=> 'baju-kerah',
            'idkategori'=> 3,
            'harga'=> 75000,
            'stok'=> 20,
            'iduser' => 1
        ]);
        Produk::create([
            'namaproduk'=> 'Baju Crem',
            'slug'=> 'baju-crem',
            'idkategori'=> 3,
            'harga'=> 105000,
            'stok'=> 15,
            'iduser' => 1
        ]);
        Produk::create([
            'namaproduk'=> 'Jam',
            'slug'=> 'jam',
            'idkategori'=> 1,
            'harga'=> 15000,
            'stok'=> 10,
            'iduser' => 1
        ]);
        Produk::create([
            'namaproduk'=> 'Mobil Mainan',
            'slug'=> 'mobil-mainan',
            'idkategori'=> 2,
            'harga'=> 10000,
            'stok'=> 30,
            'iduser' => 1
        ]);
        Produk::create([
            'namaproduk'=> 'Robot Elektronik',
            'slug'=> 'robot-elektronik',
            'idkategori'=> 2,
            'harga'=> 10000,
            'stok'=> 20,
            'iduser' => 1
        ]);

        //pelanggancoy
        Pelanggan::create([
            'namapelanggan'=> 'Hatsune Miku',
            'slug'=> 'hatsune-miku',
            'alamat'=> 'Dsn. Cibakekok Rt.04/Rw.02, Kec. Situraja, Kab. Sumedang',
            'nomortelepon'=> '08888888839',
            'ismember'=> 1
        ]);
        Pelanggan::create([
            'namapelanggan'=> 'Asuka Chan',
            'slug'=> 'asuka-chan',
            'alamat'=> 'Hokkaido No 101, Jawa Barat',
            'nomortelepon'=>'089656439588',
            'ismember'=> 0
        ]);
        Pelanggan::factory(3)->create();
        // User::factory(4)->create();
    }
}
