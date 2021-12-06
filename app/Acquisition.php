<?php

namespace App;

use App\Branch;
use App\Team;
use App\Appointer;
use App\Closer;
use App\Defender;

use App\Plan; 
use App\Op; 
use App\FirstFollower; 
use App\Acquisition; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Acquisition extends Model
{
	use  SoftDeletes;


	public function branch()
    {
        return $this->hasOne(Branch::class, 'id' ,'branch_id');
    }

    public function team()
    {
        return $this->hasOne(Team::class, 'id' ,'team_id');
    }


    public function appointer()
    {
        return $this->hasOne(Appointer::class, 'id' ,'apointer');
    }

    public function closer()
    {
        return $this->hasOne(Closer::class, 'id' ,'closer_id');
    }


}
