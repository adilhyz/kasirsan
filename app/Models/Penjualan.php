<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory; //kade sluggable
    protected $table = 'penjualan'; //Mimitina eloquent tabel namanya jamak
    protected $primaryKey = 'idpenjualan';

    protected $guarded = [];
    
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
    public function tranksaksi()
    {
        return $this->belongsTo(Tranksaksi::class, 'iddetail');
    }
}
