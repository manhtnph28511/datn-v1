@extends('clients.layouts.app')
@section('title') About @endsection
@section('app')
    <section id="page-header" class="about-header bg-blue-600 py-16 text-center text-white">
        <h2 class="text-5xl font-bold">#KnowUs</h2>
        <p class="mt-4 text-lg">Discover more about us</p>
    </section>

    <section id="about-head" class="section-p1 py-16 px-4 lg:px-16 flex flex-col lg:flex-row items-center gap-8 bg-gray-50">
        <img src="{{ asset('assets/imgs/about/a6.jpg') }}" alt="About Us" class="w-full lg:w-1/2 rounded-lg shadow-lg transition-transform duration-300 transform hover:scale-105">
        <div class="w-full lg:w-1/2 text-gray-800">
            <h2 class="text-4xl font-bold mb-6">Who We Are</h2>
            <p class="mb-6 leading-relaxed">Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <blockquote class="border-l-4 border-blue-600 pl-4 mb-6 italic text-gray-500">
                Create stunning images with as much or little control as you like thanks to a choice of Basic and Creative modes
            </blockquote>
            <div class="bg-gray-200 py-3 px-4 rounded-lg shadow-md animate-pulse">
                Create stunning images with as much or little control as you like thanks to a choice of Basic and Creative modes
            </div>
        </div>
    </section>

    <section id="feature" class="section-p1 py-16 bg-white grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-6 text-center">
        <div class="fe-box bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
            <img src="{{ asset('assets/imgs/features/f1.png') }}" alt="Feature 1" class="mx-auto mb-4 w-16 h-16">
            <h6 class="font-semibold text-gray-800">Free Shipping</h6>
        </div>
        <div class="fe-box bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
            <img src="{{ asset('assets/imgs/features/f2.png') }}" alt="Feature 2" class="mx-auto mb-4 w-16 h-16">
            <h6 class="font-semibold text-gray-800">Online Order</h6>
        </div>
        <div class="fe-box bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
            <img src="{{ asset('assets/imgs/features/f3.png') }}" alt="Feature 3" class="mx-auto mb-4 w-16 h-16">
            <h6 class="font-semibold text-gray-800">Save Money</h6>
        </div>
        <div class="fe-box bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
            <img src="{{ asset('assets/imgs/features/f4.png') }}" alt="Feature 4" class="mx-auto mb-4 w-16 h-16">
            <h6 class="font-semibold text-gray-800">Promotions</h6>
        </div>
        <div class="fe-box bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
            <img src="{{ asset('assets/imgs/features/f5.png') }}" alt="Feature 5" class="mx-auto mb-4 w-16 h-16">
            <h6 class="font-semibold text-gray-800">Happy Sell</h6>
        </div>
        <div class="fe-box bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
            <img src="{{ asset('assets/imgs/features/f6.png') }}" alt="Feature 6" class="mx-auto mb-4 w-16 h-16">
            <h6 class="font-semibold text-gray-800">24/7 Support</h6>
        </div>
    </section>
    @include('clients.layouts.form-feedback')
@endsection
