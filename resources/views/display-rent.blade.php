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
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{
                            $rent->car_name }}</h5>
                    </a>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-2 mt-5">Driver: @if(
                        $rent->driver === NULL)
                        <span class="dark:text-yellow-500">N/A</span>
                        @else
                        <span class="dark:text-yellow-500">{{ $rent->first_name }} {{ $rent->last_name }}</span>
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
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center bg-gray-900 text-white rounded-lg mt-4 cursor-not-allowed">
                            Cancel
                    </div>
                    </div>

                    @else
                    <div class="flex justify-end">
                        <div
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center bg-gray-900 text-white rounded-lg mt-4 cursor-not-allowed">
                            Cancel
                    </div>
                    </div>
                    @endif
                      </form>
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
</x-layout>