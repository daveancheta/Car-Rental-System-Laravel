<x-admin-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    @php
    $date7daysago = \Carbon\Carbon::now()->sub(7, 'days');
    @endphp

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
                        <div class="flex flex-row gap-2 items-center">
                            <img class="rounded-full object-cover w-10 h-10" src="{{ asset('storage/' . $u->profile)}}"
                                alt="">
                            @php
                            $fullname = trim("{$u->first_name} {$u->last_name}")
                            @endphp
                            <p>{{ $fullname }}</p>
                        </div>
                    </th>
                    <td class="px-10 py-4">
                        <div
                            class="dark:bg-indigo-100 dark:text-indigo-800 p-1 px-4 rounded-md flex flex-row items-center">
                            <svg class="w-4 h-4 text-indigo-800 dark:text-indigo-800" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <p class="text-xs">Customer</p>
                        </div>
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
        <div class="bg-green-100 p-1 px-4 rounded-md flex fle-row items-center">
            <svg class="w-4 h-4 text-gray-800 dark:text-green-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 11.917 9.724 16.5 19 7.5" />
            </svg>

            <span class="text-green-800 text-xs">
                {{ $u->account_status }}</span>
        </div>
        @else
        <div class="bg-red-100 p-1 px-4 rounded-md flex fle-row items-center">
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
    </tbody>
    </table>
    </div>

</x-admin-layout>