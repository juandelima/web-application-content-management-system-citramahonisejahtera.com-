<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function(Blueprint $table) {
            $table->increments('id_project');
            $table->string('nama_project');
            $table->string('featured_image');
            $table->text('deskripsi');
            $table->integer('kategori_id')->unsigned();
            $table->foreign('kategori_id')->references('id_kategori')->on('kategori_project')->onDelete('cascade');
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
