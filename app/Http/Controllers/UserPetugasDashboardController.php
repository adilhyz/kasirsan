<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserPetugasDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.petugas', [
            'user' => User::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'Hello World!';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.petugas.show', [
            'user'=> $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return 'Hello World!';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->iduser);
        return redirect('/dashboard/petugas')->with('success', 'Petugas telah dihapus!');
    }
    public function getRouteKeyname()
    {
        // $namaproduk = Produk::where('iduser', auth()->user()->iduser)->get();
        // return $namaproduk;
        return 'username';
    }
    public function sluggable(): array
    {
        return [
            'username' => [
                'source' => 'username'
            ]
        ];
    }
}
