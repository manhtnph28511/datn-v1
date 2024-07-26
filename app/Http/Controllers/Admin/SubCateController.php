<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCateController extends Controller
{

    public function trashFashion() {
        $subCates = SubCategory::onlyTrashed()->get();
        return view('admin.pages.categories.sub-cate.fashions.trash-list',compact('subCates'));
    }
    public function trashBeauty() {
        $subCates = SubCategory::onlyTrashed()->get();
        return view('admin.pages.categories.sub-cate.beauty.trash-list',compact('subCates'));
    }
    public function trashAccessory() {
        $subCates = SubCategory::onlyTrashed()->get();
        return view('admin.pages.categories.sub-cate.accessory.trash-list',compact('subCates'));
    }


    public function restore($id) {
        $isSuccess = SubCategory::onlyTrashed()->whereId($id)->restore();
        return checkEndDisplayMsg($isSuccess,'success','Thành công','Hoàn tác thành công','admin.category.index');
    }

    public function store(Request $request) {
        $cates = Category::all();
        if($request->method() === 'POST') {
//            dd($request->all());
            $isSuccess = SubCategory::create([
                'name' => $request->name,
                'slug' => $request->slug ?? '',
                'description' => $request->description ?? '',
                'parent_id' => $request->parent_id
            ]);
            return checkEndDisplayMsg($isSuccess,'success','Thành công','Thêm mới thành công','admin.category.index');
        }
        return view('admin.pages.categories.sub-cate.create-form',compact('cates'));
    }

    public function update(Request $request,$id) {
        $subCate = SubCategory::find($id);
        $cates = Category::all();
        if($request->method() === 'POST') {
            $isSuccess = SubCategory::whereId($id)->update([
                'name' => $request->name,
                'slug' => $request->slug ?? '',
                'parent_id' => $request->parent_id,
                'description' => $request->description ?? ''
            ]);
            return checkEndDisplayMsg($isSuccess,'success','Thành công','Cập nhật thành công','admin.category.index');
        }
        return view('admin.pages.categories.sub-cate.edit-form',['subCate' => $subCate,'cates' => $cates]);
    }


    public function softDelete($id) {
        $isSuccess = SubCategory::destroy($id);
        return checkEndDisplayMsg($isSuccess,'success','Thành công','Xóa thành công','admin.category.index');
    }


    public function destroy($id) {
        $isSuccess = SubCategory::whereId($id)->forceDelete();
        return checkEndDisplayMsg($isSuccess,'success','Thành công','Xóa thành công','admin.category.index');
    }

}
