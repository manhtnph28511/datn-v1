@extends('admin.layouts.app')

@section('app')
<div class="dash-content">
        <form action="{{ route('admin.variant.update', ['product_id' => $variant->product_id, 'variant_id' => $variant->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="size_id">Size</label>
                <select name="size_id" id="size_id" class="form-control">
                    @foreach($sizes as $size)
                        <option value="{{ $size->id }}" {{ $variant->size_id == $size->id ? 'selected' : '' }}>{{ $size->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="color_id">Color</label>
                <select name="color_id" id="color_id" class="form-control">
                    @foreach($colors as $color)
                        <option value="{{ $color->id }}" {{ $variant->color_id == $color->id ? 'selected' : '' }}>{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $variant->price }}">
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $variant->quantity }}">
            </div>

            <div class="form-group">
                <label for="image_variant">Image</label>
                <input type="file" name="image_variant" id="image_variant" class="form-control">
                @if($variant->image_variant)
                    <img src="{{ asset('storage/' . $variant->image_variant) }}" alt="Current Image" width="100">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Variant</button>
        </form>
        <a href="{{ route('admin.variant.index', ['product_id' => $product_id]) }}">Quay lại</a>
</div>
@endsection
