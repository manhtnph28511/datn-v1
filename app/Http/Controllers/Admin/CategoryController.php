<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $cates = Category::paginate(6);
        $subCates = SubCategory::all();
        return view('admin.pages.categories.index', ['cates' => $cates, 'subCates' => $subCates]);
    }

    public function create(){
        return view('admin.pages.categories.create-form');
    }

    public function store(CategoryRequest $request)
    {
        if ($request->method() === 'POST') {
            $isSuccess = Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description ?? ''
            ]);
            return checkEndDisplayMsg($isSuccess, 'success', 'Success', 'Thêm mới thành công', 'admin.category.index');
        }
        return view('admin.pages.categories.create-form');
    }


    public function show($id)
{
    $category = Category::find($id);
    return view('admin.pages.categories.show', compact('category'));
}


    public function update(Request $request, $id)
    {
        $cate = Category::find($id);
        if ($request->method() === 'POST') {
            $isSuccess = Category::where('id', $id)->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description ?? ''
            ]);
            return checkEndDisplayMsg($isSuccess, 'success', 'Success', 'Cập nhật thành công', 'admin.category.index');
        }
        return view('admin.pages.categories.edit-form', compact('cate'));
    }


    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('admin.category.index')->with('error', 'Danh mục không tồn tại');
        }

       
        $category->subCategories()->delete();

      
        $isSuccess = $category->forceDelete();

        return redirect()->route('admin.category.index')->with('success', 'Xóa thành công');
    }
}
