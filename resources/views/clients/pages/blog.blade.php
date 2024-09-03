@extends('clients.layouts.app')
@section('title') Blog @endsection

@section('app')
    <section id="page-header" class="blog-header bg-gray-900 py-16 text-center text-white">
        <h2 class="text-5xl font-bold">#readmore</h2>
        <p class="mt-4 text-lg">Read all case studies about our products!</p>
    </section>
    <section id="blog" class="py-16 bg-gray-50">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-4 lg:px-0">
            @foreach($blogs as $blog)
            <div class="blog-box bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                <div class="blog-img">
                    <img src="{{ asset('assets/imgs/blog/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
                </div>
                <div class="p-6">
                    <h4 class="text-2xl font-bold mb-4">{{ $blog->title }}</h4>
                    <p class="text-gray-700 mb-4">{{ Str::limit($blog->excerpt, 100) }}</p>
                    <a href="{{ route('blog.show', $blog->slug) }}" class="text-blue-500 hover:underline">CONTINUE READING</a>
                </div>
                <div class="bg-gray-100 text-gray-600 text-center py-2">
                    <h1 class="text-xl font-bold">{{ $blog->created_at->format('d/m') }}</h1>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    
    @include('clients.layouts.form-feedback')
@endsection
