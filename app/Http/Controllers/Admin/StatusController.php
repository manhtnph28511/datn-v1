<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StatusProduct;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = StatusProduct::all(); 
        return view('admin.pages.status.index', compact('statuses'));
    }

    public function create()
    {
        return view('admin.pages.status.create'); 
    }

    public function store(Request $request)
{
    $request->validate([
        'status' => 'required|string|max:255',
        'description' => 'nullable|string|max:255', 
    ]);

    StatusProduct::create([
        'status' => $request->input('status'),
        'description' => $request->input('description') ?? 'Không có miêu tả', 
    ]);

    return redirect()->route('admin.status.index')->with('success', 'Trạng thái đã được thêm mới.');
}



    public function edit($id)
    {
        $status = StatusProduct::findOrFail($id); 
        return view('admin.pages.status.edit', compact('status')); 
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'status' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
    ]);

    $statusProduct = StatusProduct::findOrFail($id);

    $statusProduct->update([
        'status' => $request->input('status'),
        'description' => $request->input('description') ?? 'Không có miêu tả', 
    ]);

    return redirect()->route('admin.status.index')->with('success', 'Trạng thái đã được cập nhật.');
}


    public function destroy($id)
    {
        $status = StatusProduct::findOrFail($id);
        $status->delete(); // Xóa trạng thái

        return redirect()->route('admin.status.index')->with('success', 'Trạng thái đã được xóa.');
    }



    public function search(Request $request)
    {
        $query = StatusProduct::query();
    
        if ($request->has('status')) {
            $query->where('status', 'like', '%' . $request->input('status') . '%');
        }
    
    
        $statuses = $query->get();
    
        return view('admin.pages.status.index', compact('statuses'));
    }
    

}
