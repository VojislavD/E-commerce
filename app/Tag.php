<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Tag extends Model
{
	protected $fillable = ['name'];
    public function items()
    {
    	return $this->belongsToMany(Item::class);
    }
}
