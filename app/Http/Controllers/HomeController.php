<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInfo::first();
        $reviews = Review::paginate(30);

        return view('home', compact('contactInfo', 'reviews'));
    }
}
