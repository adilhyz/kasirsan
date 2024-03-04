<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index(Request $request) {
        $validasi = $request->validate([
            // 'ini ngevalidasi otomatis dari'
        ]);
        return view('dashboard.penjualan', [
            'penjualan' => Penjualan::with('tranksaksi')->get()
        ]);
    }
}