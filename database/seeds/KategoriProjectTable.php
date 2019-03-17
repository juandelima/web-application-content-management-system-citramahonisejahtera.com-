<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriProjectTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$nama_produk = ['Office Furniture','Office Interior','Hotel Furniture','Design Interior','Custom Furniture'];
    	for ($i=0; $i < sizeof($nama_produk); $i++) { 
    		DB::table('kategori_project')->insert([
    			'nama_kategori' => $nama_produk[$i],
                'slug' => str_slug($nama_produk[$i], '-'),
        	]);
    	}
    }
}
