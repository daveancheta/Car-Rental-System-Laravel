<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CarVibe - Professional Car Rental Platform</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .card-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .card-shadow-hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
        }
        
        .role-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .role-card:hover {
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="gradient-bg min-h-screen text-white flex flex-col items-center justify-center px-6 py-12">

    <!-- Header Section -->
    <header class="text-center mb-16 max-w-2xl">
        <div class="mb-6">
            <h1 class="text-5xl font-bold mb-4 tracking-tight">
                Welcome to <span class="text-blue-500 bg-gradient-to-r from-blue-400 to-blue-600 bg-clip-text text-transparent">CarVibe</span>
            </h1>
            <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-blue-600 mx-auto rounded-full"></div>
        </div>
        <p class="text-gray-300 text-lg leading-relaxed">
            Choose your role to access your personalized dashboard and begin your journey with our comprehensive car rental platform.
        </p>
    </header>

    <!-- Role Selection Grid -->
    <main class="w-full max-w-4xl">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Customer Role -->
            <a href="/index" class="role-card group bg-gray-800 hover:bg-blue-600 card-shadow hover:card-shadow-hover rounded-2xl p-8 flex flex-col items-center text-center border border-gray-700 hover:border-blue-500">
                <div class="bg-blue-500/10 group-hover:bg-blue-500/20 rounded-xl p-4 mb-6 transition-colors">
                  <svg class="w-12 h-12 text-blue-400 group-hover:text-white transition-colors" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
</svg>

                </div>
                <h2 class="text-xl font-semibold mb-3 group-hover:text-white">Customer Portal</h2>
                <p class="text-gray-400 group-hover:text-blue-100 leading-relaxed">
                    Browse available vehicles, make reservations, and manage your rental history with our intuitive customer interface.
                </p>
                <div class="mt-6 text-blue-400 group-hover:text-white transition-colors">
                    <span class="text-sm font-medium">Access Dashboard →</span>
                </div>
            </a>

            <!-- Driver Role -->
            <a href="#" class="role-card group bg-gray-800 hover:bg-green-600 card-shadow hover:card-shadow-hover rounded-2xl p-8 flex flex-col items-center text-center border border-gray-700 hover:border-green-500">
                <div class="bg-green-500/10 group-hover:bg-green-500/20 rounded-xl p-4 mb-6 transition-colors">
                    <svg class="w-12 h-12 text-green-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0V8.25a1.5 1.5 0 013 0v10.5zM12 18.75a1.5 1.5 0 01-3 0V8.25a1.5 1.5 0 013 0v10.5zM15.75 18.75a1.5 1.5 0 01-3 0V8.25a1.5 1.5 0 013 0v10.5z" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold mb-3 group-hover:text-white">Driver Dashboard</h2>
                <p class="text-gray-400 group-hover:text-green-100 leading-relaxed">
                    Manage delivery assignments, track vehicle locations, and coordinate pickup and drop-off schedules efficiently.
                </p>
                <div class="mt-6 text-green-400 group-hover:text-white transition-colors">
                    <span class="text-sm font-medium">Access Dashboard →</span>
                </div>
            </a>

            <!-- Admin Role -->
            <a href="/loginadmin" class="role-card group bg-gray-800 hover:bg-red-600 card-shadow hover:card-shadow-hover rounded-2xl p-8 flex flex-col items-center text-center border border-gray-700 hover:border-red-500">
                <div class="bg-red-500/10 group-hover:bg-red-500/20 rounded-xl p-4 mb-6 transition-colors">
                    <svg class="w-12 h-12 text-red-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold mb-3 group-hover:text-white">Admin Control</h2>
                <p class="text-gray-400 group-hover:text-red-100 leading-relaxed">
                    Comprehensive system management including fleet oversight, user administration, and operational analytics.
                </p>
                <div class="mt-6 text-red-400 group-hover:text-white transition-colors">
                    <span class="text-sm font-medium">Access Dashboard →</span>
                </div>
            </a>

        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-16 text-center">
        <p class="text-gray-500 text-sm">
            © 2025 CarVibe™ All Rights Reserved.
        </p>
    </footer>

</body>

</html> 