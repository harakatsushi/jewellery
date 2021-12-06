<?php

namespace App;
use App\FirstFollower;
use App\SecondFollower;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Customer extends Model
{
	use  SoftDeletes;

    protected $table = 'customers';

    protected $dates = [
      'created_at',
      'updated_at',
      'deleted_at',
    ];
protected $guarded = ['aaa'];//①保存したいカラム名

	public function firstFollower()
    {
        return $this->hasOne(FirstFollower::class, 'id' ,'first_follower');
    }

    public function secondFollower()
    {
        return $this->hasOne(SecondFollower::class, 'id' ,'second_follower');
    }
  public function status()
    {
        return $this->hasOne(Status::class, 'id' ,'status_id');
    }

    public function tai_status()
    {
        return $this->hasOne(TaiStatus::class, 'id' ,'tai_status_id');
    }
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
