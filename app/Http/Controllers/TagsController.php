<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
    	$items = $tag->items()->latest()->paginate(8);
    	return view('tags.show', compact('tag','items'));
    }

    public function sort(Tag $tag)
    {
    	switch (request('sort')) {
            case 'newest':
                $items = $tag->items()->orderBy('id','desc')->paginate(8);
                break;
            case 'oldest':
                $items = $tag->items()->orderBy('id','asc')->paginate(8);
                break;
            case 'price_ascending':
                $items = $tag->items()->orderBy('price','asc')->paginate(8);
                break;
            case 'price_descending':
                $items = $tag->items()->orderBy('price','desc')->paginate(8);
                break;
        }
        
        return view('tags.show', compact('tag', 'items'));
    }
}
