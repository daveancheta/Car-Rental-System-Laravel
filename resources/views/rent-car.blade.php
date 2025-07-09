<x-layout>

  @guest
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
    <div class="flex items-center p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
      <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
        fill="currentColor" viewBox="0 0 20 20">
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
      </svg>
      <div>
        <span class="font-medium">You need to sign in first before you can rent a car.</span> <a href="/"
          class="text-blue-700 underline">Sign in now.</a>
      </div>
    </div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8 text-center">
      <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Rent a Car</h1>
    </div>

    <div class="min-h-[60vh] flex flex-col">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @if($cars->count())

        @foreach($cars as $car)
        <div
          class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200">
          <div class="relative">
            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->car_name }}"
              class="w-full h-48 object-cover rounded-t-xl" />
            <div class="absolute top-3 left-3">
              <span
                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium uppercase tracking-wide bg-red-100 text-red-800">
                Sign In
              </span>
            </div>
          </div>

          <div class="p-5">
            <h5 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $car->car_name }}</h5>
            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-2">{{ $car->description }}</p>
            <div class="flex items-center justify-between mb-4">
              <span class="text-2xl font-bold text-green-600 dark:text-green-400">
                ${{ number_format($car->car_price, 2) }}
                <span class="text-sm text-gray-500 dark:text-gray-400">/per day</span>
              </span>
            </div>

            <button disabled
              class="flex w-full items-center justify-center px-3 py-2 text-sm font-medium text-white bg-gray-500 rounded-lg opacity-70 cursor-not-allowed">
              Sign In
            </button>
          </div>
        </div>
        @endforeach
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
              <span class="font-medium">No Cars Available at the Moment.</span>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
  @endguest


  @auth
  @if(Auth::user()->account_status === NULL)
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
    <div class="flex items-center p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
      <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
        fill="currentColor" viewBox="0 0 20 20">
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
      </svg>
      <div>
        <span class="font-medium">Your account is not yet verified.</span> <a href="/profile"
          class="text-blue-700 underline">Please verify it now.</a>
      </div>
    </div>
  </div>
  @endif


  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="mb-8 text-center">
      <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Rent a Car</h1>
    </div>


    <div class="min-h-[60vh] flex flex-col">
      @if($cars->count())
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($cars as $car)
        <div
          class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200">
          <div class="relative">
            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->car_name }}"
              class="w-full h-48 object-cover rounded-t-xl" />
            <div class="absolute top-3 left-3">
              @if(Auth::user()->account_status === NULL)
              <span
                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium uppercase tracking-wide bg-red-100 text-red-800">
                Account Not Verified
              </span>
              @else
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium uppercase tracking-wide
                      {{ $car->status === 'available' ? 'bg-green-100 text-green-800' : 
                         ($car->status === 'rented' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                {{ $car->status }}
              </span>
              @endif
            </div>
          </div>

          <div class="p-5">
            <h5 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $car->car_name }}</h5>
            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-2">{{ $car->description }}</p>
            <div class="flex items-center justify-between mb-4">
              <span class="text-2xl font-bold text-green-600 dark:text-green-400">
                ${{ number_format($car->car_price, 2) }}<span class="text-sm text-gray-500 dark:text-gray-400">/per
                  day</span>
              </span>
            </div>

            @if(Auth::user()->account_status === NULL)
            <button disabled
              class="w-full inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-gray-500 rounded-lg opacity-70 cursor-not-allowed">
              <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
              ACCOUNT NOT VERIFIED
            </button>
            @else
            <div class="flex space-x-2">
              @if ($car->status === 'available')
              <button data-modal-target="edit-modal-{{ $car->id }}" data-modal-toggle="edit-modal-{{ $car->id }}"
                class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 transition-colors duration-200">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Rent
              </button>
              @elseif ($car->status === 'rented')
              <button disabled
                class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-gray-500 rounded-lg opacity-70 cursor-not-allowed">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Rented
              </button>
              @else
              <button disabled
                class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-gray-500 rounded-lg opacity-70 cursor-not-allowed">
                <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                </svg>
                Maintenance
              </button>
              @endif
            </div>
            @endif
          </div>

        </div>


        <x-modal-forms.container id="edit-modal-{{ $car->id }}">
          <x-modal-forms.header data-modal-hide="edit-modal-{{ $car->id }}">
            {{ $car->car_name }}
          </x-modal-forms.header>
          <x-modal-forms.body>
            <x-modal-forms.form method="POST" action="/rent">
              <x-modal-forms.error></x-modal-forms.error>
              <div>
                <x-modal-forms.label for="car_name">Car Name</x-modal-forms.label>
                <x-modal-forms.input-p>{{ $car->car_name }}</x-modal-forms.input-p>
                <x-modal-forms.input type="hidden" name="car_name" value="{{ $car->car_name }}" readonly />
              </div>

              <div>
                <x-modal-forms.label for="car_price">Car Price</x-modal-forms.label>
                <x-modal-forms.input-p>${{ number_format($car->car_price, 2) }}<span class="text-xs">/perday</span>
                </x-modal-forms.input-p>
                <x-modal-forms.input type="hidden" name="car_price" value="{{ $car->car_price }}" readonly />
              </div>

              <div>
                <x-modal-forms.label for="">Rent Duration</x-modal-forms.label>
              </div>

              <div>
                <x-modal-forms.label class="text-xs" for="">Start Date</x-modal-forms.label>
                <x-modal-forms.input type="date" name="rent_start_date" />
              </div>

              <div>
                <x-modal-forms.label class="text-xs" for="">End Date</x-modal-forms.label>
                <x-modal-forms.input type="date" name="rent_end_date" />
              </div>
              <input type="hidden" name="car_id" value="{{ $car->id }}">
              <input type="hidden" name="customer_user_id" value="{{ Auth::user()->id }}">
              <input type="hidden" name="customer_email" value="{{ Auth::user()->email }}">
              <input type="hidden" name="customer_phone" value="{{ Auth::user()->phone }}">
              <input type="hidden" name="crn_id" value="{{ $uniqueCode }}">
              <input type="hidden" name="customer_first_name" value="{{ Auth::user()->first_name}}">
              <input type="hidden" name="customer_middle_name" value="{{ Auth::user()->middle_name}}">
              <input type="hidden" name="customer_last_name" value="{{ Auth::user()->last_name}}">
              <input type="hidden" name="customer_suffix" value="{{ Auth::user()->suffix}}">
              <input type="hidden" name="customer_region" value="{{ Auth::user()->region}}">
              <input type="hidden" name="customer_city" value="{{ Auth::user()->city}}">
              <input type="hidden" name="customer_barangay" value="{{ Auth::user()->barangay}}">
              <input type="hidden" name="customer_additional_address" value="{{ Auth::user()->additional_address}}">
              <input type="hidden" name="customer_valid_id_photo" value="{{ Auth::user()->valid_id_photo}}">
              <input type="hidden" name="customer_profile" value="{{ Auth::user()->profile}}">
              <input type="hidden" name="status" value="pending">


              <x-modal-forms.button type="submit">
                Submit
              </x-modal-forms.button>
            </x-modal-forms.form>
          </x-modal-forms.body>
        </x-modal-forms.container>

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
            <span class="font-medium">No Cars Available at the Moment.</span>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
  @endauth


</x-layout>