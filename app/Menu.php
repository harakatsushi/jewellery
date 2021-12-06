<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Menu extends Model
{
	
public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }



}
