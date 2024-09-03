<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" href="{{ asset('assets/imgs/clothes-hanger.png') }}" type="image/gif" sizes="16x16">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-2xl rounded-lg flex flex-col md:flex-row max-w-4xl w-full">
            <!-- Left side with the form -->
            <div class="w-full md:w-1/2 p-8 md:p-10">
                <div class="mb-8">
                    <h1 class="text-4xl font-extrabold text-gray-900 mb-2">Welcome back</h1>
                    <p class="text-gray-600">We're glad to see you again. Please enter your details to continue.</p>
                </div>
                <form action="{{ route('account.login') }}" method="POST" id="login-form" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter your email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                        <input type="password" name="password" id="password" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter your password" value="{{ old('password') }}">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900"> Remember me </label>
                        </div>
                        <div>
                            <a href="#" class="text-sm text-indigo-600 hover:underline">Forgot password?</a>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md font-semibold hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150 shadow-lg">Sign in</button>
                    </div>
                </form>
                <div class="mt-8">
                    <button class="w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 rounded-md flex items-center justify-center hover:bg-gray-50 shadow-md transition duration-150 ease-in-out">
                        <img src="{{ asset('assets/imgs/google-icon.png') }}" alt="Google Icon" class="w-5 h-5 mr-2">
                        Sign in with Google
                    </button>
                </div>
                <p class="mt-6 text-center text-sm text-gray-600">
                    Don't have an account? <a href="{{ route('account.register') }}" class="text-indigo-600 hover:underline">Sign up</a>
                </p>
            </div>
            <!-- Right side with the decoration -->
            <div class="hidden md:flex w-1/2 bg-gradient-to-br from-purple-500 to-indigo-500 justify-center items-center relative">
                <div class="absolute top-0 left-0 w-full h-full bg-opacity-20 bg-white"></div>
                <div class="w-48 h-48 bg-white rounded-full shadow-lg transform transition-all duration-300 ease-in-out hover:scale-110">
                    <div class="absolute inset-x-0 bottom-0 bg-purple-300 h-16 rounded-full opacity-30 shadow-inner"></div>
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</body>
</html>
