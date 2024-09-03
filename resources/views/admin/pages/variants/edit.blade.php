@extends('admin.layouts.app')

@section('app')
<div class="dash-content">
    <form action="{{ route('admin.admin.variant.update', ['product_id' => $variant->product_id, 'variant_id' => $variant->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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
                <input type="file" name="image_variant">
                @if($variant->image_variant)
                    <img src="{{ $variant->image_variant}}" alt="Current Image" width="100">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Variant</button>
        </form>
        <a href="{{ route('admin.variant.index', ['product_id' => $product_id]) }}" class="btn btn-back">Quay lại</a>
</div>
@endsection


<style>
    .dash-content {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 0.5rem;
        border-radius: 4px;
        border: 1px solid #ced4da;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
        font-size: 1rem;
    }

    .form-control:focus {
        border-color: #80bdff;
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }
    .btn {
        margin-bottom: 15px;
        padding: 10px 15px;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
        color: #fff;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        color: #fff;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-primary:focus {
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
    }

    .form-group img {
        margin-top: 0.5rem;
        border-radius: 4px;
    }

    .btn-back {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    
    .btn-back:hover {
        background-color: #5a6268;
        border-color: #4e555b;
    }

    .alert {
        padding: 20px;
        margin-bottom: 15px;
        border: 1px solid transparent;
        border-radius: 4px;
        position: relative;
        width: 100%;
    }

    .alert-danger {
        background-color: #f2dede;
        border-color: #ebccd1;
        color: #a94442;
    }

    .alert-danger ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    .alert-danger li {
        margin-bottom: 5px;
    }
</style>

