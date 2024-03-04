<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel users
        Schema::create('users', function (Blueprint $table) {
            $table->id('iduser', 15);
            $table->string('namalengkap', 255);
            $table->string('username', 30)->unique();
            $table->string('password');
            $table->string('passwordbiasa')->nullable();
            // $table->string('passwordlama')->nullable();
            // $table->string('passwordkonfirmasi');
            $table->string('jk', 15);
            $table->string('tempatlahir', 255);
            $table->date('tanggallahir');
            $table->integer('nomortelepon')->nullable();
            $table->enum('level', ['Admin', 'Petugas'])->nullable();
            // $table->rememberToken();
            $table->timestamps();

            // $table->foreign('level')->references('level')->on('level');
        });
        // Schema::create('level', function (Blueprint $table) {
        //     $table->id('idlevel', 15);
        //     $table->enum('levels', ['Admin', 'Petugas']);
        //     // $table->rememberToken();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
