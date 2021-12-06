<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageList extends Model
{
	public function user()
    {
        return $this->belongsTo(User::class,'send_user_id','id');
    }
}
