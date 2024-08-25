<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index()
    {
        // Lấy tất cả các đánh giá từ database
        $ratings = Rating::with('user', 'product')->get();
        
        // Truyền dữ liệu vào view
        return view('admin.pages.ratings.index', compact('ratings'));
    }
    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();
        return redirect()->route('admin.ratings.index')->with('success', 'Đánh giá đã được xóa.');
    }
}
