<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\DataHidup;
use App\Models\User;

class UserProfileController extends Controller
{
    public function ProfileIndex(User $user)
    {
        $data = DataHidup::getCuy('profile');
        return view('dashboard.profile', [
            'user' => $user,
            'userambil'=>Auth::user(),
            'level' => User::distinct()->get(['level'])->pluck('level')
        ], $data);
    }
    public function profile(Request $request, User $user)
    {
        $rules = [
            'username' => '',
            // 'password' => 'required|max:255',
            'namalengkap' => 'max:255',
            'jk' => 'max:15',
            'tempatlahir' => 'max:255',
            'tanggallahir' => '',
            //
        ];
        // dd($request->all());

        // Jika password diisi, enkripsi password baru
        // if ($request->has('password')) {
        //     $rules['password'] = 'required|max:255';
        //     $rules['passwordbiasa'] = 'max:255';
        //     $rules['passwordlama'] = 'min:6';
        //     // $rules['passwordkonfirmasi'] = 'required';
        // }
        // $validasi = $request->validate($rules);
        // Jika password diisi, enkripsi password baru
        if ($request->has('passwordbiasa')) {
            $rules['password'] = 'max:255';
            $rules['passwordbiasa'] = 'required';
            // $rules['passwordlama'] = '';
            // $passwordLama = $request->input('passwordlama');
            $passwordBiasa = $request->input('passwordbiasa');

            $validasi = $request->validate($rules);
            $validasi['password'] = bcrypt($request->input('passwordbiasa'));
            // $validasi['passwordlama'] = $passwordLama;
            $validasi['passwordbiasa'] = $passwordBiasa;

            User::where('iduser', Auth::id())->update($validasi);
            // return redirect()->route('profile.index')->with('update', 'berhasil di Update');
            if ($request->is('dashboard*')) {
                return redirect()->route('profile.index')->with('update', 'berhasil di Update.');
            } else {
                return redirect()->route('profile.home')->with('update', 'berhasil di Update.');
            }
        } else {
            return redirect()->back()->with('error', 'Password baru tidak boleh kosong.');
        }
        // Jika password diisi, tambahkan aturan validasi untuk memeriksa panjang maksimal
        // if ($request->has('password')) {
        //     $validasi['password'] = bcrypt($validasi['password']);
        //     $validasi['passwordlama'];
        //     $validasi['passwordbiasa'];
        //     $validasi['passwordkonfirmasi'];
        // }
        // if(Hash::check($request->passwordlama  , auth()->user()->password)) {
        //     if(!Hash::check($request->password , auth()->user()->password)) {
        //         $user = User::find(auth()->id());
        //         $user->update([
        //             'password' => bcrypt($request->password)
        //         ]);
        //         session()->flash('message','Password updated successfully!');
        //         return redirect()->back();
        //     }
        dd($request);
    }
}
