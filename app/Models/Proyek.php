<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proyek extends Model {
    protected $table = 'project';
    protected $primaryKey = 'id_project';
    protected $fillable = [
    	'nama_project','featured_image','deskripsi','kategori_proyek_id','slug'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    public function simpan($kategori_produk, $thumbnail_produk, $nama_produk, $deskripsi, $slug) {
    	DB::table($this->table)->insert([
            'kategori_proyek_id' => $kategori_produk,
            'nama_project' => $nama_produk,
            'featured_image' => $thumbnail_produk,
            'deskripsi' => $deskripsi,
            'slug' => $slug,
        ]);
    }

    public function loop_gambar($img) {
        $proyek = Proyek::get()->last();
    	SubImgProyek::create([
            'sub_img' => $img,
            'proyek_id' => $proyek->id_project,
        ]);
    }

    public function ubah_data($kategori_produk, $thumbnail_produk, $nama_produk, $deskripsi, $slug, $id) {
        DB::table($this->table)->where($this->primaryKey, $id)->update([
            'kategori_proyek_id' => $kategori_produk,
            'nama_project' => $nama_produk,
            'featured_image' => $thumbnail_produk,
            'deskripsi' => $deskripsi,
            'slug' => $slug,
        ]);
    }

    public function update_gambar($nama_gambar, $id) {
        SubImgProyek::create([
            'sub_img' => $nama_gambar,
            'proyek_id' => $id,
        ]);
    }

    public function hapus_data($id) {
        Proyek::where($this->primaryKey, $id)->delete();
        SubImgProyek::where('proyek_id', $id)->delete();
    }

    public function gambar() {
        return $this->hasMany('App\Models\SubImgProyek');
    }

    public function kategori() {
        return $this->belongsTo('App\Models\KategoriProyek', 'kategori_proyek_id');
    }
}
