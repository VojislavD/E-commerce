<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Review;
use App\Category;
use App\Tag;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    public function index()
    {
    	return view('items.index');
    }

    public function adminIndex()
    {
        $items = Item::orderBy('id','desc')->paginate(10);
        return view('items.admin.index', compact('items'));
    }

    public function show(Item $item)
    {
    	$similarItems = Item::take(6)->where('category_id', $item->category_id)->where('id','!=',$item->id)->orderBy('rate')->get();

    	return view('items.show', compact('item', 'similarItems'));
    }

    public function adminShow(Item $item)
    {
        return view('items.admin.show', compact('item'));
    }
    public function create()
    {
        return view('items.admin.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'category_id' => ['required', 'between:1,12'],
            'name' => ['required', 'string', 'min:6', 'max:255', 'unique:items'],
            'code' => ['required', 'integer', 'unique:items'],
            'price' => ['required', 'numeric', 'max:9999'],
            'description' => ['required', 'string', 'min:6', 'max:1000'],
            'image' => ['required','image', 'dimensions:min_width=400,min_height=600,max_width=400,max_height=600'],
            'stock' => ['required','numeric', 'min:0', 'max:10000'],
        ]);
        
       
        Validator::make(['tag_name' => array_unique(request('tags'))], [
                'tag_name.*' => ['max:20'],
            ],
            [
                'tag_name.*.unique' => 'The tag has already been taken.'
            ]
        )->validate();

        $image_url = Item::storeImage($request);

        Item::create([
            'category_id' => (int)request('category_id'),
            'name' => request('name'),
            'code' => request('code'),
            'price' => request('price'),
            'description' => request('description'),
            'image_url' => $image_url,
            'stock' => request('stock')
        ]);

        foreach(array_unique(request('tags')) as $tag) {
            if($tag) {
                if(!count(Tag::where('name',$tag)->get())) {
                    Tag::create([
                        'name' => $tag,
                    ]);
                    
                    DB::table('item_tag')->insert([
                        'item_id' => Item::latest()->value('id'),
                        'tag_id' => Tag::latest()->value('id'),
                        'created_at' => NOW(),
                        'updated_at' => NOW(),
                    ]);
                } else {
                    DB::table('item_tag')->insert([
                        'item_id' => Item::latest()->value('id'),
                        'tag_id' => Tag::where('name',$tag)->value('id'),
                        'created_at' => NOW(),
                        'updated_at' => NOW(),
                    ]);
                }
                
            }

        }

        return redirect()->route('admin.items')->with('itemCreated', 'Item is successfully created.');
    }

    public function edit(Item $item)
    {
        return view('items.admin.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        request()->validate([
            'category_id' => ['required', 'between:1,12'],
            'name' => ['required', 'string', 'max:255', Rule::unique('items')->ignore($item)],
            'code' => ['required', 'integer', Rule::unique('items')->ignore($item)],
            'price' => ['required', 'numeric', 'max:9999'],
            'description' => ['required', 'string', 'max:1000'],
            'rate' => ['required', 'between:1,5'],
            'image' => ['nullable','image', 'dimensions:min_width=400,min_height=600,max_width=400,max_height=600'],
            'stock' => ['required', 'numeric','min:0'],
            'created_at' => ['required', 'date']
        ]);

        if($request['image']) {

            $image_url = Item::storeImage($request);

            $item->update([
                'category_id' => (int)request('category_id'),
                'name' => request('name'),
                'code' => request('code'),
                'price' => request('price'),
                'description' => request('description'),
                'rate' => request('rate'),
                'image_url' => $image_url,
                'stock' => request('stock'),
                'created_at' => request('created_at')
            ]);
        } else {
            $item->update([
                'category_id' => (int)request('category_id'),
                'name' => request('name'),
                'code' => request('code'),
                'price' => request('price'),
                'description' => request('description'),
                'rate' => request('rate'),
                'stock' => request('stock'),
                'created_at' => request('created_at')
            ]);
        }

        return redirect('/admin/items/'.$item->id)->with('itemUpdated', 'Item is successfully updated.');
    }
    
    public function search()
    {
        if(Auth::check() && auth()->user()->isAdmin())
        {
            $items = Item::where('name', 'LIKE','%'.request('keyword').'%')->paginate(10);

            return view('items.admin.index', compact('items'));
        } else {
        	$items = Item::where('name', 'LIKE','%'.request('keyword').'%')->paginate(8);
            $items->withPath('search?keyword='.request('keyword'));

    	   return view('search.show', compact('items'));
        }
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('admin.items')->with('itemDeleted', 'Item is successfully deleted.');
    }

    public function filterByCategory()
    {
        if(request('category') === 'all') {
            $items = Item::paginate(10);
        } else {
            $items = Item::where('category_id', request('category'))->paginate(10);
        }
        
        return view('items.admin.index', compact('items'));
    }
}
