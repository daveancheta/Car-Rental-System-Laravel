<x-admin-layout>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        @foreach ($rents as $rent)
        <a href="users/{{ $rent->crn_id }}/admin">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden transition transform hover:scale-105 duration-200">
                <div class="p-6 flex items-center space-x-5">
                    {{-- Profile Image --}}
                    @if($rent->customer_profile === NULL)
                        <div class="w-24 h-24 flex items-center justify-center bg-gray-200 dark:bg-gray-700 rounded-full">
                            <svg class="w-12 h-12 text-gray-500 dark:text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    @else
                        <img src="{{ asset('storage/' . $rent->customer_profile) }}" alt="Profile"
                             class="w-24 h-24 object-cover rounded-full border border-gray-300 dark:border-gray-600">
                    @endif

                    {{-- Info Section --}}
                    <div>
                        <div class="mb-2 text-sm text-gray-500 dark:text-gray-300">
                            Rented:
                           
                                <span class="text-yellow-600 font-semibold uppercase">{{ $rent->car_name }}</span>
                          
                            
                         
                        </div>

                        <div class="text-base font-semibold text-gray-900 dark:text-white">
                      
                                <div><span class="font-normal text-sm text-gray-500 dark:text-gray-400">Name:</span><br>
                                {{ $rent->customer_first_name }} {{ $rent->customer_middle_name }} {{ $rent->customer_last_name }}</div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        @endforeach
    </div>
</x-admin-layout>
