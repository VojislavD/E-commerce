<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
    	$items = $category->items()->latest()->paginate(8);

    	return view('categories.show', compact('category','items'));
    }

    public function new()
    {
    	$items = Item::latest()->paginate(8);

    	return view('categories.show', compact('items'));
    }

    public function top()
    {
    	$items = Item::orderBy('rate', 'desc')->paginate(8);

    	return view('categories.show', compact('items'));
    }

    public function sort(Category $category)
    {
        switch (request('sort')) {
            case 'newest':
                $items = $category->items()->orderBy('id','desc')->paginate(8);
                break;
            case 'oldest':
                $items = $category->items()->orderBy('id','asc')->paginate(8);
                break;
            case 'price_ascending':
                $items = $category->items()->orderBy('price','asc')->paginate(8);
                break;
            case 'price_descending':
                $items = $category->items()->orderBy('price','desc')->paginate(8);
                break;
        }
        
        return view('categories.show', compact('category', 'items'));
    }
}
