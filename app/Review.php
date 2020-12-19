<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Review extends Model
{
	protected $fillable = ['item_id','rate','name','email','comment','status'];
	
    public function item()
    {
    	return $this->belongsTo(Item::class);
    }
}
