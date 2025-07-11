<x-admin-layout>
    @php $grandTotal = 0; @endphp
    @php
    $start = \Carbon\Carbon::parse($rent->rent_start_date);
    $end = \Carbon\Carbon::parse($rent->rent_end_date);
    $days = $start->diffInDays($end);
    $total = $days * $rent->car_price;
    $grandTotal += $total;
    @endphp

    <div class="min-h-screen bg-gray-50 dark:bg-gray-800 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

          
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Rental Agreement</h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Car Reference Nnumber: {{ $rent->crn_id }}</p>
            </div>

            
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

                
                <div class="xl:col-span-2 space-y-6">

                    
                    <div
                        class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $rent->car_image) }}" alt="{{ $rent->car_name }}"
                                class="w-full h-80 object-cover">
                            <div class="absolute top-4 right-4">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium uppercase tracking-wide
                            {{ $rent->status === 'approved' ? 'bg-green-100 text-green-800' : 
                               ($rent->status === 'declined' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">

                                    {{ ucfirst($rent->status) }}
                                </span>
                            </div>
                        </div>

                        <div class="p-8">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">{{ $rent->car_name }}</h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-4">
                                    <div
                                        class="flex items-center justify-between py-3 border-b border-gray-200 dark:border-gray-700">
                                        <span class="text-gray-600 dark:text-gray-400 font-medium">Rental Period</span>
                                        <span class="text-gray-900 dark:text-white font-semibold">{{ $days }}
                                            day(s)</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-between py-3 border-b border-gray-200 dark:border-gray-700">
                                        <span class="text-gray-600 dark:text-gray-400 font-medium">Daily Rate</span>
                                        <span class="text-gray-900 dark:text-white font-semibold">₱{{
                                            number_format($rent->car_price, 2) }}</span>
                                    </div>
                                    <div class="flex items-center justify-between py-3 dark:border-gray-700">


                                        <select id="underline_select"
                                            class="block py-2 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-600 appearance-none dark:text-gray-400 dark:border-gray-600 
                                            focus:outline-none focus:ring-0 focus:border-gray-200 peer font-medium">

                                            <option class="dark:bg-gray-600 dark:text-white" value="pending" {{ $rent->status == 'pending' ? 'selected' :
                                                ''}}>Pending</option>
                                            <option class="dark:bg-gray-600 dark:text-white" value="approved" {{ $rent->status == 'approved' ? 'selected' :
                                                ''}}>Approved</option>
                                            <option class="dark:bg-gray-600 dark:text-white" value="declined">Declined</option>
                                        </select>


                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div
                                        class="flex items-center justify-between py-3 border-b border-gray-200 dark:border-gray-700">
                                        <span class="text-gray-600 dark:text-gray-400 font-medium">Start Date</span>
                                        <span class="text-gray-900 dark:text-white font-semibold">{{ $start->format('M
                                            j, Y') }}</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-between py-3 border-b border-gray-200 dark:border-gray-700">
                                        <span class="text-gray-600 dark:text-gray-400 font-medium">End Date</span>
                                        <span class="text-gray-900 dark:text-white font-semibold">{{ $end->format('M j,
                                            Y') }}</span>
                                    </div>
                                </div>
                            </div>

                         
                            <div
                                class="mt-8 bg-gradient-to-r from-green-50 to-blue-50 dark:from-green-900/20 dark:to-blue-900/20 rounded-xl p-6 border border-green-200 dark:border-green-800">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Total Rental
                                            Cost</h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $days }} days × ₱{{
                                            number_format($rent->car_price, 2) }}</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-3xl font-bold text-green-600 dark:text-green-400">₱{{
                                            number_format($total, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

              
                <div class="xl:col-span-1">
                    <div
                        class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-500 to-purple-600 px-8 py-6">
                            <h2 class="text-xl font-bold text-white">Customer Information</h2>
                        </div>

                        <div class="p-8">
                          
                            <div class="text-center mb-8">
                                <img src="{{ asset('storage/' . $rent->customer_profile) }}" alt="Customer Profile"
                                    class="w-24 h-24 object-cover rounded-full mx-auto border-4 border-white dark:border-gray-700 shadow-lg">
                                <h3 class="mt-4 text-xl font-semibold text-gray-900 dark:text-white">
                                    {{ $rent->customer_first_name }} {{ $rent->customer_middle_name }} {{
                                    $rent->customer_last_name }} {{ $rent->customer_suffix }}
                                </h3>
                            </div>

                         
                            <div class="space-y-4 mb-8">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Email</p>
                                        <p class="text-gray-900 dark:text-white font-medium">{{ $rent->customer_email }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Phone</p>
                                        <p class="text-gray-900 dark:text-white font-medium">{{ $rent->customer_phone }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                          
                            <div class="space-y-4 mb-8">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Address Details</h4>

                                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4 space-y-3">
                                    <div>
                                        <span class="text-sm text-gray-600 dark:text-gray-400">Region:</span>
                                        <span class="ml-2 text-gray-900 dark:text-white font-medium" id="region-name"
                                            data-code="{{ $rent->customer_region }}">Loading...</span>
                                    </div>
                                    <div>
                                        <span class="text-sm text-gray-600 dark:text-gray-400">City:</span>
                                        <span class="ml-2 text-gray-900 dark:text-white font-medium" id="city-name"
                                            data-code="{{ $rent->customer_city }}">Loading...</span>
                                    </div>
                                    <div>
                                        <span class="text-sm text-gray-600 dark:text-gray-400">Barangay:</span>
                                        <span class="ml-2 text-gray-900 dark:text-white font-medium">{{
                                            $rent->customer_barangay }}</span>
                                    </div>
                                    @if($rent->customer_additional_address)
                                    <div>
                                        <span class="text-sm text-gray-600 dark:text-gray-400">House No. / Street:</span>
                                        <span class="ml-2 text-gray-900 dark:text-white font-medium">{{
                                            $rent->customer_additional_address }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>

                           
                            <div>
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Valid ID</h4>
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                                    <img src="{{ asset('storage/' . $rent->customer_valid_id_photo) }}" alt="Valid ID"
                                        class="w-full rounded-lg shadow-md border border-gray-200 dark:border-gray-600 hover:shadow-lg transition-shadow duration-200">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function () {
            const cityCode = $('#city-name').attr('data-code');
            const regionCode = $('#region-name').attr('data-code');

            // Add loading animation
            $('#city-name, #region-name').html('<span class="inline-flex items-center"><svg class="animate-spin h-4 w-4 mr-2" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Loading...</span>');

            $.getJSON('/ph-json/city.json', function (cityData) {
                const city = cityData.find(c => c.city_code === cityCode);
                $('#city-name').text(city ? city.city_name : 'Unknown City');
            }).fail(function() {
                $('#city-name').text('Error loading city');
            });

            $.getJSON('/ph-json/region.json', function (regionData) {
                const region = regionData.find(r => r.region_code === regionCode);
                $('#region-name').text(region ? region.region_name : 'Unknown Region');
            }).fail(function() {
                $('#region-name').text('Error loading region');
            });
        });
    </script>
</x-admin-layout>