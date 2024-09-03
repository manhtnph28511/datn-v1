@extends('clients.layouts.app')

@section('title') Danh Sách Blog @endsection

@section('app')
    <section id="page-header" class="blog-header">
        <h2>Bài Viết</h2>
        <p>Danh sách các bài viết mới nhất</p>
    </section>

    <section id="blog">
        <h1>Danh Sách Bài Viết</h1>

        @if($blogs->isEmpty())
            <p>Hiện tại không có bài viết nào.</p>
        @else
            <div class="blog-list">
                @foreach($blogs as $blog)
                    <div class="blog-item">
                        @if($blog->product)
                            <div class="blog-image">
                                <img src="{{ $blog->product->image }}" alt="{{ $blog->product->name }}">
                            </div>
                        @endif
                        <div class="blog-info">
                            <h2>Tên sản phẩm :{{ $blog->product->name ?? 'Tên sản phẩm không có' }}</h2>
                            <p><strong>Ngày đăng:</strong> {{ $blog->created_at->format('d/m/Y') }}</p>
                            <p>{!! Str::limit($blog->content, 50) !!}</p>
                            <a href="{{ route('clients.blogs.show', $blog->id) }}" class="read-more">Chi tiết</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection

<style>
.blog-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.blog-item {
    display: flex;
    border: 1px solid #ddd;
    padding: 1rem;
    border-radius: 0.375rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.blog-image img {
    max-width: 150px;
    height: auto;
    border-radius: 0.375rem;
    margin-right: 1rem;
}

.blog-info {
    flex: 1;
}

.blog-info h2 {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
}

.blog-info .read-more {
    color: #3182ce;
    text-decoration: underline;
    font-weight: 500;
}

.blog-info .read-more:hover {
    color: #2b6cb0;
}
</style>
