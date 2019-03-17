<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function(Blueprint $table) {
            $table->increments('id_produk');
            $table->string('nama_produk');
            $table->string('featured_image');
            $table->text('deskripsi');
            $table->integer('kategori_id')->unsigned();
            $table->foreign('kategori_id')->references('id_kategori')->on('kategori_produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
