@extends('clients.layouts.app')

@section('title') {{ $blog->title }} @endsection

@section('app')
    <section id="page-header" class="blog-header">
        <h2>Bài Viết</h2>
        <p>{{ $blog->title }}</p>
    </section>

    <section id="blog-detail">
        <div class="blog-detail">
            @if($blog->product)
                <div class="blog-image">
                    <img src="{{ $blog->product->image }}" alt="{{ $blog->product->name }}">
                </div>
            @endif
            <h1>{{ $blog->title }}</h1>
            <p><strong>Ngày đăng:</strong> {{ $blog->created_at->format('d/m/Y H:i') }}</p>
            <div class="blog-content">
                {!! $blog->content !!}
            </div>
        </div>
    </section>
    <a href= "{{ route('clients.blogs.index') }}" class="back-link">Quay lại</a>
@endsection

<style>
.blog-detail {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.blog-image img {
    max-width: 100%;
    height: auto;
    border-radius: 0.375rem;
    margin-bottom: 1rem;
}

.blog-detail h1 {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.blog-detail .blog-content {
    font-size: 1rem;
}
.back-link {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: 500;
    color: #fff;
    background-color: #4a90e2; 
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
}

.back-link:hover {
    background-color: #357abd; 
    color: #fff;
}

.back-link:focus {
    outline: 2px solid #357abd; 
    outline-offset: 2px;
}

</style>
