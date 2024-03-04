<?php

namespace App\Http\Controllers;

use App\Models\ProduKategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProduKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.produkategori', [
            'kategori'=> ProduKategori::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ProduKategori $kategori)
    {
        $this->authorize('Admin');
        return view('dashboard.kategori.create', [
            'kategori'=> $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'namakategori' => 'required|max:255',
            'slug' => 'unique:kategori',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')) {
            $validasi['image'] = $request->file('image')->store('kategori-gambar');
        }
        $validasi['iduser'] = auth()->user()->iduser;
        $validasi['slug'] = SlugService::createSlug(ProduKategori::class, 'slug', $request->namakategori);
        
        // Simpan produk
        ProduKategori::create($validasi);
    
        return redirect('/dashboard/kategori')->with('success', 'Produk telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProduKategori $kategori, Produk $produk)
    {
        return view('dashboard.kategori.show', [
            'kategori' => $kategori,
            'produkambil' => Produk::where('idkategori', $kategori->idkategori)->get(),
            'kategorias' => ProduKategori::where('idkategori', $produk->iduser)->get(),
            'kategoriambil'=> Produk::with('kategori')->latest()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProduKategori $kategori)
    {
        return view('dashboard.kategori.edit', [
            'kategori'=> $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProduKategori $kategori)
    {
        $rules = [
            'namakategori' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ];
        if($request->slug != $kategori->slug){
            $rules['slug'] = 'unique:kategori';
        }

        if (!$kategori) {
            return redirect('/dashboard/kategori')->with('error', 'Kategori tidak ditemukan.');
        }

        $validasi = $request->validate($rules);
        
        if($request->file('image')) {
            if($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }
            $validasi['image'] = $request->file('image')->store('kategori-gambar');
        }
        $validasi['slug'] = SlugService::createSlug($kategori, 'slug', $request->namakategori);
        $validasi['iduser'] = auth()->user()->iduser;
    
        // Simpan Kategori
        ProduKategori::where('idkategori', $kategori->idkategori)->update($validasi);
    
        return redirect('/dashboard/kategori')->with('success', 'Kategori telah di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProduKategori $kategori)
    {
        if($kategori->image) {
            Storage::delete($kategori->image);
        }

        $produk = Produk::where('idkategori', $kategori->idkategori)->get();
        foreach ($produk as $produkz) {
            $produkz->idkategori = null;
            $produkz->save();
        }
        ProduKategori::destroy($kategori->idkategori);
        return redirect('/dashboard/kategori')->with('success', 'Kategori telah dihapus!');
    }

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
}
