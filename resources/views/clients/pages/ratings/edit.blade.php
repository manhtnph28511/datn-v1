<!-- resources/views/clients/pages/ratings/edit.blade.php -->
@extends('clients.layouts.app')

@section('app')
<div class="dash-content">
    <h4>Cập nhật Đánh giá</h4>
    
    <!-- Hiển thị thông báo thành công nếu có -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form cập nhật đánh giá -->
    <form action="{{ route('clients.ratings.update', $rating->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="rating">Đánh giá:</label>
            <select id="rating" name="rating" class="form-control" required>
                <option value="">Chọn đánh giá</option>
                <option value="1" {{ $rating->rating == 1 ? 'selected' : '' }}>1 Sao</option>
                <option value="2" {{ $rating->rating == 2 ? 'selected' : '' }}>2 Sao</option>
                <option value="3" {{ $rating->rating == 3 ? 'selected' : '' }}>3 Sao</option>
                <option value="4" {{ $rating->rating == 4 ? 'selected' : '' }}>4 Sao</option>
                <option value="5" {{ $rating->rating == 5 ? 'selected' : '' }}>5 Sao</option>
            </select>
        </div>
        <div class="form-group">
            <label for="review">Bình luận:</label>
            <textarea id="review" name="review" class="form-control">{{ $rating->review }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
