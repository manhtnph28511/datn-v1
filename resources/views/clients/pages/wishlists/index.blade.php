@extends('clients.layouts.app')

@section('app')
<div class="container">
    <h1>Danh Sách Sản Phẩm Yêu Thích Của Bạn</h1>
    
    @if($wishlistItems->isEmpty())
        <p>Không có sản phẩm yêu thích nào</p>
    @else
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($wishlistItems->count())
<ul>
    @foreach($wishlistItems as $item)
        <li>{{ $item->product->name }}</li>
        <form action="{{ route('clients.remove', $item->product_id) }}" method="POST" style="display:inline;">
            @csrf
            @method('POST')
            <button type="submit" class="btn btn-danger">Xóa</button>
        </form>
    @endforeach
</ul>
@else
<p>Wishlist của bạn đang trống.</p>
@endif
    @endif
</div>
@endsection
