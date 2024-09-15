<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Product;

class BlogController extends Controller
{

    public function index(Request $request)
{
    $query = Blog::query();

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('start_date') && $request->filled('end_date')) {
        $query->whereBetween('created_at', [$request->start_date, $request->end_date . ' 23:59:59']);
    }

    $blogs = $query->get();

    $blogs = $query->with('product')->get();

    return view('admin.pages.blogs.index', compact('blogs'));
}

public function show($id)
{
    $blog = Blog::find($id); 

  
    if (!$blog) {
        return redirect()->route('admin.pages.blogs.index')->with('error', 'Bài viết không tồn tại!');
    }

    return view('admin.pages.blogs.show', compact('blog')); 
}



    public function create()
    {
        $products = Product::all(); 
        return view('admin.pages.blogs.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        Blog::create($request->all());

        return redirect()->route('admin.blogs.index')->with('success', 'Bài viết đã được thêm thành công.');
    }

    public function edit(Blog $blog)
    {
        $products = Product::all(); 
        return view('admin.pages.blogs.edit', compact('blog', 'products'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $blog->update($request->all());

        return redirect()->route('admin.blogs.index')->with('success', 'Bài viết đã được cập nhật thành công.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Bài viết đã được xóa thành công.');
    }
}
