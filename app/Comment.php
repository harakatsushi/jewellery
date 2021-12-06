<?php

namespace App;
use App\FirstFollower;
use App\Transportation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model
{
	use  SoftDeletes;

    protected $table = 'comments';

    protected $dates = [
      'created_at',
      'updated_at',
      'deleted_at',
    ];

	
	public function transportation()
    {
        return $this->hasOne(Transportation::class, 'id' ,'user_id');
    }
}
