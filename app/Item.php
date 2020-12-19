<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Review;
use App\Tag;
use App\Order;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    protected $fillable = ['category_id','name','code','price','description','rate','image_url','stock','created_at'];
    
    public function category()
    {
    	return $this->belongsTo(Category::class,'category_id');
    }

    public function reviews()
    {
    	return $this->hasMany(Review::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public static function storeImage($request)
    {
        $image = $request->file('image');
        $imageName = $image->hashName();
        Storage::disk('images')->put($request['category'].'/', $image);
        return $image_url = '/storage/images/products/'.$request['category'].'/'.$imageName;
    }
}
