<x-layout>
   <div class="relative bg-gray-900 h-screen">

    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 opacity-90"></div>
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center opacity-30"></div>

    <div class="relative text-center flex flex-col justify-center items-center h-full px-4">
        <h1 class="text-5xl font-bold tracking-tight text-white sm:text-7xl drop-shadow-lg">
            Welcome to <span class="text-yellow-400">Services</span>
        </h1>
        <p class="mt-6 text-lg font-medium text-white sm:text-xl max-w-2xl">
            Rent your dream car with just a few clicks. <span class="text-yellow-300">Fast</span>, <span class="text-yellow-300">reliable</span>, and <span class="text-yellow-300">stylish</span> rides for every journey.
        </p>

       <div class="mt-10">
        @guest
            <a href="/car" class="px-10 text-white rounded-full p-5 border-l-3 border-r-3 border-yellow-400 hover:border-indigo-400 hover:text-white-900 transition-colors duration-300">Book Now</a> 
        @endguest
           @auth
               
<a href="/car" class="px-10 text-white rounded-full p-5 border-l-3 border-r-3 border-yellow-400 hover:border-indigo-400 hover:text-white-900 transition-colors duration-300">Book Now</a> 
           @endauth
        </div>
    </div>
</div>


</x-layout>
