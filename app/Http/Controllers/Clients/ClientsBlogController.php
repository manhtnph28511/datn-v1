<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class ClientsBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('product')->orderBy('created_at', 'desc')->get();
        return view('clients.pages.blogs.index', compact('blogs'));
    }

    public function show($id)
{
    $blog = Blog::with('product')->findOrFail($id);
    return view('clients.pages.blogs.show', compact('blog'));
}

}

