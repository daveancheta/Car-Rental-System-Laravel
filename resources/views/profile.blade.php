<x-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div
            class="max-w-2xl mx-auto bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 shadow rounded-lg p-8">

            <div class="flex items-center space-x-6 mb-6">
                @if (Auth::user()->profile === NULL)
                <div
                    class="w-24 h-24 flex items-center justify-center bg-gray-200 dark:bg-gray-700 rounded-full select-none">
                    <svg class="w-12 h-12 text-gray-500 dark:text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                @else
                <img class="w-24 h-24 rounded-full object-cover border border-gray-400 dark:border-gray-600 select-none"
                    src="{{ asset('storage/' . Auth::user()->profile) }}" alt="{{ Auth::user()->first_name }}">
                @endif

                <div>
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white tracking-wide select-none">
                        {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }} {{
                        Auth::user()->suffix }}
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 select-none">Registered User</p>
                    @if(Auth::user()->account_status === NULL)
                    <span class="text-xs text-red-600 dark:text-red-400">Not Verified <span class="text-white">-</span>
                        <a href="/users/{{ Auth::user()->id }}/edit" class="text-blue-500 cursor-pointer"> Verify
                            Now</a></span>
                    @else
                    <span
                        class="inline-flex items-center mt-2 bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full select-none">
                        <svg class="w-6 h-6 text-green-800 dark:text-green-900 dark:bg-" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 11.917 9.724 16.5 19 7.5" />
                        </svg>

                        Verified</span>
                    @endif
                </div>
            </div>

            <div class="flex justify-between px-4 text-white text-xs cursor-pointer">
                <div><a href="/users/{{ Auth::user()->id }}/profile">Edit Profile</a></div>
                <div><a href="/display">View Rents</a></div>
                <div><a href="">Chat Bot</a></div>
            </div>
            <hr class="my-4 border-gray-300 dark:border-gray-600" />

            <div class="grid grid-cols-1 gap-4 text-sm text-gray-700 dark:text-gray-200">
                <div class="flex justify-between select-none">
                    <span class="font-semibold">Full Name:</span>
                    <span>{{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} {{ Auth::user()->last_name
                        }}</span>
                </div>
                <div class="flex justify-between select-none">
                    <span class="font-semibold">Email:</span>
                    <span>{{ Auth::user()->email }}</span>
                </div>
                <div class="flex justify-between select-none">
                    <span class="font-semibold">Phone:</span>
                    <span>{{ Auth::user()->phone }}</span>

                </div>
                <div class="flex justify-between select-none">
                    <span class="font-semibold">Region:</span>
                    @if(Auth::user()->account_status === NULL)
                    <span class="text-xs text-red-600 dark:text-red-400">Not Verified</span>
                    @else
                    <span id="region-name" data-code="{{ Auth::user()->region }}"></span>
                    @endif
                </div>
                <div class="flex justify-between select-none">
                    <span class="font-semibold">City:</span>
                    @if(Auth::user()->account_status === NULL)
                    <span class="text-xs text-red-600 dark:text-red-400">Not Verified</span>
                    @else
                    <span id="city-name" data-code="{{ Auth::user()->city }}"></span>

                    @endif
                </div>
                <div class="flex justify-between select-none">
                    <span class="font-semibold">Barangay:</span>
                    @if(Auth::user()->account_status === NULL)
                    <span class="text-xs text-red-600 dark:text-red-400">Not Verified</span>
                    @else
                    <span>{{ Auth::user()->barangay }}</span>
                    @endif
                </div>
                <div class="flex justify-between select-none">
                    <span class="font-semibold">House No. / Street Name</span>
                    @if(Auth::user()->account_status === NULL)
                    <span class="text-xs text-red-600 dark:text-red-400">Not Verified</span>
                    @else
                    <span>{{ Auth::user()->additional_address }}</span>
                    @endif
                </div>

                <div class="flex justify-between select-none">
                    <span class="font-semibold">Digital Id</span>
                    @if(Auth::user()->account_status === NULL)
                    <span class="text-xs text-red-600 dark:text-red-400">Not Verified</span>
                    @else
                    <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                        class="underline cursor-pointer select-none">View Your Digital Id</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    <div id="default-modal" tabindex="-1" data-modal-backdrop="static" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">

            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">

                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Digital Id
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <div class="p-4 md:p-5 space-y-4 justify-center items-center">
                    <img src="{{ asset('storage/' . Auth::user()->valid_id_photo) }}" alt="">
                </div>

                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(function () {
    const cityCode = $('#city-name').attr('data-code'); 
    $.getJSON('/ph-json/city.json', cityData => {
      const city = cityData.find(c => c.city_code === cityCode);
      $('#city-name').text(city ? city.city_name : 'Unknown City');
    });
  });

    $(function () {
    const regionCode = $('#region-name').attr('data-code');
    $.getJSON('/ph-json/region.json', regionData => {
      const region = regionData.find(r => r.region_code === regionCode);
      $('#region-name').text(region ? region.region_name : 'Unknown Region');
    });
  });
    </script>


</x-layout>