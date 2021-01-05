<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_produk')->unique();
            $table->String('uuid_kategori', 32)->nullable(true);
            $table->String('nama_produk', 100)->nullable(true);
            $table->integer('harga_produk',false, true)->length(10);
            $table->text('detail_produk')->nullable(true);
            $table->String('foto_path')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
