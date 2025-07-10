<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | CarVibe</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">

    <!-- Flowbite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js" defer></script>

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center justify-center font-sans">

    <div
        class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8 w-full max-w-sm border border-gray-200 dark:border-gray-700">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-blue-600 font-[Bungee]">CarVibe</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Admin Login</p>
        </div>

        <form class="space-y-5" method="POST" action="/loginasadmin">
            @csrf

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div>
                <label for="username"
                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <input type="text" id="username" name="username"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                    placeholder="Username" required />
            </div>


            <div>
                <label for="password"
                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                    placeholder="Password" required />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox"
                    class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600" />
                <label for="remember" class="ms-2 text-sm text-gray-900 dark:text-gray-300">Remember me</label>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-500 text-white font-semibold py-2.5 rounded-lg transition duration-200">
                Sign in
            </button>
        </form>
    </div>

</body>

</html>