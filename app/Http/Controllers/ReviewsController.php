<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Review;
use Illuminate\Validation\Rule;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->paginate(10);
        return view('reviews.index', compact('reviews'));
    }

    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    public function store(Item $item) 
    {
		request()->validate([
			'rate' => ['required','integer', Rule::in([1,2,3,4,5])],
			'name' => ['required'],
			'email' => ['required','email'],
			'comment' => ['required','min:6','max:500']
		]);

		Review::create([
			'item_id' => $item->id,
			'rate' => request('rate'),
			'name' => request('name'),
			'email' => request('email'),
			'comment' => request('comment'),
            'status' => 2
		]);

		return back()->with('ReviewSuccess', 'Thanks for the review, review will be displayed after approval.');
    }

    public function update(Review $review)
    {
        if(request('status') == 'approve') {
            $review->update(['status' => 1]);
            $review->item()->update(['rate' => $this->calculateRate($review->item_id)]);
        } else if(request('status') == 'disapprove') {
            $review->update(['status' => 0]);
            $review->item()->update(['rate' => $this->calculateRate($review->item_id)]);
        }

        return redirect('/admin/reviews')->with('reviewStatus', 'Review status is changed.');
    }

    public function search()
    {
        $reviews = Review::where('name', 'LIKE','%'.request('keyword').'%')->paginate(5);
        return view('reviews.index', compact('reviews'));
    }

    public function filter()
    {
        if(request('status') === 'all') {
            $reviews = Review::paginate(10);
        } else {
            $reviews = Review::where('status', request('status'))->paginate(10);
        }
        
        return view('reviews.index', compact('reviews'));
    }

    public function calculateRate($id)
    {
        $rate = Review::where('item_id', $id)->where('status', 1)->avg('rate');
        switch ($rate) {
            case $rate=='null':
                return 0;
                break;
            case $rate<1.5:
                return 1;
                break;
            case $rate>=1.5 && $rate<2.5:
                return 2;
                break;
            case $rate>=2.5 && $rate<3.5:
                return 3;
                break;
            case $rate>=3.5 && $rate<4.5:
                return 4;
                break;
            case $rate>=4.5 && $rate<=5:
                return 5;
                break;
            default:
                return 0;
                break;
        }
    }

    public function destroy(Review $review)
    {
        $review->delete();
        $review->item()->update(['rate' => $this->calculateRate($review->item_id)]);

        return redirect('/admin/reviews')->with('reviewDeleted', 'Review is deleted.');
    }
}
