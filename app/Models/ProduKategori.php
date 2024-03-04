<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProduKategori extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'kategori'; //Mimitina eloquent tabel namanya jamak
    protected $primaryKey = 'idkategori';

    protected $guarded = ['idkategori'];

    public function getRouteKeyname()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'namakategori'
            ]
        ];
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'idproduk');
    }
}
