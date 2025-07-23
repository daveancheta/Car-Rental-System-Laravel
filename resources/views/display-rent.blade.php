<x-layout>





    <x-tables.main-container>

        <x-tables.container>
            <x-tables.table>
                <x-tables.table-head>
                    <tr>
                        <x-tables.table-head-data>CRN Number</x-tables.table-head-data>
                        <x-tables.table-head-data>Car Name</x-tables.table-head-data>
                        <x-tables.table-head-data>Driver</x-tables.table-head-data>
                        <x-tables.table-head-data>Start Date</x-tables.table-head-data>
                        <x-tables.table-head-data>End Date</x-tables.table-head-data>
                        <x-tables.table-head-data>Rental Period</x-tables.table-head-data>
                        <x-tables.table-head-data>Daily Rate</x-tables.table-head-data>
                        <x-tables.table-head-data>Total Cost</x-tables.table-head-data>
                        <x-tables.table-head-data>Status</x-tables.table-head-data>
                        <x-tables.table-head-data>Rate</x-tables.table-head-data>
                        <x-tables.table-head-data>Action</x-tables.table-head-data>
                    </tr>
                </x-tables.table-head>
                <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach ($rents as $rent)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        @php
                        $start = \Carbon\Carbon::parse($rent->rent_start_date);
                        $end = \Carbon\Carbon::parse($rent->rent_end_date);
                        $days = $start->diffInDays($end);
                        $total = $days * $rent->car_price;
                        $grandTotal += $total;
                        @endphp

                        <x-tables.table-data> <a href="/rental/{{ $rent->id }}/contract"
                                class="text-blue-500 hover:underline">{{ $rent->crn_id}}</a></x-tables.table-data>
                        <x-tables.table-data>{{ $rent->car_name}}</x-tables.table-data>
                        <x-tables.table-data>

                         {{ $rent->first_name }} {{ $rent->last_name}}





                        </x-tables.table-data>
                        <x-tables.table-data>{{ $start->format('M j, Y') }}</x-tables.table-data>
                        <x-tables.table-data>{{ $end->format('M j, Y') }}</x-tables.table-data>
                        <x-tables.table-data>{{ $days }}</x-tables.table-data>
                        <x-tables.table-data>${{ number_format($rent->car_price, 2) }}</x-tables.table-data>
                        <x-tables.table-data class="px-6 py-4 text-center">${{ number_format($total, 2) }}
                        </x-tables.table-data>

                        <x-tables.table-data>
                            <div class="flex items-center">
                                @if($rent->status === 'pending')
                                <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 me-2 "></div> <span
                                    class="capitalize">{{ $rent->status}}</span>


                                @elseif($rent->status === 'approved')
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2 "></div> <span
                                    class="capitalize">{{ $rent->status}}</span>

                                @elseif($rent->status === 'done')
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2 "></div> <span
                                    class="capitalize">{{ $rent->status}}</span>

                                @else
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2 "></div> <span
                                    class="capitalize">{{ $rent->status}}</span>
                                @endif
                            </div>
                        </x-tables.table-data>

                        <x-tables.table-data>
                            <div class="flex items-center justify-center gap-1">
                                @if($rent->star === NULL)
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-600"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-600"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-600"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-600"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-600"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>





                                @elseif($rent->star === 1)
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-800 dark:text-yellow-600" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-600"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-600"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-600"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-600"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                @elseif($rent->star === 2)
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-800 dark:text-yellow-600" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-800 dark:text-yellow-600" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-600"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-600"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-600"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                @elseif($rent->star === 3)
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-800 dark:text-yellow-600" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-800 dark:text-yellow-600" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-800 dark:text-yellow-600" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-600"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-600"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>

                                @elseif($rent->star === 4)
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-800 dark:text-yellow-600" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-800 dark:text-yellow-600" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-800 dark:text-yellow-600" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-800 dark:text-yellow-600" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800 dark:text-gray-600"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                @elseif($rent->star === 5)
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-800 dark:text-yellow-600" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-800 dark:text-yellow-600" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-800 dark:text-yellow-600" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-800 dark:text-yellow-600" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-gray-800 dark:text-yellow-600" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                @endif
                            </div>
                        </x-tables.table-data>

                        <x-tables.table-data>
                            <form id="delete-rented" action="user/{{ $rent->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                            @if($rent->status === 'pending')
                            <button form="delete-rented" type="submit"
                                class="font-medium text-blue-600 dark:text-yellow-500 hover:underline cursor-pointer">Cancel</button>

                            @elseif($rent->status === 'declined')
                            <button form="delete-rented" type="submit"
                                class="font-medium text-blue-600 dark:text-red-500 hover:underline cursor-pointer">Delete</button>

                            @elseif($rent->status === 'approved')

                            <a data-tooltip-target="tooltip-approved" type="button" data-tooltip-placement="left"
                                class="font-medium text-blue-600 dark:text-gray-500 cursor-default">Cancel</a>

                            @else
                            <a data-tooltip-target="tooltip-done" type="button" data-tooltip-placement="left"
                                class="font-medium text-blue-600 dark:text-gray-500 cursor-default">Cancel</a>
                            @endif

                            </div>

                        </x-tables.table-data>
                    </tr>

                    @endforeach
                    <x-tables.table-row>
                        <td class="px-6 py-4 text-right" colspan="10">Grand Total:</td>
                        <td class="px-6 py-4 text-center" colspan="11">${{ number_format($grandTotal, 2) }}</td>
                    </x-tables.table-row>

                </tbody>
            </x-tables.table>
        </x-tables.container>

    </x-tables.main-container>







</x-layout>