<x-admin-layout>
    @php $grandTotal = 0; @endphp
    @foreach ($rents as $rent)
    @php
    $start = \Carbon\Carbon::parse($rent->rent_start_date);
    $end = \Carbon\Carbon::parse($rent->rent_end_date);
    $days = $start->diffInDays($end);
    $total = $days * $rent->car_price;
    $grandTotal += $total;
    @endphp
    @endforeach



    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <!-- Customers Card -->
        <div
            class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-12 h-12 bg-blue-100 dark:bg-blue-900/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-400 dark:text-blue-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Customers</p>
                            <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $count1 }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-600 dark:text-green-400 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                    12%
                </span>
                <span class="text-gray-500 dark:text-gray-400 ml-2">from last month</span>
            </div>
        </div>

        <!-- Orders Card -->
        <div
            class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-12 h-12 bg-green-100 dark:bg-green-900/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Orders</p>
                            <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $count2 }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-600 dark:text-green-400 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                    8%
                </span>
                <span class="text-gray-500 dark:text-gray-400 ml-2">from last month</span>
            </div>
        </div>

        <!-- Revenue Card -->
        <div
            class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-12 h-12 bg-purple-100 dark:bg-purple-900/20 rounded-lg flex items-center justify-center">


                            <svg fill="#c084fc" height="15px" width="15px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
                                <path id="XMLID_334_" d="M287.5,120.01h-21.077c0.705-4.904,1.077-9.914,1.077-15.01c0-5.089-0.371-10.093-1.074-14.99H287.5
	c8.284,0,15-6.716,15-15c0-8.284-6.716-15-15-15h-30.141C240.48,24.562,204.307,0,162.5,0c-0.208,0-0.416,0.004-0.623,0.013h-89.3
	c-0.026,0-0.051-0.004-0.077-0.004c-8.284,0-15,6.716-15,15v0.004V60.01h-15c-8.284,0-15,6.716-15,15c0,8.284,6.716,15,15,15h15v30
	h-15c-8.284,0-15,6.716-15,15c0,8.284,6.716,15,15,15h15V195v120c0,8.284,6.716,15,15,15s15-6.716,15-15V210h75
	c41.799,0,77.966-24.553,94.851-59.99H287.5c8.284,0,15-6.716,15-15C302.5,126.726,295.784,120.01,287.5,120.01z M87.5,30.013h75
	c0.19,0,0.38-0.003,0.568-0.011c24.256,0.181,45.803,11.94,59.394,30.008H87.5V30.013z M87.5,90.01h148.494
	c0.986,4.845,1.506,9.858,1.506,14.99c0,5.139-0.521,10.158-1.511,15.01H87.5V90.01z M162.5,180h-75v-29.99h134.951
	C208.754,168.208,186.98,180,162.5,180z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Revenue</p>
                            <p class="text-2xl font-semibold text-gray-900 dark:text-white">₱{{
                                number_format($grandTotal, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-red-600 dark:text-red-400 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 13l-5 5m0 0l-5-5m5 5V6"></path>
                    </svg>
                    3%
                </span>
                <span class="text-gray-500 dark:text-gray-400 ml-2">from last month</span>
            </div>
        </div>

        <!-- Active Users Card -->
        <div
            class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center justify-between">
                <div class="flex-1">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-12 h-12 bg-orange-100 dark:bg-orange-900/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Active Users</p>
                            <p class="text-2xl font-semibold text-gray-900 dark:text-white"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-600 dark:text-green-400 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>
                    18%
                </span>
                <span class="text-gray-500 dark:text-gray-400 ml-2">from last month</span>
            </div>
        </div>
    </div>
</x-admin-layout>