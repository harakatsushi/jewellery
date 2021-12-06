<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    public function getObj(){
    	if($this->type=="jeweller"){
    		return User::find($this->item_id);
    	}
    	if($this->type=="product"){
    		return Product::find($this->item_id);
    	}
    	if($this->type=="menu"){
    		return Menu::find($this->item_id);
    	}
    	if($this->type=="material"){
    		return Material::find($this->item_id);
    	}
        return null;
    }
}
