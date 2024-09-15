<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCateController extends Controller
{
    public function index($categories_id)
    {
       
        $category = Category::findOrFail($categories_id);
    
        
        $subCategories = SubCategory::where('categories_id', $categories_id)->get();
    
        return view('admin.pages.sub-cate.index', [
            'subCategories' => $subCategories,
            'categoryName' => $category->name, 
            'categories_id' => $categories_id,
        ]);
    }


    public function create($categories_id)
    {
       
        $category = Category::find($categories_id);

        return view('admin.pages.sub-cate.create-form', [
            'categories_id' => $categories_id,
            'category' => $category
        ]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:sub_categories',
            'description' => 'nullable|string',
            'categories_id' => 'required|exists:categories,id', 
        ]);

        
        SubCategory::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'categories_id' => $request->input('categories_id'),
        ]);


        return redirect()->route('admin.subcate.index', ['categories_id' => $request->input('categories_id')])
            ->with('success', 'Danh mục con đã được tạo thành công.');
    }

    public function show($id)
    {
        $subCategory = SubCategory::with('category')->findOrFail($id);
        return view('admin.pages.sub-cate.show', compact('subCategory'));
    }
    

    public function edit($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        return view('admin.pages.sub-cate.edit-form', ['subCategory' => $subCategory]);
    }

    // Xử lý cập nhật danh mục con
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:sub_categories,slug,' . $id,
            'description' => 'nullable|string'
        ]);

        $subCategory = SubCategory::findOrFail($id);
        $subCategory->update($request->all());

        return redirect()->route('admin.subcate.index', ['categories_id' => $subCategory->categories_id])
            ->with('success', 'Danh mục con đã được cập nhật thành công.');
    }

    
    

   


    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();

        return redirect()->route('admin.subcate.index', ['categories_id' => $subCategory->categories_id])
            ->with('success', 'Danh mục con đã được xóa thành công.');
    }

}
