<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    protected $table = 'img_client';
	protected $primaryKey = 'id_client';
    protected $fillable = [
    	'client_img'
    ];
    protected $hidden = [
    	'created_at','updated_at',
    ];

    public function simpan_gambar($gambar) {
    	Klien::create([
    		'client_img' => $gambar
    	]);
    }

    public function update_gambar($img, $id) {
        Klien::where($this->primaryKey, $id)->update([
            'client_img' => $img,
        ]);
    }

    public function delete_gambar($id) {
        return Klien::where($this->primaryKey, $id)->delete();
    }
}
