<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Tranksaksi;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pelanggan', [
            'pelanggan' => Pelanggan::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pelanggan $pelanggan)
    {
        return view('dashboard.pelanggan.create', [
            'pelanggan' => $pelanggan,
            'ismember' => Pelanggan::distinct()->get('ismember')->pluck('ismember'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $otomatis = $request->validate([
        //     'namapelanggan' => 'max:255',
        //     'alamat' => 'required',
        //     'nomortelepon' => 'required'
        // ]);
        // if ($request->has('namapelanggan')&& $request->namapelanggan != null) {
        //     $pelangganakhir = Pelanggan::orderBy('idpelanggan', 'desc')->first();
        //     $lastSlugNumber = $pelangganakhir ? intval(str_replace('pelanggan-', '', $pelangganakhir->slug)) : 0;
        //     $otomatis['slug'] = 'pelanggan-' . ($lastSlugNumber + 1);
        // } else {
        //     $otomatis['slug'] = SlugService::createSlug(Pelanggan::class, 'slug', $request->namapelanggan);
        // }
        // if($request->file('image')) {
        //     $validasi['image'] = $request->file('image')->store('Pelanggan-gambar');
        // }
        // $validasi['iduser'] = auth()->user()->iduser;
        $validasi = $request->validate([
            'namapelanggan' => 'required|max:255',
            'ismember' => 'required',
            'alamat' => 'required',
            'nomortelepon' => 'required|max:255'
        ]);

        $validasi['slug'] = SlugService::createSlug(Pelanggan::class, 'slug', $request->namapelanggan);
    
        // Simpan Pelanggan
        Pelanggan::create($validasi);
    
        return redirect('/dashboard/pelanggan')->with('success', 'Pelanggan telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        return view('dashboard.pelanggan.show', [
            'pelanggan' => $pelanggan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('dashboard.pelanggan.edit', [
            'pelanggan' => $pelanggan,
            'ismember' => Pelanggan::distinct()->get('ismember')->pluck('ismember')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $rules = [
            'namapelanggan' => 'required|max:255',
            'ismember' => 'required',
            'alamat' => 'required',
            'nomortelepon' => 'required|max:255'
        ];
        if($request->slug != $pelanggan->slug){
            $rules['slug'] = 'unique:pelanggan';
        }
        
        $validasi = $request->validate($rules);
        
        // if($request->file('image')) {
        //     if($request->gambarLama) {
        //         Storage::delete($request->gambarLama);
        //     }
        //     $validasi['image'] = $request->file('image')->store('pelanggan-gambar');
        // }
        // $validasi['iduser'] = auth()->user()->iduser;
        $validasi['slug'] = SlugService::createSlug($pelanggan, 'slug', $request->namapelanggan);
    
        // Simpan pelanggan
        Pelanggan::where('idpelanggan', $pelanggan->idpelanggan)->update($validasi);
    
        return redirect('/dashboard/pelanggan')->with('success', 'Pelangggan telah di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $tranksaksi = Tranksaksi::where('idpelanggan', $pelanggan->idpelanggan)->get();
        foreach ($tranksaksi as $tranksaksiz) {
            $tranksaksiz->idpelanggan = null;
            $tranksaksiz->save();
        }
        $penjualan = Penjualan::where('idpelanggan', $pelanggan->idpelanggan)->get();
        foreach ($penjualan as $penjualanz) {
            $penjualanz->idpelanggan = null;
            $penjualanz->save();
        }
        // Pelanggan::destroy($pelanggan->idpelanggan);
        Pelanggan::destroy($pelanggan->idpelanggan);

        // $pelanggan->delete();
        return redirect('/dashboard/pelanggan')->with('success', 'Pelanggan telah dihapus!');
    }
    public function getRouteKeyname()
    {
        // $namapelanggan = pelanggan::where('iduser', auth()->user()->iduser)->get();
        // return $namapelanggan;
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
}