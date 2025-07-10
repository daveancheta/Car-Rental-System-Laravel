<x-layout>
    <x-tables.main-container>

        <x-tables.container>
            <x-tables.table>
                <x-tables.table-head>
                    <tr>
                        <x-tables.table-head-data>CRN Number</x-tables.table-head-data>
                        <x-tables.table-head-data>Car Name</x-tables.table-head-data>
                        <x-tables.table-head-data>Start Date</x-tables.table-head-data>
                        <x-tables.table-head-data>End Date</x-tables.table-head-data>
                        <x-tables.table-head-data>Rental Period</x-tables.table-head-data>
                        <x-tables.table-head-data>Daily Rate</x-tables.table-head-data>
                        <x-tables.table-head-data>Total Cost</x-tables.table-head-data>
                        <x-tables.table-head-data>Status</x-tables.table-head-data>
                        <x-tables.table-head-data>Action</x-tables.table-head-data>
                    </tr>
                </x-tables.table-head>
                <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach ($rents as $rent)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        @php
                        $start = \Carbon\Carbon::parse($rent->rent_start_date);
                        $end = \Carbon\Carbon::parse($rent->rent_end_date);
                        $days = $start->diffInDays($end);
                        $total = $days * $rent->car_price;
                        $grandTotal += $total;
                        @endphp

                        <x-tables.table-data> <a href="/rental/{{ $rent->crn_id }}/contract"
                                class="text-blue-500 hover:underline">{{ $rent->crn_id}}</a></x-tables.table-data>
                        <x-tables.table-data>{{ $rent->car_name}}</x-tables.table-data>
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

                                @else
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2 "></div> <span
                                    class="capitalize">{{ $rent->status}}</span>
                                @endif
                            </div>
                        </x-tables.table-data>
                        <x-tables.table-data>
                            @if($rent->status === 'pending')
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-yellow-500 hover:underline">Cancel</a>

                            @elseif($rent->status === 'declined')
                            <a href="#" class="font-medium text-blue-600 dark:text-red-500 hover:underline">Delete</a>

                            @else

                            <a data-tooltip-target="tooltip-left" type="button" data-tooltip-placement="left"
                                class="font-medium text-blue-600 dark:text-gray-500 cursor-pointer">Cancel</a>



                            <div id="tooltip-left" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                Approved rent cannot be canceled.
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                            @endif

                            </div>

                        </x-tables.table-data>
                    </tr>

                    @endforeach
                    <x-tables.table-row>
                        <td class="px-6 py-4 text-right" colspan="8">Grand Total:</td>
                        <td class="px-6 py-4 text-center" colspan="9">${{ number_format($grandTotal, 2) }}</td>
                    </x-tables.table-row>

                </tbody>
            </x-tables.table>
        </x-tables.container>

    </x-tables.main-container>







</x-layout>