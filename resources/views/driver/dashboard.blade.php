<x-driver-layout>


    @php
    $grandTotal = 0;
    $currentmonth = \Carbon\Carbon::now()->format('F');
    @endphp

    @foreach($driverRevenue as $dr)
    @php
    $start = \Carbon\Carbon::parse($dr->rent_start_date);
    $end = \Carbon\Carbon::parse($dr->rent_end_date);
    $days = $start->diffInDays($end);
    $total = $days * $dr->car_price;
    $grandTotal += $total;
    $driverCommision = $grandTotal * 0.20;
    @endphp
    @endforeach

    @php
    $grandTotaldrCM = 0;
    @endphp

    @foreach($dRCurrentMonth as $drCM)
    @php
    $startdrCM = \Carbon\Carbon::parse($drCM->rent_start_date);
    $enddrCM = \Carbon\Carbon::parse($drCM->rent_end_date);
    $daysdrCM = $startdrCM->diffInDays($enddrCM);
    $totaldrCM = $daysdrCM * $drCM->car_price;
    $grandTotaldrCM += $totaldrCM;
    $driverCommisiondrCM = $grandTotaldrCM * 0.20;
    @endphp
    @endforeach

    @php
        $grandTotaldrPM = 0;
    @endphp
    @foreach($dRPastMonth as $drPM)
    @php
    $startdrPM = \Carbon\Carbon::parse($drPM->rent_start_date);
    $enddrPM = \Carbon\Carbon::parse($drPM->rent_end_date);
    $daysdrPM = $startdrPM->diffInDays($enddrCM);
    $totaldrPM = $daysdrPM * $drPM->car_price;
    $grandTotaldrPM += $totaldrPM;
    $driverCommisiondrPM = $grandTotaldrPM * 0.20;
    @endphp
    @endforeach

    @php
        $sub = $driverCommisiondrCM - $driverCommisiondrPM;
        $div = $sub / $driverCommisiondrPM;
        $mul = $div * 100;
    @endphp

    <x-card.card-grid>
        <x-card.card>
            <x-card.card-group>
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/20 rounded-lg flex items-center justify-center">


                    <svg fill="#c084fc" height="15px" width="15px" version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 330 330" xml:space="preserve">
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
                    <x-card.card-text>Earnings</x-card.card-text>
                    <x-card.card-count>{{number_format($driverCommision, 2)}}</x-card.card-count>
                </div>
            </x-card.card-group>
        </x-card.card>

   

      <!-- Revenue Card -->
        <x-card.card>
            <x-card.card-group>
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/20 rounded-lg flex items-center justify-center">


                    <svg fill="#c084fc" height="15px" width="15px" version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 330 330" xml:space="preserve">
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
                    <x-card.card-text>Total Revenue (this {{
                        $currentmonth}})</x-card.card-text>
                    <x-card.card-count>₱{{
                        number_format($driverCommisiondrCM, 2) }}</x-card.card-count>
                </div>
                </div>

                <div class="mt-4 flex items-center text-sm">
                    @if (number_format($mul, 1) <= 1) <span class="text-red-600 dark:text-red-400 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 13l-5 5m0 0l-5-5m5 5V6"></path>
                        </svg>
                        {{abs(number_format($mul, 1))}}%
                        </span>
                        @else
                        <span class="text-green-600 dark:text-green-400 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                            </svg>
                            {{abs(number_format($mul, 1))}}%
                        </span>
                        @endif
                        <span class="text-gray-500 dark:text-gray-400 ml-2">from last month</span>
            </x-card.card-group>
        </x-card.card>
           </x-card.card-grid>
</x-driver-layout>