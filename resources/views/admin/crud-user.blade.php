<x-admin-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    @php
    $date7daysago = \Carbon\Carbon::now()->sub(7, 'days');
    @endphp

    <div class="mb-5 flex justify-between">
        <div>
            <button class="bg-blue-800 text-white text-sm p-2.5 flex justify-center rounded-md">
                <div class="flex flex-row items-center gap-1">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    <span>Add New User</span>
                </div>
            </button>
        </div>
        <div class="flex flex-row gap-0">
            <button
                class="bg-gray-700 text-white text-sm p-2.5 flex justify-center rounded-l-md cursor-pointer hover:scale-110 transform transition duration-300 hover:rounded-md hover:z-50">Suspend
                All</button>
            <button
                class="bg-gray-700 text-white text-sm p-2.5 flex justify-center border-l border-black cursor-pointer hover:scale-110 transform transition duration-300 hover:rounded-md hover:border-none hover:z-50">Archive
                All</button>
            <button
                class="bg-gray-700 text-white text-sm p-2.5 flex justify-center rounded-r-md border-l border-black cursor-pointer hover:scale-110 transform transition duration-300 hover:rounded-md hover:border-none">Delete
                All</button>
        </div>
    </div>
    <div class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sm:rounded-lg mb-3 p-5">
        <p class="dark:text-gray-400 text-md">All USers: <span class="text-white font-bold">{{ $usersCount }}</span></p>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-10 py-3">
                        User
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Account Verification
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Last Login
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Created At
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Updated At
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 dark:bg">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @if($u->is_admin === 1 || $u->is_driver === 0)
                        <div class="flex flex-row gap-2 items-center">
                            <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <p>{{ $u->username }}</p>
                        </div>
                        @else
                        <div class="flex flex-row gap-2 items-center">
                            <img class="rounded-full object-cover w-10 h-10" src="{{ asset('storage/' . $u->profile)}}"
                                alt="">
                            @php
                            $fullname = trim("{$u->first_name} {$u->last_name}")
                            @endphp
                            <p>{{ $fullname }}</p>
                        </div>
                        @endif
                    </th>
                    <td class="px-10 py-4">
                        @if ($u->is_admin === NULL || $u->is_driver === NULL)
                        <div class="bg-indigo-100 p-1 px-4 rounded-md flex flex-row items-center justify-center">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-indigo-800 dark:text-indigo-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="text-xs text-indigo-800">Customer</span>
                            </div>
                        </div>
                        @elseif($u->is_admin === 1 || $u->is_driver === 0)
                        <div class="bg-blue-100 p-1 px-4 rounded-md flex flex-row items-center justify-center">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="text-xs text-blue-800">Administrator</span>
                            </div>

                        </div>
                        @elseif($u->is_admin === 0 || $u->is_driver === 1)
                        <div class="bg-teal-100 p-1 px-4 rounded-md flex flex-row items-center justify-center">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-teal-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M17 10v1.126c.367.095.714.24 1.032.428l.796-.797 1.415 1.415-.797.796c.188.318.333.665.428 1.032H21v2h-1.126c-.095.367-.24.714-.428 1.032l.797.796-1.415 1.415-.796-.797a3.979 3.979 0 0 1-1.032.428V20h-2v-1.126a3.977 3.977 0 0 1-1.032-.428l-.796.797-1.415-1.415.797-.796A3.975 3.975 0 0 1 12.126 16H11v-2h1.126c.095-.367.24-.714.428-1.032l-.797-.796 1.415-1.415.796.797A3.977 3.977 0 0 1 15 11.126V10h2Zm.406 3.578.016.016c.354.358.574.85.578 1.392v.028a2 2 0 0 1-3.409 1.406l-.01-.012a2 2 0 0 1 2.826-2.83ZM5 8a4 4 0 1 1 7.938.703 7.029 7.029 0 0 0-3.235 3.235A4 4 0 0 1 5 8Zm4.29 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h6.101A6.979 6.979 0 0 1 9 15c0-.695.101-1.366.29-2Z"
                                        clip-rule="evenodd" />
                                </svg>


                                <span class="text-xs text-teal-800">Driver</span>
                            </div>

                        </div>
                        @endif

                    </td>
                    <td class="px-10 py-4">
                        @if($u->last_login <= $date7daysago) <div class="flex flex-row gap-2 items-center">
                            <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                            <span>Inactive</span>
    </div>
    @elseif($u->last_login >= $date7daysago)
    <div class="flex flex-row gap-2 items-center">
        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
        <span>Active</span>
    </div>
    @endif
    </td>
    <td class="px-10 py-4 capitalize">
        @if($u->account_status === 'verified')
        <div class="bg-green-100 p-1 px-4 rounded-md flex fle-row items-center justify-center">
            <div class="flex items-center">
                <svg class="w-4 h-4 text-gray-800 dark:text-green-800" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 11.917 9.724 16.5 19 7.5" />
                </svg>

                <span class="text-green-800 text-xs">
                    {{ $u->account_status }}</span>
            </div>

        </div>
        @elseif($u->is_admin === 1 || $u->is_driver === 0)
        <div class="bg-blue-100 p-1 px-4 rounded-md flex fle-row items-center justify-center">
            <div class="flex items-center">
                <svg class="w-4 h-4 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                        clip-rule="evenodd" />
                </svg>

                <span class="text-xs text-blue-800">Administrator</span>
            </div>
        </div>
        @else
        <div class="bg-red-100 p-1 px-4 rounded-md flex fle-row items-center justify-center">
            <div class="flex items-center">
                <svg class="w-4 h-4 text-red-800" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 
         8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 
         10l4.293 4.293a1 1 0 01-1.414 
         1.414L10 11.414l-4.293 4.293a1 1 
         0 01-1.414-1.414L8.586 10 4.293 
         5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-xs text-red-800">{{ $u->account_status ?? 'Unverified'}}</span>
            </div>
        </div>
        @endif


    </td>
    <td class="px-10 py-4">
        {{ $u->last_login2 }}
    </td>
    <td class="px-10 py-4">
        {{ $u->created_at->format('F j, Y - h:i:s')}}
    </td>
    <td class="px-10 py-4">
        {{ $u->updated_at->format('F j, Y - h:i:s') }}
    </td>
    <td class="flex items-center px-6 py-4">
        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
        <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
    </td>
    </tr>
    @endforeach
    <tr
        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td colspan="9" class="px-10 py-4">{{ $users->links() }}</td>
    </tr>
    </tbody>
    </table>
    </div>


    <div class="mt-10 mb-5 flex justify-between">
        <div>
            <button class="bg-blue-800 text-white text-sm p-2.5 flex justify-center rounded-md">
                <div class="flex flex-row items-center gap-1">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    <span>Add New Car</span>
                </div>
            </button>
        </div>
        <div class="flex flex-row gap-0">
            <button
                class="bg-gray-700 text-white text-sm p-2.5 flex justify-center rounded-l-md cursor-pointer hover:scale-110 transform transition duration-300 hover:rounded-md hover:z-50">Suspend
                All</button>
            <button
                class="bg-gray-700 text-white text-sm p-2.5 flex justify-center border-l border-black cursor-pointer hover:scale-110 transform transition duration-300 hover:rounded-md hover:border-none hover:z-50">Archive
                All</button>
            <button
                class="bg-gray-700 text-white text-sm p-2.5 flex justify-center rounded-r-md border-l border-black cursor-pointer hover:scale-110 transform transition duration-300 hover:rounded-md hover:border-none">Delete
                All</button>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Car Name
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Car Price
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Driver
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Created At
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Updated At
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $c)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 dark:bg">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-6 py-4">
                        {{ $c->car_name}}
                    </th>
                    <td class="px-10 py-4">
                        {{ $c->car_price}}
                    </td>
                    <td class="px-10 py-4">
                        {{ $c->description}}
                    </td>
                    <td class="px-10 py-4">
                        {{ $c->image}}
                    </td>
                    <td class="px-10 py-4">
                        {{ $c->driver}}
                    </td>
                    <td class="px-10 py-4">
                        {{ $c->status }}
                    </td>
                    <td class="px-10 py-4">
                        {{ $c->created_at->format('F d, y - h:i:s') }}
                    </td>
                    <td class="px-10 py-4">
                        {{ $c->updated_at->format('F d, y - h:i:s') }}
                    </td>
                    <td class="flex items-center px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                    </td>
                </tr>
                @endforeach
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td colspan="10" class="px-10 py-4">{{ $users->links() }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</x-admin-layout>