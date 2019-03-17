<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategoriProyek extends Model
{
    protected $table = 'kategori_project';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
    	'nama_kategori','slug'
    ];

    public function simpan($nama_kategori) {
    	DB::table($this->table)->insert([
    		'nama_kategori' => $nama_kategori,
            'slug' => str_slug($nama_kategori, '-'),
    	]);
    }

    public function ubah_data($nama_kategori, $id_kategori) {
        DB::table($this->table)->where($this->primaryKey, $id_kategori)->update([
            'nama_kategori' => $nama_kategori,
            'slug' => str_slug($nama_kategori, '-'),
        ]);
    }

    public function delete_data($id) {
        return KategoriProyek::where($this->primaryKey, $id)->delete();
    }
    
    public function filter_project() {
        return $this->hasMany('App\Models\Proyek');
    }

}
