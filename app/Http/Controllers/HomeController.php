<?php

namespace App\Http\Controllers;

use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::paginate(30);

        return view('home', compact('reviews'));
    }
}
