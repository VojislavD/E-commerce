<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Review;

class PagesController extends Controller
{
    public function index()
    {
    	$latestItems = Item::take(6)->latest()->get();
    	$topItems = Item::take(6)->orderBy('rate','desc')->latest()->get();

    	return view('index', compact('latestItems', 'topItems'));
    }
}
