<?php

namespace App;
use App\FirstFollower;
use App\SecondFollower;

use Illuminate\Database\Eloquent\Model;

class CustomerLog extends Model
{

    protected $table = 'customer_logs';

    protected $dates = [
      'created_at',
      'updated_at',

    ];

	public function user()
    {
        return $this->hasOne(Transportation::class, 'id' ,'user_id');
    }

}
