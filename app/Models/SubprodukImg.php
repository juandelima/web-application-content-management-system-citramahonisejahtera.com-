<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubprodukImg extends Model {
    protected $table = 'subprodukimg';
    protected $fillable = ['sub_img','produk_id'];
    protected $hidden = [
    	'created_at','updated_at',
    ];

    public function produk() {
    	return $this->belongsTo('App\Models\Produk', 'produk_id');
    }
}
