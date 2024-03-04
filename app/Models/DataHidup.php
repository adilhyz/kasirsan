<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class DataHidup
// extends Model
{
    use HasFactory;
    
    public static function getCuy($getjudul) 
    {
        $welkom = "Selamat Datang";
        $about = "Tentang";
        $anjay = "Aplikasi Kasir-San";
        $data = [
            "judul" => "",
            "user" => User::latest()->get(),
            "level" => User::distinct()->get(['level'])->pluck('level'),
            // "level" => User::where('level')->get(),
            "nama" => "adilhyz",
            "namalengkap" => "Sandy Adilhayyi",
            "kelas" => "XII RPL 1",
            "anjay" => $anjay,
            "deskripsi" => $anjay . " yang dibuat dengan Bahasa PHP dan menggunakan laravel 10 sebagai framework.",
            "welkom" => $welkom,
            "ucapan" => $welkom . " di " . $anjay,
            "tentang" => $about . " " . $anjay,
            "logo" => "kasira.png",
            "relasi" => "kasircuy.png",
            "php" => "php.svg",
            "larapel" => "laravel.svg",
            "gh" => "ghcuyyyy.png",
            "dkursor" => "duniaaa.png",
            "deskripsihome" => "<p class='text-danger'>Mulai Bisnis Bersama Kasirsan.</p><p>Jalankan bisnis secara wadidaw dengan Aplikasi Kasirsan.</p>",
            "tahun" => Carbon::now()->year,
        ];

        switch ($getjudul){
            case 'home':
                $data["judul"] = "Home";
                break;
            case 'login':
                $data["judul"] = "Login";
                break;
            case 'profile':
                $data["judul"] = "Profile";
                break;
            case 'register':
                $data["judul"] = "Register";
                break;
            case 'dashboard':
                $data["judul"] = "Dashboard";
                break;
            case 'about':
                $data["judul"] = "About";
                break;
            default:
                $data["judul"] = "Bawaan";
            break;
        }
        return $data;
    }
    public static function getbatereCuy()
    {
        //status baterai
        $batteryStatus = shell_exec('acpi -b');
        //menjadi baris
        $batteryLines = explode("\n", $batteryStatus);
        //status dari baris pertama
        $statusLine = trim($batteryLines[0]);
        //pisahkan status dan persentase
        preg_match('/(\w+), (\d+)%/', $statusLine, $matches);
        $battery = [
            'status' => isset($matches[1]) ? $matches[1] : null,
            'percentage' => isset($matches[2]) ? $matches[2] : null,
        ];
        return $battery;
    }    
};
