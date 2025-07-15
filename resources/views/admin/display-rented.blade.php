<x-admin-layout>
    @if($rents->count())


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        @foreach ($rents as $rent)
        <a href="rented/{{ $rent->id }}/admin">
            <div
                class="bg-gray-900 dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden transition transform hover:scale-105 duration-200">
                <div class="p-6 flex items-center space-x-5">

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


                    <div>
                        <div class="mb-2 text-sm text-gray-500 dark:text-gray-300">
                            Status:

                            @if($rent->status === 'approved')
                            <span class="font-semibold uppercase text-green-300">Approved</span>
                            @elseif($rent->status === 'done')
                            <span class="font-semibold uppercase text-green-300">Done</span>
                            @elseif($rent->status === 'declined')
                            <span class="font-semibold uppercase text-red-300">Declined</span>
                            @else
                            <span class="font-semibold uppercase text-yellow-300">Pending</span>
                            @endif



                        </div>

                        <div class="mb-2 text-sm text-gray-500 dark:text-gray-300">
                            Rented:

                            <span class="text-yellow-500 font-semibold uppercase">{{ $rent->car_name }}</span>



                        </div>

                        <div class="text-base font-semibold text-gray-900 dark:text-white">
                            @php
                                $fullname = trim("{$rent->customer_first_name} {$rent->customer_middle_name} {$rent->customer_last_name}
                                {$rent->customer_suffix}")
                            @endphp
                            <div><span class="font-normal text-sm text-gray-500 dark:text-gray-400">Name:</span><br>
                                {{ $fullname }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    @else
    <div class="flex-1 flex flex-col items-center justify-center">
        <div
            class="flex items-center p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 max-w-md w-full">
            <svg class="shrink-0 inline w-5 h-5 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div>
                <span class="font-medium">There are no active rentals at the moment.</span>
            </div>
        </div>
    </div>
    @endif
</x-admin-layout>