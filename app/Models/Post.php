<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
	protected $primaryKey = 'id_post';
    protected $fillable = [
    	'img','title','slug','konten','user_id'
    ];
    protected $hidden = [
    	'created_at','updated_at',
    ];
}
