<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link rel="icon" href="{{ asset('assets/imgs/clothes-hanger.png') }}" type="image/gif" sizes="16x16">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-2xl rounded-lg flex max-w-4xl w-full overflow-hidden">
            <!-- Right side with the form -->
            <div class="hidden md:flex w-1/2 bg-gradient-to-br from-purple-500 to-indigo-500 justify-center items-center relative">
                <div class="absolute top-0 left-0 w-full h-full bg-opacity-20 bg-white"></div>
                <div class="w-48 h-48 bg-white rounded-full shadow-lg transform transition-all duration-300 ease-in-out hover:scale-110">
                    <div class="absolute inset-x-0 bottom-0 bg-purple-300 h-16 rounded-full opacity-30 shadow-inner"></div>
                </div>
            </div>

            <!-- Left side with the decoration -->
            <div class="w-full md:w-1/2 p-8 md:p-10">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Create an Account</h1>
                <p class="text-gray-600 mb-8">Sign up to get started with our service.</p>
                <form action="" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Enter your full name">
                        @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Enter your email">
                        @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password"
                            class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Create a password">
                        @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirm" class="block text-sm font-medium text-gray-700">Confirm
                            Password</label>
                        <input type="password" name="password_confirm" id="password_confirm"
                            class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Confirm your password">
                        @error('password_confirm')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md font-semibold hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700 transition ease-in-out duration-150 shadow-lg">Sign
                            up</button>
                    </div>
                </form>
                <p class="mt-6 text-center text-sm text-gray-600">
                    Already have an account? <a href="{{ route('account.login') }}"
                        class="text-indigo-600 hover:underline">Log in</a>
                </p>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>

</html>
