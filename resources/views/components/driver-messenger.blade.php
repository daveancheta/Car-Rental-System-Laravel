<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CarVibe</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="dark:bg-gray-900 select-none" style="font-family: 'Inter', sans-serif;">

    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-110 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar" style="scrollbar-width: thin; scrollbar-color: #6b7280 transparent; scroll">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-900 border-r-2 dark:border-gray-800">
            <div class="mb-5">
                <span class="text-white text-3xl font-bold">Chats</span>
            </div>


            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="flex flex-row items-center">

                <button id="backButton" class="hidden">
                    <svg class="w-8 h-8 text-gray-800 dark:text-white mr-2 ml-2" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                </button>


                <div class="relative w-full">

                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none"
                        placeholder="Search People..." required />
                </div>
            </div>



            <ul class="" id="message">
            
                
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-110">
        <div class="p-4 rounded-lg dark:border-gray-700">
            {{ $slot }}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const backButton = document.getElementById('backButton');
        const searchInput = document.getElementById('default-search');

        searchInput.addEventListener('input', () => {
            if (searchInput.value.trim() === '') {
                backButton.classList.add('hidden');
            } else {
                backButton.classList.remove('hidden');
            }
        });

    

        function getMessages() {
            $.get('/getMessage', function(getMessage){
                let html = ''; 
                  const currentPath = window.location.pathname;


                getMessage.forEach(message => {
                 
                     const actualUrl = `/chat/${message.id}/session/${message.user_id}`; 
                     const isActivePath = actualUrl  === currentPath ? 'bg-gray-700 text-white cursor-not-allowed pointer-events-none select-none p-3 mt-3 rounded-lg' : 'hover:bg-gray-700 p-3 mt-3 rounded-lg';
                     
                    
                    html += `
                    <div class="${isActivePath}">
                        <a href='chat/${message.id}/session/${message.user_id}'>
                       <li class="mb-5 flex gap-2">
                    <img class="rounded-full w-15 h-15 object-cover" src="${message.profile}" alt="">

                    <p class="text-white font-medium mt-2">${message.customer_name}</p>
                </li>
                </a>
                </div>
              
              
                `;
                });


                $('#message').html(html);
            }).fail(() => {
                ('#message').html('<p class="text-red-500">Failed to load messages...</p>')
            });

    }

            getMessages();
            setInterval(getMessages, 500);
   
      
    </script>
</body>

</html>