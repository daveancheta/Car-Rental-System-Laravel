<x-layout>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">

        @if($rents->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 gap-6">
            @foreach ($rents as $rent)

            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class=" relative">
                    <img src="{{ asset('storage/' . $rent->car_image) }}" alt="{{ $rent->car_name }}"
                        class="w-full h-48 object-fill rounded-t-xl" />
                    <div class="absolute top-3 left-3">
                        @if($rent->status == 'approved')
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium uppercase tracking-wide bg-green-100 text-green-800">{{
                            $rent->status }}</span>
                        @elseif($rent->status == 'done')
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium uppercase tracking-wide bg-green-100 text-green-800">{{
                            $rent->status }}</span>
                        @elseif($rent->status == 'declined')
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium uppercase tracking-wide bg-red-100 text-red-800">{{
                            $rent->status }}</span>
                        @else
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium uppercase tracking-wide bg-yellow-100 text-yelow-800">{{
                            $rent->status }}</span>
                        @endif
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex justify-between space-x-4">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{
                            $rent->car_name }}</h5>
                        <div class="flex flex-row gap-0 text-start justify-center">
                            <svg class="w-7 h-7 text-yellow-500 dark:text-yellow-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <span class="text-white font-bold">{{$rent->service_rate ?? '0'}}/5</span>

                        </div>
                    </div>

                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-2 mt-5">Driver: @if(
                        $rent->driver === NULL)
                        <span class="dark:text-yellow-500">N/A</span>
                        @else
                        <span class="dark:text-yellow-500">{{
                            $rent->first_name }} {{ $rent->last_name }}</span>
                        @endif
                    </p>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-2xl font-bold text-green-600 dark:text-green-400">₱{{
                            number_format($rent->car_price,
                            2)
                            }}<span class="text-sm text-gray-500 dark:text-gray-400">/per day</span>
                        </span>
                    </div>
                    <form action="user/{{ $rent->id }}" method="POST">
                        @csrf
                        @method('DELETE')

                        @if($rent->status === 'pending')
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center bg-yellow-100 text-yellow-800 rounded-lg mt-4 cursor-pointer">
                                Cancel
                            </button>
                        </div>


                        @elseif($rent->status === 'declined')
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center bg-red-100 text-red-800 rounded-lg mt-4 cursor-pointer">
                                Delete
                            </button>
                        </div>

                        @elseif($rent->status === 'approved')

                        <div class="flex justify-end">
                            <div
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center bg-gray-900 text-white rounded-lg mt-4 cursor-not-allowed select-none">
                                Cancel
                            </div>
                        </div>

                        @else
                        <div class="flex justify-end space-x-4">
                            @if($rent->service_rate !== NULL)
                            @else
                            <button type="button" data-modal-target="rate-{{ $rent->id }}"
                                data-modal-toggle="rate-{{ $rent->id }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center bg-yellow-100 text-yellow-900 rounded-lg mt-4 cursor-pointer">
                                Rate
                            </button>
                            @endif
                            <div
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center bg-gray-900 text-white rounded-lg mt-4 cursor-not-allowed select-none">
                                Cancel
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Large Modal -->
            <div id="rate-{{ $rent->id }}" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-4xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                {{ $rent->id }}
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="rate-{{ $rent->id }}" id="clear-rating-{{ $rent->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <div class="p-5 flex flex-col gap-4">
                                <span class="text-white">Please rate your experience with our service and
                                    vehicle.</span>
                                <div class="flex flex-row gap-1">
                                    <form id="rate-submit-1-{{$rent->id}}" action="/submit-{{$rent->id}}-service-rate"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input id="input-1-{{$rent->id}}" type="hidden" name="service_rate" value="1">
                                        <button type="button" id="starone-{{ $rent->id }}"
                                            class="w-8 h-8 text-gray-500 cursor-pointer">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </button>
                                    </form>

                                    <form id="rate-submit-2-{{$rent->id}}" action="/submit-{{$rent->id}}-service-rate"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input id="input-2-{{$rent->id}}" type="hidden" name="service_rate" value="2">
                                        <button type="button" id="startwo-{{ $rent->id }}"
                                            class="w-8 h-8 text-gray-500 cursor-pointer">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </button>
                                    </form>

                                    <form id="rate-submit-3-{{$rent->id}}" action="/submit-{{$rent->id}}-service-rate" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input id="input-3-{{$rent->id}}" type="hidden" name="service_rate" value="3">
                                        <button type="button" id="starthree-{{ $rent->id }}"
                                            class="w-8 h-8 text-gray-500 cursor-pointer">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </button>
                                    </form>

                                    <form id="rate-submit-4-{{$rent->id}}" action="/submit-{{$rent->id}}-service-rate" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input id="input-4-{{$rent->id}}" type="hidden" name="service_rate" value="4">
                                        <button type="button" id="starfour-{{ $rent->id }}"
                                            class="w-8 h-8 text-gray-500 cursor-pointer">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </button>
                                    </form>

                                    <form id="rate-submit-5-{{$rent->id}}" action="/submit-{{$rent->id}}-service-rate" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input id="input-5-{{$rent->id}}" type="hidden" name="service_rate" value="5">
                                        <button type="button" id="starfive-{{ $rent->id }}"
                                            class="w-8 h-8 text-gray-500 cursor-pointer">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </button>
                                    </form>

                                </div>

                                @if ($rent->driver === NULL)
                                @else
                                <div class="flex flex-col gap-4">
                                    <span class="text-white">Please rate your experience with our Driver <span
                                            class="text-yellow-500">({{ $rent->first_name}} {{
                                            $rent->last_name}})</span>.</span>
                                    <div class="flex flex-row gap-1">
                                        <button type="button" id="starone2-{{ $rent->id }}"
                                            class="w-8 h-8 text-gray-500 cursor-pointer">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </button>

                                        <button type="button" id="startwo2-{{ $rent->id }}"
                                            class="w-8 h-8 text-gray-500 cursor-pointer">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </button>

                                        <button type="button" id="starthree2-{{ $rent->id }}"
                                            class="w-8 h-8 text-gray-500 cursor-pointer">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </button>

                                        <button type="button" id="starfour2-{{ $rent->id }}"
                                            class="w-8 h-8 text-gray-500 cursor-pointer">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </button>

                                        <button type="button" id="starfive2-{{ $rent->id }}"
                                            class="w-8 h-8 text-gray-500 cursor-pointer">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        </button>
                                        


                                    </div>
                                </div>
                                @endif
                            </div>

                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">

                             <button id="default-button-{{$rent->id}}" data-modal-hide="large-modal" type="button"
                                  class="font-medium text-sm px-5 py-2.5 text-center bg-gray-900 text-white rounded-lg mt-4 cursor-not-allowed select-none">Submit</button>

                            <button form="rate-submit-1-{{$rent->id}}" data-modal-hide="large-modal" type="submit"
                                id="rating-{{ $rent->id }}-1"
                                class="hidden font-medium text-sm px-5 py-2.5 text-center bg-yellow-100 text-yellow-900 text-white rounded-lg mt-4">Submit</button>

                            <button form="rate-submit-2-{{$rent->id}}" data-modal-hide="large-modal" type="submit"
                                id="rating-{{ $rent->id }}-2"
                                class="hidden font-medium text-sm px-5 py-2.5 text-center bg-yellow-100 text-yellow-900 text-white rounded-lg mt-4">Submit</button>

                            <button form="rate-submit-3-{{$rent->id}}" data-modal-hide="large-modal" type="submit"
                                id="rating-{{ $rent->id }}-3"
                                class="hidden font-medium text-sm px-5 py-2.5 text-center bg-yellow-100 text-yellow-900 text-white rounded-lg mt-4">Submit</button>

                                   <button form="rate-submit-4-{{$rent->id}}" data-modal-hide="large-modal" type="submit"
                            id="rating-{{ $rent->id }}-4" 
                                class="hidden font-medium text-sm px-5 py-2.5 text-center bg-yellow-100 text-yellow-900 text-white rounded-lg mt-4">Submit</button>

                                   <button form="rate-submit-5-{{$rent->id}}" data-modal-hide="large-modal" type="submit"
                            id="rating-{{ $rent->id }}-5" 
                                class="hidden font-medium text-sm px-5 py-2.5 text-center bg-yellow-100 text-yellow-900 text-white rounded-lg mt-4">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
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
                <span class="font-medium">You haven’t rented any cars yet.</span>
            </div>
        </div>
    </div>
    @endif

    <script>
        const modalid = document.querySelectorAll( "[id^='rate-']" )

        modalid.forEach(modal => {
              const id = modal.id.split('-')[1];
        
        const starone = document.getElementById(`starone-${id}`);
        const startwo = document.getElementById(`startwo-${id}`); 
        const starthree = document.getElementById(`starthree-${id}`);
        const starfour = document.getElementById(`starfour-${id}`);
        const starfive = document.getElementById(`starfive-${id}`);
        const clear = document.getElementById(`clear-rating-${id}`);  
        const rateSubmit1 = document.getElementById(`rating-${id}-1`);  
        const rateSubmit2 = document.getElementById(`rating-${id}-2`);  
        const rateSubmit3 = document.getElementById(`rating-${id}-3`);  
        const rateSubmit4 = document.getElementById(`rating-${id}-4`);  
        const rateSubmit5 = document.getElementById(`rating-${id}-5`); 
        const defaultSubmit = document.getElementById(`default-button-${id}`);
        

    
        if (starone) {
            starone.addEventListener('click', function() {
            starone.classList.add('text-yellow-500');
            starone.classList.remove('text-gray-500');
            startwo.classList.remove('text-yellow-500');
            starthree.classList.remove('text-yellow-500');
            starfour.classList.remove('text-yellow-500');
            starfive.classList.remove('text-yellow-500');
            startwo.classList.add('text-gray-500');
            starthree.classList.add('text-gray-500');
            starfour.classList.add('text-gray-500');
            starfive.classList.add('text-gray-500');
            rateSubmit1.classList.remove('hidden');
            rateSubmit2.classList.add('hidden');
            rateSubmit3.classList.add('hidden');
            rateSubmit4.classList.add('hidden');
            rateSubmit5.classList.add('hidden');
            defaultSubmit.classList.add('hidden')
            });
        }

          if (startwo) {
            startwo.addEventListener('click', function() {
            starone.classList.add('text-yellow-500');
            startwo.classList.add('text-yellow-500');
            starthree.classList.remove('text-yellow-500');
            starfour.classList.remove('text-yellow-500');
            starfive.classList.remove('text-yellow-500');
            starthree.classList.add('text-gray-500');
            starfour.classList.add('text-gray-500');
            starfive.classList.add('text-gray-500');
            rateSubmit1.classList.add('hidden');
            rateSubmit2.classList.remove('hidden');
            rateSubmit3.classList.add('hidden');
            rateSubmit4.classList.add('hidden');
            rateSubmit5.classList.add('hidden');
             defaultSubmit.classList.add('hidden')
            });
        }

         if (starthree) {
            starthree.addEventListener('click', function() {
            starone.classList.add('text-yellow-500');
            startwo.classList.add('text-yellow-500');
            starthree.classList.add('text-yellow-500');
            starthree.classList.remove('text-gray-500');
            starfour.classList.remove('text-yellow-500');
            starfive.classList.remove('text-yellow-500');
            starfour.classList.add('text-gray-500');
            starfive.classList.add('text-gray-500');
              rateSubmit1.classList.add('hidden');
            rateSubmit2.classList.add('hidden');
            rateSubmit3.classList.remove('hidden');
            rateSubmit4.classList.add('hidden');
            rateSubmit5.classList.add('hidden');
             defaultSubmit.classList.add('hidden')
            });
        }

         if (starfour) {
            starfour.addEventListener('click', function() {
            starone.classList.add('text-yellow-500');
            startwo.classList.add('text-yellow-500');
            starthree.classList.add('text-yellow-500');
            starfour.classList.add('text-yellow-500');
            starfour.classList.remove('text-gray-500');
            starthree.classList.remove('text-gray-500');
            starfive.classList.remove('text-yellow-500');
            starfive.classList.add('text-gray-500');
              rateSubmit1.classList.add('hidden');
            rateSubmit2.classList.add('hidden');
            rateSubmit3.classList.add('hidden');
            rateSubmit4.classList.remove('hidden');
            rateSubmit5.classList.add('hidden');
             defaultSubmit.classList.add('hidden')
            });
        }

         if (starfive) {
            starfive.addEventListener('click', function() {
            starone.classList.add('text-yellow-500');
            startwo.classList.add('text-yellow-500');
            starthree.classList.add('text-yellow-500');
            starfour.classList.add('text-yellow-500');
            starfour.classList.remove('text-gray-500');
            starfive.classList.add('text-yellow-500');
            starfive.classList.remove('text-gray-500');
              rateSubmit1.classList.add('hidden');
            rateSubmit2.classList.add('hidden');
            rateSubmit3.classList.add('hidden');
            rateSubmit4.classList.add('hidden');
            rateSubmit5.classList.remove('hidden');
             defaultSubmit.classList.add('hidden')
            });
        }
         if (clear) {
            clear.addEventListener('click', function() {
            starone.classList.remove('text-yellow-500');
            startwo.classList.remove('text-yellow-500');
            starthree.classList.remove('text-yellow-500');
            starfour.classList.remove('text-yellow-500');
            starfour.classList.remove('text-yellow-500');
            starfive.classList.remove('text-yellow-500');
            starone.classList.add('text-gray-500');
            startwo.classList.add('text-gray-500');
            starthree.classList.add('text-gray-500');
            starfour.classList.add('text-gray-500');
            starfive.classList.add('text-gray-500');
              rateSubmit1.classList.add('hidden');
            rateSubmit2.classList.add('hidden');
            rateSubmit3.classList.add('hidden');
            rateSubmit4.classList.add('hidden');
            rateSubmit5.classList.add('hidden');
            });
        }
        });

          modalid.forEach(modal => {
              const id = modal.id.split('-')[1];
        
        const starone2 = document.getElementById(`starone2-${id}`);
        const startwo2 = document.getElementById(`startwo2-${id}`); 
        const starthree2 = document.getElementById(`starthree2-${id}`);
        const starfour2 = document.getElementById(`starfour2-${id}`);
        const starfive2 = document.getElementById(`starfive2-${id}`);
        const clear = document.getElementById(`clear-rating-${id}`);
    
        if (starone2) {
            starone2.addEventListener('click', function() {
            starone2.classList.add('text-yellow-500');
            starone2.classList.remove('text-gray-500');
            startwo2.classList.remove('text-yellow-500');
            starthree2.classList.remove('text-yellow-500');
            starfour2.classList.remove('text-yellow-500');
            starfive2.classList.remove('text-yellow-500');
            startwo2.classList.add('text-gray-500');
            starthree2.classList.add('text-gray-500');
            starfour2.classList.add('text-gray-500');
            starfive2.classList.add('text-gray-500');
            });
        }

          if (startwo2) {
            startwo2.addEventListener('click', function() {
            starone2.classList.add('text-yellow-500');
            startwo2.classList.add('text-yellow-500');
            starthree2.classList.remove('text-yellow-500');
            starfour2.classList.remove('text-yellow-500');
            starfive2.classList.remove('text-yellow-500');
            starthree2.classList.add('text-gray-500');
            starfour2.classList.add('text-gray-500');
            starfive2.classList.add('text-gray-500');
            });
        }

         if (starthree2) {
            starthree2.addEventListener('click', function() {
            starone2.classList.add('text-yellow-500');
            startwo2.classList.add('text-yellow-500');
            starthree2.classList.add('text-yellow-500');
            starthree2.classList.remove('text-gray-500');
            starfour2.classList.remove('text-yellow-500');
            starfive2.classList.remove('text-yellow-500');
            starfour2.classList.add('text-gray-500');
            starfive2.classList.add('text-gray-500');
            });
        }

         if (starfour2) {
            starfour2.addEventListener('click', function() {
            starone2.classList.add('text-yellow-500');
            startwo2.classList.add('text-yellow-500');
            starthree2.classList.add('text-yellow-500');
            starfour2.classList.add('text-yellow-500');
            starfour2.classList.remove('text-gray-500');
            starthree2.classList.remove('text-gray-500');
            starfive2.classList.remove('text-yellow-500');
            starfive2.classList.add('text-gray-500');
            });
        }

         if (starfive2) {
            starfive2.addEventListener('click', function() {
            starone2.classList.add('text-yellow-500');
            startwo2.classList.add('text-yellow-500');
            starthree2.classList.add('text-yellow-500');
            starfour2.classList.add('text-yellow-500');
            starfour2.classList.remove('text-gray-500');
            starfive2.classList.add('text-yellow-500');
            starfive2.classList.remove('text-gray-500');
            });
        }
         if (clear) {
            clear.addEventListener('click', function() {
            starone2.classList.remove('text-yellow-500');
            startwo2.classList.remove('text-yellow-500');
            starthree2.classList.remove('text-yellow-500');
            starfour2.classList.remove('text-yellow-500');
            starfour2.classList.remove('text-yellow-500');
            starfive2.classList.remove('text-yellow-500');
            starone2.classList.add('text-gray-500');
            startwo2.classList.add('text-gray-500');
            starthree2.classList.add('text-gray-500');
            starfour2.classList.add('text-gray-500');
            starfive2.classList.add('text-gray-500');
            });
        }
        });


    </script>
</x-layout>