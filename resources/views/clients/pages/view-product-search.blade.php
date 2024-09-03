@extends('clients.layouts.app')
@section('app')

<section id="page-header" class="bg-purple-500 text-white py-8">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold">#stayhome</h2>
        <p class="text-lg mt-2">Save more with coupons & up to 70% off!</p>
    </div>
</section>

<section id="product-page" class="py-12 bg-gray-50">
    <div class="container mx-auto flex flex-col lg:flex-row gap-8">
        <!-- Sidebar Category List -->
        <aside class="p-category bg-white w-full lg:w-1/4 rounded-lg shadow-lg p-6">
            <ul class="category-list space-y-4">
                <li><a href="#" class="flex items-center space-x-2 text-gray-800 py-3 px-4 bg-purple-100 rounded-md hover:bg-purple-200 transition">
                    <i class="fas fa-home"></i><span class="font-semibold">Home</span>
                </a></li>
                <li><a href="#" class="flex items-center space-x-2 text-gray-800 py-3 px-4 hover:bg-purple-100 rounded-md transition">
                    <img src="{{ asset('assets/imgs/products/f1.jpg') }}" alt="New In" class="w-8 h-8 rounded-full"><span class="font-semibold">New In</span>
                </a></li>
                <li><a href="#" class="flex items-center space-x-2 text-gray-800 py-3 px-4 hover:bg-purple-100 rounded-md transition">
                    <img src="{{ asset('assets/imgs/products/f2.jpg') }}" alt="Coats" class="w-8 h-8 rounded-full"><span class="font-semibold">Coats</span>
                </a></li>
                <li><a href="#" class="flex items-center space-x-2 text-gray-800 py-3 px-4 hover:bg-purple-100 rounded-md transition">
                    <img src="{{ asset('assets/imgs/products/f3.jpg') }}" alt="Tops" class="w-8 h-8 rounded-full"><span class="font-semibold">Tops</span>
                </a></li>
                <li><a href="#" class="flex items-center space-x-2 text-gray-800 py-3 px-4 hover:bg-purple-100 rounded-md transition">
                    <img src="{{ asset('assets/imgs/products/f4.jpg') }}" alt="Knitwear" class="w-8 h-8 rounded-full"><span class="font-semibold">Knitwear</span>
                </a></li>
                <!-- Add more categories as needed -->
            </ul>
        </aside>

        <!-- Main Content: Product List -->
        <div class="pro-container flex-1">
            <div class="flex justify-between items-center mb-8">
                <h4 class="text-3xl font-bold text-gray-800">Coats</h4>
                <a href="#" class="text-indigo-600 hover:underline">View more</a>
            </div>
            
            <!-- Filters -->
            <div class="flex items-center justify-between mb-8 bg-white p-4 rounded-lg shadow-md">
                <div class="flex items-center space-x-4">
                    <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full hover:bg-gray-300 transition">Sort</button>
                    <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full hover:bg-gray-300 transition">Product Type</button>
                    <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full hover:bg-gray-300 transition">Style</button>
                    <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full hover:bg-gray-300 transition">Size</button> 
                    <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full hover:bg-gray-300 transition">Colour</button>
                    <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full hover:bg-gray-300 transition">Price Range</button>
                </div>
                <button class="bg-indigo-600 text-white px-4 py-2 rounded-full hover:bg-indigo-700 transition">
                    <i class="fas fa-filter"></i>
                </button>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($productBySearch as $product)
                    <div class="pro bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                        <a href="{{ route('home.site.product.show', ['id' => $product->id, 'slug' => $product->slug]) . "?cate=$product->cate_id" }}">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-md mb-4">
                        </a>
                        <div class="des">
                            <span class="text-gray-500">{{ $product->getSubCateName()->name }}</span>
                            <h5 class="text-lg font-semibold mt-2">
                                <a href="{{ route('home.site.product.show', ['id' => $product->id, 'slug' => $product->slug]) }}" class="text-gray-800 hover:text-indigo-600 transition">{{ $product->name }}</a>
                            </h5>
                            <div class="star mt-2 text-yellow-500 flex">
                                @for ($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                            <h4 class="text-lg font-bold mt-2">{{ number_format($product->price) }}₫</h4>
                        </div>
                        <a href="#" class="block mt-4 bg-indigo-600 text-white py-2 rounded-md text-center hover:bg-indigo-700 transition">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </a>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">Không có kết quả mà bạn muốn tìm</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

<div class="mb-12">
    {{-- {{ $products->links('admin.layouts.pagination') }} --}}
</div>

@include('clients.layouts.form-feedback')

@endsection
