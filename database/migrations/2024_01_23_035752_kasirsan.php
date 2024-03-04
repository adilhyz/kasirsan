<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
public function up()
    {
        // Tabel pelanggan
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('idpelanggan');
            $table->string('namapelanggan')->nullable();
            $table->string('slug')->unique();
            $table->text('alamat');
            $table->string('nomortelepon')->nullable();
            $table->integer('isdiskon')->nullable();
            $table->boolean('ismember')->default(0)->nullable();
            // $table->enum('role', ['Member', 'Bukan Member'])->nullable();
            $table->timestamps();
        });

        // Tabel penjualan
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id('idpenjualan');
            $table->date('tanggalpenjualan')->nullable();
            $table->decimal('totalharga', 10, 2)->nullable();
            $table->unsignedBigInteger('idpelanggan')->nullable();
            $table->timestamps();
            // -- //
            $table->foreign('idpelanggan')->references('idpelanggan')->on('pelanggan');
        });

        // Tabel produk
        Schema::create('produk', function (Blueprint $table) {
            $table->id('idproduk');
            $table->unsignedBigInteger('iduser')->nullable();
            $table->unsignedBigInteger('idkategori')->nullable();
            $table->string('namaproduk')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->decimal('harga', 10, 2)->nullable();
            $table->integer('stok')->nullable();
            $table->timestamps();
        });
        Schema::create('kategori', function (Blueprint $table) {
            $table->id('idkategori');
            // $table->unsignedBigInteger('idproduk')->nullable();
            $table->unsignedBigInteger('iduser')->nullable();
            $table->string('namakategori')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->timestamps();
            // -- //
            // $table->foreign('idproduk')->references('idproduk')->on('produk');
            $table->foreign('iduser')->references('iduser')->on('users');
        });
        Schema::table('produk', function (Blueprint $table) {
            $table->foreign('iduser')->references('iduser')->on('users');
            $table->foreign('idkategori')->references('idkategori')->on('kategori');
        });
        // Tabel detailpenjualan
        Schema::create('detailpenjualan', function (Blueprint $table) {
            $table->id('iddetail');
            $table->unsignedBigInteger('idpelanggan')->nullable();
            $table->unsignedBigInteger('idpenjualan')->nullable();
            $table->unsignedBigInteger('idproduk')->nullable();
            $table->unsignedBigInteger('jumlahproduk')->unsigned();
            $table->decimal('subtotal', 10, 2)->nullable();
            $table->timestamps();
            // -- //
            $table->foreign('idpelanggan')->references('idpelanggan')->on('pelanggan')->onDelete('cascade');
            $table->foreign('idpenjualan')->references('idpenjualan')->on('penjualan')->onDelete('cascade');
            $table->foreign('idproduk')->references('idproduk')->on('produk')->onDelete('cascade');
        });
        // Schema::create('guru', function (Blueprint $table) {
        //     $table->id('idguru');
        //     $table->string('nama');
        //     $table->string('usia');
        //     $table->decimal('subtotal', 10, 2)->nullable();
        // });
        DB::unprepared('CREATE TRIGGER stok_penjualan AFTER INSERT ON detailpenjualan
            FOR EACH ROW
            BEGIN
                UPDATE produk
                SET stok = stok - NEW.jumlahproduk
                WHERE idproduk = NEW.idproduk;
        END');
        DB::unprepared('CREATE TRIGGER update_stok AFTER UPDATE ON detailpenjualan
            FOR EACH ROW
            BEGIN
            DECLARE perubahan_stok INT;

            SET perubahan_stok  = NEW.jumlahproduk - OLD.jumlahproduk;
            UPDATE produk
            SET stok = stok - perubahan_stok
            WHERE idproduk = NEW.idproduk;
        END'
        );
        DB::unprepared('CREATE TRIGGER hapus_penjualan AFTER DELETE ON detailpenjualan
            FOR EACH ROW
            BEGIN
                UPDATE produk
                SET stok = stok + OLD.jumlahproduk
                WHERE idproduk = OLD.idproduk;
        END'
        );
    }

    public function down()
    {
        Schema::dropIfExists('pelanggan');
        Schema::dropIfExists('produk');
        Schema::dropIfExists('penjualan');
        Schema::dropIfExists('detailpenjualan');
        DB::unprepared('DROP TRIGGER stok_produk');
        DB::unprepared('DROP TRIGGER update_produk');
        DB::unprepared('DROP TRIGGER hapus_produk');
        // Schema::dropIfExists('users');
    }
};
