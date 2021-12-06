<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function limit_span()
    {


		$day1 = strtotime($this->limit_date1);
		$day2 = strtotime(date('Y-m-d'));
        return ($day1 - $day2) / (60 * 60 * 24);
    }
}
