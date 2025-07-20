<x-driver-layout>
    <div id="notifications">
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function notification() {
            $.get('/notifications', function(notification)
            {
                let html = '';
                
                if (notification.length === 0) {
                    html = `
                    <div class="p-4 mb-4 text-gray-800 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-white dark:border-gray-700 select-none">
                        <h3 class="text-lg font-medium">No work available at the moment.</h3>
                        <p class="text-sm mt-2">Please wait for your task to appear here. Thank you, our valued driver.</p>
                    </div>`;
                } else {
                     html += `<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6">`;
notification.forEach(notif => {

   
                html += `

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 select-none">
    <a href="#">
            <div class=" relative">
            <img src="${notif.car_image}" alt=""
                class="w-full h-48 object-cover rounded-t-xl" />
            <div class="absolute top-3 left-3">
                <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium uppercase tracking-wide dark:bg-green-100 dark:text-green-800">
                     ${notif.status} 
                </span>
            </div>
            </div>
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${notif.fullname}</h5>
        </a>
         <div class="flex justify-between">
             <p class="text-white">Car Name:</p>
        <p class="mb-3 font-bold text-white dark:text-white">${notif.car_name}</p>
        </div>
        <div class="flex justify-between">
             <p class="text-white">Rent Duration:</p>
        <p class="mb-3 font-bold text-white dark:text-white">${notif.start_date} - ${notif.end_date}</p>
        </div>
        <a href="/manage/${notif.id}/details" class="mt-5 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            View Details
             <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
        <div class="text-end">
             <span class="text-gray-400 font-bold">${notif.time_ago}</span>
             </div>

       
    </div>
</div>

                    `;

                   

});
 html += `</div>`;
                }
                $('#notifications').html(html);
            }).fail(( )=> {
                 $('#notifications').html('<p class="text-red-500">Failed to load Notification.</p>');
            });     
    }

    notification();
    setInterval(notification, 1500);
    </script>
</x-driver-layout>