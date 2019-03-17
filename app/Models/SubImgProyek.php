<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubImgProyek extends Model
{
    protected $table = 'subprojectimg';
    protected $fillable = ['sub_img','proyek_id'];
    protected $hidden = [
    	'created_at','updated_at',
    ];

    public function proyek() {
    	return $this->belongsTo('App\Models\Proyek', 'proyek_id');
    }
}
