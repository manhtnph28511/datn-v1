<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\BrandRequest;
use Illuminate\Support\Str;
class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->paginate(6);
        return view('admin.pages.brands.index', compact('brands'));
    }



    public function create()
    {
        return view('admin.pages.brands.create-form'); // Trả về view để hiển thị form thêm mới
    }
    public function store(BrandRequest $request)
    {
        if ($request->method() === 'POST') {
            $isSuccess = Brand::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description ?? '',
            ]);
            return checkEndDisplayMsg($isSuccess, 'success', 'Success', 'Thêm mới thành công', 'admin.brand.index');
        }
        return view('admin.pages.brands.create-form');
    }


    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        if ($request->method() === 'POST') {
            $isSuccess = Brand::where('id', $id)->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description ?? ''
            ]);
            return checkEndDisplayMsg($isSuccess, 'success', 'Success', 'Cập nhật thành công', 'admin.brand.index');
        }
        return view('admin.pages.brands.edit-form', compact('brand'));
    }


    public function destroy($id)
    {
        $isSuccess = Brand::whereId($id)->forceDelete();
        return checkEndDisplayMsg($isSuccess, 'success', 'Success', 'Xóa thành công', 'admin.brand.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $brands = Brand::where('name', 'LIKE', "%{$query}%")->paginate(10);

        return view('admin.pages.brands.index', compact('brands'));
    }

}
