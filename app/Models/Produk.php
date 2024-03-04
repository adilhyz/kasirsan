<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Produk extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'produk'; //Mimitina eloquent tabel namanya jamak
    protected $primaryKey = 'idproduk';
    protected $guarded = ['idproduk'];

    public function getRouteKeyname()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'namaproduk'
            ]
        ];
    }
    public function kategori()
    {
        return $this->belongsTo(ProduKategori::class, 'idkategori');
    }
    public function tranksaksi()
    {
        return $this->hasMany(Tranksaksi::class, 'iddetail');
    }
}
