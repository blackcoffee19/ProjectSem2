<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Comment::paginate(10);
        return view('admin.pages.Reviews.index', compact('reviews'));
    }

    public function findByName(Request $request)
    {
        $product = $request->product;
        $rating = $request->rating;
        $reviews = Comment::whereHas('product', function ($query) use ($product) {
            $query->where('name', 'like', '%' . $product . '%');
        })
            ->when($rating, function ($query, $rating) {
                return $query->where('rating', $rating);
            })
            ->paginate(10);
        return view('admin.pages.Reviews.index', compact('reviews'));
    }
}
