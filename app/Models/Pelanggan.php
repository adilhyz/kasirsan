<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Pelanggan extends Model
{
    use HasFactory,Sluggable;
    protected $table = 'pelanggan'; //Mimitina eloquent tabel namanya jamak
    protected $primaryKey = 'idpelanggan';
    protected $guarded = ['idpelanggan'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'iduser');
    // }

    public function getRouteKeyname()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'namapelanggan'
            ]
        ];
    }
    public function tranksaksi()
    {
        return $this->hasMany(Tranksaksi::class, 'iddetail');
    }
}
