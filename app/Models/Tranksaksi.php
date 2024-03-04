<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tranksaksi extends Model
{
    use HasFactory; //kade sluggable
    protected $table = 'detailpenjualan'; //Mimitina eloquent tabel namanya jamak
    protected $primaryKey = 'iddetail';

    protected $guarded = ['iddetail'];
    
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'iduser');
    // }

    // public function getRouteKeyname()
    // {
    //     return 'slug';
    // }

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'namapelanggan'
    //         ]
    //     ];
    // }
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'idproduk');
    }
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'idpenjualan');
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'idpelanggan');
    }
}
