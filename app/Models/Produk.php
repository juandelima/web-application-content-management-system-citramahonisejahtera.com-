<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable = [
    	'nama_produk','featured_image','deskripsi','kategori_produk_id','slug'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    public function simpan($kategori_produk, $thumbnail_produk, $nama_produk, $deskripsi, $slug) {
    	DB::table($this->table)->insert([
            'kategori_produk_id' => $kategori_produk,
            'nama_produk' => $nama_produk,
            'featured_image' => $thumbnail_produk,
            'deskripsi' => $deskripsi,
            'slug' => $slug,
        ]);
    }

    public function loop_gambar($img) {
        $produk = Produk::get()->last();
    	SubprodukImg::create([
            'sub_img' => $img,
            'produk_id' => $produk->id_produk,
        ]);
    }

    public function ubah_data($kategori_produk, $thumbnail_produk, $nama_produk, $deskripsi, $slug, $id) {
        DB::table($this->table)->where($this->primaryKey, $id)->update([
            'kategori_produk_id' => $kategori_produk,
            'nama_produk' => $nama_produk,
            'featured_image' => $thumbnail_produk,
            'deskripsi' => $deskripsi,
            'slug' => $slug,
        ]);
    }

    public function update_gambar($nama_gambar, $id) {
        SubprodukImg::create([
            'sub_img' => $nama_gambar,
            'produk_id' => $id,
        ]);
    }

    public function hapus_data($id) {
        Produk::where($this->primaryKey, $id)->delete();
        SubprodukImg::where('produk_id', $id)->delete();
    }

    public function gambar() {
        return $this->hasMany('App\Models\SubprodukImg');
    }

    public function kategori() {
        return $this->belongsTo('App\Models\KategoriProduk', 'kategori_produk_id');
    }
}
