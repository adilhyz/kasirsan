<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProduKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Produk::where('iduser', auth()->user()->iduser)->get();
        // $namaproduk = Produk::where('namaproduk')->get();
        return view('dashboard.produk', [
            // 'produk' => Produk::where('iduser', auth()->user()->iduser)->get()
            'produk' => Produk::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Produk $produk)
    {
        // $this->middleware('admincuy');
        $this->authorize('Admin');
        return view('dashboard.produk.create', [
            'produk' => $produk,
            'kategoriambil'=>ProduKategori::with('produk')->latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validasi = $request->validate([
            'namaproduk' => 'required|max:255',
            'idkategori' => 'required',
            // 'slug' => 'unique:produk',
            'harga' => 'required|regex:/^\d+(\.\d{2})?$/',
            'stok' => 'required',
            'image' => 'image|file|max:1024'
        ]);
    
        if($request->file('image')) {
            $validasi['image'] = $request->file('image')->store('kategori-gambar');
        }
        $validasi['iduser'] = auth()->user()->iduser;
        $validasi['slug'] = SlugService::createSlug(Produk::class, 'slug', $request->namaproduk);
    
        // Simpan produk
        Produk::create($validasi);
    
        return redirect('/dashboard/produk')->with('success', 'Produk telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return view('dashboard.produk.show', [
            'produk' => $produk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('dashboard.produk.edit', [
            'produk' => $produk,
            'kategoriambil'=>ProduKategori::with('produk')->latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $rules = [
            'namaproduk' => 'required|max:255',
            'idkategori' => 'required',
            'harga' => 'required|regex:/^\d+(\.\d{2})?$/',
            'stok' => 'required',
            'image' => 'image|file|max:1024'
        ];
        if($request->slug != $produk->slug){
            $rules['slug'] = 'unique:produk';
        }
        
        $validasi = $request->validate($rules);
        
        if($request->file('image')) {
            if($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }
            $validasi['image'] = $request->file('image')->store('produk-gambar');
        }
        $validasi['slug'] = SlugService::createSlug($produk, 'slug', $request->namaproduk);
        $validasi['iduser'] = auth()->user()->iduser;
    
        // Simpan produk
        Produk::where('idproduk', $produk->idproduk)->update($validasi);
    
        return redirect('/dashboard/produk')->with('success', 'Produk telah di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        if($produk->image) {
            Storage::delete($produk->image);
        }
        Produk::destroy($produk->idproduk);
        return redirect('/dashboard/produk')->with('success', 'Produk telah dihapus!');
    }
    public function getRouteKeyname()
    {
        // $namaproduk = Produk::where('iduser', auth()->user()->iduser)->get();
        // return $namaproduk;
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
}
