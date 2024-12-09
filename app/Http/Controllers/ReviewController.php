<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request, $id)
    {
        Review::create([
            'user_id' => $id,
            'author_id' => $request->user()->id,
            'value' => $request->value,
        ]);

        return redirect()->back()->with('status', 'review-created');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('reviews.edit', compact('review'));
    }

    public function update(ReviewRequest $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->update($request->only('value'));

        return redirect()->back()->with('status', 'review-updated');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('status', 'review-removed');
    }
}
