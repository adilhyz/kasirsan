<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\ProduKategori;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Tranksaksi;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(User $user ,Produk $produk, Pelanggan $pelanggan, ProduKategori $kategori, Tranksaksi $tranksaksi){
        return view('dashboard.index', [
            'user' => $user,
            // 'user'=>Auth::user(),
            'produk' => $produk,
            'kategori'=> $kategori,
            'jmlproduk' => $produk->count('idproduk'),
            'jmlpelanggan' => $pelanggan->count(),
            'jmltranksaksi' => $tranksaksi->count(),
            'jmlkeuntungan' => $tranksaksi->sum('subtotal') + session('plusnya'),
            'jmluser' => $user->where('level', 'Petugas')->count(),
            // 'jmluser' => $user->orderBy('created_at')->pluck('iduser')
        ]);
    }
}
