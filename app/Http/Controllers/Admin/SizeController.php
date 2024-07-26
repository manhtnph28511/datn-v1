<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{

    public function show($id) {
        $size = Size::find($id);
        return view('admin.pages.attributes.sizes.detail-size',compact('size'));
    }

    public function store(Request $request) {

        if($request->method() === 'POST') {
            $request->validate([
                'name' => 'required'
            ],[
                'name.required' => 'Không được để trống tên size'
            ]);
            $isSuccess = Size::create([
                'name' => $request->name,
                'description' => $request->description ?? ''
            ]);
            return checkEndDisplayMsg($isSuccess,'success','Success','Thêm mới thành công','admin.att.index');
        }
        return view('admin.pages.attributes.sizes.create-form');
    }

    public function update(Request $request, $id) {
        $size = Size::find($id);
        if($request->method() === 'POST') {
            $isSuccess = Size::where('id',$id)->update([
                'name' => $request->name,
                'description' => $request->description ?? ''
            ]);
            return checkEndDisplayMsg($isSuccess,'success','success','Cập nhật thành công','admin.att.index');
        }
        return view('admin.pages.attributes.sizes.edit-form',compact('size'));
    }
    public function destroy($id) {
        $isSuccess = Size::whereId($id)->forceDelete();
        return checkEndDisplayMsg($isSuccess,'success','Success','Xóa thành công','admin.att.index');
    }
}
