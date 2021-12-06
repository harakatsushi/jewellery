<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	public function order()
    {
        return $this->belongsTo(Order::class);
    }


    public function messageLists()
    {
        return $this->hasMany(MessageList::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


     public function jeweller()
    {
        return $this->belongsTo(User::class,'jeweller_id','id');
    }
}
