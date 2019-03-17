<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriPTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$nama_produk = ['Sofas','Chairs','Tables','Home Decors'];
    	for ($i=0; $i < sizeof($nama_produk); $i++) { 
    		DB::table('kategori_produk')->insert([
    			'nama_kategori' => $nama_produk[$i],
                'slug' => str_slug($nama_produk[$i], '-'),
        	]);
    	}
    }
}
