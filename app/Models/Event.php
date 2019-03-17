<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
	protected $primaryKey = 'id_event';
    protected $fillable = [
    	'img','title','slug','konten','user_id'
    ];
    protected $hidden = [
    	'created_at','updated_at',
    ];
}
