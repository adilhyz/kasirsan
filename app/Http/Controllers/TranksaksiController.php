<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tranksaksi;
use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class TranksaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.tranksaksi', [
            'tranksaksi'=> Tranksaksi::with('produk')->latest()->get(),
            // 'produkambil'=>Produk::with('tranksaksi')->latest()->get(),
            'produkambil'=>Produk::class,
            // 'jmlorderan' => Tranksaksi::orderBy('created_at')->pluck('iddetail')
            'jmlorderproduk'=> Produk::withCount('tranksaksi')->get(),
            'totalpesanan'=> Tranksaksi::sum('jumlahproduk')
            // 'jmlorderan' => Tranksaksi::join('produk', 'transaksi.idproduk', '=', 'produk.idproduk')
            //     ->orderBy('transaksi.created_at')
            //     ->pluck('produk.namaproduk', 'transaksi.jumlahproduk')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tranksaksi $tranksaksi, Produk $produk, Pelanggan $pelanggan)
    {
        // $produk = Produk::where('idproduk');
        return view('dashboard.tranksaksi.create', [
            'tranksaksi'=> Tranksaksi::with('pelanggan')->latest()->get(),
            'produk'=> $produk,
            'pelanggan'=> $pelanggan,
            // 'ismember'=> Pelanggan::distinct()->get('ismember')->pluck('ismember'),
            'pelangganambil'=>Pelanggan::with('tranksaksi')->latest()->get(),
            'produkambil'=>Produk::with('tranksaksi')->latest()->get(),
            'plusnya' => session('plusnya'),
            // 'jmluorderan' => $tranksaksi->orderBy('created_at')->pluck('iddetail'),
            'jmluorderan' => $tranksaksi->orderBy('created_at')->pluck('iddetail'),
            // $produk->distinct()->get(['level'])->pluck('level')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Produk $produk, Penjualan $penjualan, Tranksaksi $tranksaksi)
    {
        $validasi = $request->validate([
            'idproduk'=>'required',
            'idpelanggan'=>'required',
            'jumlahproduk'=>'required',
            'subtotal'=>'regex:/^\d+(\.\d{2})?$/'
        ]);
        //-- $penjualan = Penjualan::find($validasi['idpenjualan']);
        // $penjualan->tanggalpenjualan = now();
        // $penjualan->save();

        // $stok = intval($produk->stok);
        // $tranksaksi = Tranksaksi::with('produk')->find($validasi['idproduk']);
        // $stok = intval($tranksaksi->produk->stok);
        $produk = Produk::find($validasi['idproduk']);
        $pelanggan = Pelanggan::find($validasi['idpelanggan']);
        if (!$pelanggan) {
            return redirect()->back()->with('error', 'GAK ADA PELANGGAN');
        } 
        $idpenjualan = $penjualan->idpenjualan;
        $penjualan = Penjualan::with('tranksaksi')->find($idpenjualan);
        // $penjualan = Penjualan::firstOrNew(['idpenjualan'], $tranksaksi->idpenjualan);
        if ($validasi['jumlahproduk'] === 0) {
            return redirect()->back()->with('errornol', 'RRRugi doong..');
        } elseif (intval($produk->stok) == 0) {
            return redirect()->back()->with('errorstok', 'Stok Habis');
        } elseif ($validasi['jumlahproduk'] > intval($produk->stok)) {
            return redirect()->back()->with('error', 'Jumlah Produk terlalu banyak dari Stok.');
        } else {
            // $validasi['subtotal'] = $produk->harga * $validasi['jumlahproduk'] !==0 asal bukan nol + $plusnya;
            $plusnya = $pelanggan->ismember=='1' ? -500 : 500 ;
            session(['plusnya' => $plusnya]);
            if ($validasi['jumlahproduk'] > 0) {
                // $penjualan->tanggalpenjualan = now();
                // $penjualan->save();
                $validasi['subtotal'] = $produk->harga * $validasi['jumlahproduk'];
                // $validasi['subtotal'] = $produk->ismember ? $validasi['subtotal'] - $plusnya : $validasi['subtotal'] + $plusnya ;
                if ($produk->ismember) {
                    // Jika pelanggan adalah anggota, kurangi nilai $plusnya dari subtotal
                    $validasi['subtotal'] -= $plusnya;
                } else {
                    // Jika pelanggan bukan anggota, tambahkan nilai $plusnya ke subtotal
                    $validasi['subtotal'] += $plusnya;
                }
                
                // Menyimpan nilai plusnya ke dalam kolom isdiskon pada model pelanggan
                $pelanggan->isdiskon = $plusnya;
                $pelanggan->save();
                // 
                if (intval($penjualan)) {
                    if (isset($validasi['idpenjualan'])) {
                        $penjualan->tanggalpenjualan = now();
                        $penjualan->idpelanggan = $validasi['idpelanggan']; 
                        $penjualan->totalharga = $validasi['subtotal'];
                        // $penjualan->subtotal = $validasi['subtotal'];
                        $penjualan->save();
                        return redirect()->back()->with('success', 'Penjualan telah diperbarui.');
                    } else {
                            return redirect()->back()->with('error', 'Objek Penjualan tidak ditemukan.');
                    }
                }
            } else {
                return redirect()->back()->with('errornol', 'RRRugi doong..');
            }
        }
        
        
        // $hargaProduk = $produk->harga;
        // $stokProduk = $produk->stok;
        // $subtotal = $hargaProduk * $jumlahProduk;
        // $jumlahProduk = $validasi['jumlahproduk'];
        // $validasi['subtotal'] = $subtotal;
        // $detailpenjualan = hitung si tambahan untung nya gimana?
        Tranksaksi::create($validasi,);
        return redirect('/dashboard/tranksaksi')->with('success', 'Tranksaksi telah dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tranksaksi $tranksaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tranksaksi $tranksaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tranksaksi $tranksaksi)
    {
        //
    }

    /**\
     * Remove the specified resource from storage.
     */
    public function destroy(Tranksaksi $tranksaksi, Pelanggan $pelanggan)
    {
        Tranksaksi::where('idpelanggan', $pelanggan->idpelanggan)->update(['idpelanggan' => null]);
        Tranksaksi::destroy($tranksaksi->iddetail);
        return redirect('/dashboard/tranksaksi')->with('success', 'Tranksaksi telah dihapus!');
    }
}
