<x-admin-layout>
    @if($cars->count())


    <div class="flex justify-between mb-10">
        <div>
            <h1 class="text-3xl font-bold text-white">Available Cars</h1>
        </div>

        <div>
            <button data-modal-target="add-modal" data-modal-toggle="add-modal"
                class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 transition-colors duration-200">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14m-7 7V5" />
                </svg>
                Add New Car
            </button>
        </div>

    </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($cars as $car)
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200"">
                    <div class=" relative">
            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->car_name }}"
                class="w-full h-48 object-cover rounded-t-xl" />
            <div class="absolute top-3 left-3">
                <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium uppercase tracking-wide
                            {{ $car->status === 'available' ? 'bg-green-100 text-green-800' : 
                               ($car->status === 'rented' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                    {{ $car->status }}
                </span>
            </div>
        </div>
        <div class="p-5">
            <h5 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $car->car_name }}</h5>
            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-2">{{ $car->description }}</p>
            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-2">Driver: <span
                    class="dark:text-yellow-500">{{ $car->driver }}</span></p>
            <div class="flex items-center justify-between mb-4">
                <span class="text-2xl font-bold text-green-600 dark:text-green-400">₱{{ number_format($car->car_price,
                    2)
                    }}<span class="text-sm text-gray-500 dark:text-gray-400">/per day</span>
                </span>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-2">
                <button data-modal-target="edit-modal-{{ $car->id }}" data-modal-toggle="edit-modal-{{ $car->id }}"
                    class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </button>
                <button>
                    <form method="POST" action="/cars/{{ $car->id }}" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-2 14H7l-2-14m3 0V5a2 2 0 012-2h4a2 2 0 012 2v2m5 0H5" />
                            </svg>
                            Delete
                        </button>
                    </form>
                </button>
            </div>
        </div>

    </div>


    <x-modal-forms.container id="edit-modal-{{ $car->id }}">
        <x-modal-forms.header data-modal-hide="edit-modal-{{ $car->id }}">
            {{ $car->car_name }}
        </x-modal-forms.header>
        <x-modal-forms.body>
            <x-modal-forms.form method="POST" action="/cars/{{ $car->id }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <x-modal-forms.error></x-modal-forms.error>
                <div>
                    <x-modal-forms.label for="car_name">Car Name</x-modal-forms.label>
                    <x-modal-forms.input type="text" name="car_name" value="{{ $car->car_name }}" />
                </div>

                <div>
                    <x-modal-forms.label for="car_price">Car Price</x-modal-forms.label>
                    <x-modal-forms.input type="text" name="car_price" value="{{ $car->car_price }}" />
                </div>

                <div>
                    <x-modal-forms.label for="">Description</x-modal-forms.label>
                    <x-modal-forms.input type="text" name="description" value="{{ $car->description}}" />
                </div>

                <div>
                    <x-modal-forms.label for="">Status</x-modal-forms.label>
                    <p class="text-white font-bold text-xs mb-2 mt-2">Current Driver: <span
                            class="capitalize font-normal">{{ $car->driver }}</span></p>
                    <x-modal-forms.select name="driver" id="status">
                        @foreach ($drivers as $driver)
                        @php
                        $fullName = trim("{$driver->first_name} {$driver->middle_name} {$driver->last_name}
                        {$driver->suffix}");
                        @endphp
                        <option value="{{ $fullName }}" {{ $car->driver == $fullName ? 'selected' : '' }}>
                            {{ $fullName }}
                        </option>
                        @endforeach

                    </x-modal-forms.select>
                </div>

                <div>
                    <x-modal-forms.label for="">Status</x-modal-forms.label>
                    <p class="text-white font-bold text-xs mb-2 mt-2">Current Status: <span
                            class="capitalize font-normal">{{ $car->status }}</span></p>
                    <x-modal-forms.select name="status" id="status">
                        <option value="available" {{ $car->status == 'available' ? 'selected' : ''
                            }}>Available</option>
                        <option value="rented" {{ $car->status == 'rented' ? 'selected' : ''
                            }}>Rented
                        </option>
                        <option value="maintenance" {{ $car->status == 'maintenance' ? 'selected' : ''
                            }}>Maintenance
                        </option>
                    </x-modal-forms.select>
                </div>

                <div>
                    <x-modal-forms.label for="">Image</x-modal-forms.label>
                    <x-modal-forms.input type="file" name="image" />
                </div>
                <x-modal-forms.button type="submit">
                    Submit
                </x-modal-forms.button>
            </x-modal-forms.form>
        </x-modal-forms.body>
    </x-modal-forms.container>
    @endforeach
    </div>
    </div>




    <x-modal-forms.container id="add-modal">
        <x-modal-forms.header data-modal-hide="add-modal">
            Add New Car
        </x-modal-forms.header>
        <x-modal-forms.body>
            <x-modal-forms.form method="POST" action="/cars" enctype="multipart/form-data">
                @csrf
                <x-modal-forms.error></x-modal-forms.error>
                <div>
                    <x-modal-forms.label for="car_name">Car Name</x-modal-forms.label>
                    <x-modal-forms.input type="text" name="car_name" />
                </div>

                <div>
                    <x-modal-forms.label for="car_price">Car Price</x-modal-forms.label>
                    <x-modal-forms.input type="text" name="car_price" />
                </div>

                <div>
                    <x-modal-forms.label for="">Description</x-modal-forms.label>
                    <x-modal-forms.input type="text" name="description" />
                </div>

                <div>
                    <x-modal-forms.label for="">Driver</x-modal-forms.label>
                    <x-modal-forms.select name="driver" id="status">
                        @foreach ($drivers as $driver)
                          @php
                        $fullName = trim("{$driver->first_name} {$driver->middle_name} {$driver->last_name}
                        {$driver->suffix}");
                        @endphp
                        <option
                            value="{{ $fullName }}">
                            {{$fullName }}</option>
                        @endforeach

                    </x-modal-forms.select>
                </div>

                <div>
                    <x-modal-forms.label for="">Status</x-modal-forms.label>
                    <x-modal-forms.select name="status" id="status">
                        <option value="available">Available</option>
                        <option value="rented">Rented</option>
                        <option value="maintenance">Maintenance</option>
                    </x-modal-forms.select>
                </div>

                <div>
                    <x-modal-forms.label for="">Image</x-modal-forms.label>
                    <x-modal-forms.input type="file" name="image" />
                </div>
                <x-modal-forms.button type="submit">
                    Submit
                </x-modal-forms.button>
            </x-modal-forms.form>
        </x-modal-forms.body>
    </x-modal-forms.container>
    <div>
        {{$cars->links()}}
    </div>
    @else
    <div class="flex justify-between mb-10">
        <div>
            <h1 class="text-3xl font-bold text-white">Available Cars</h1>
        </div>

        <div>
            <button data-modal-target="add-modal" data-modal-toggle="add-modal"
                class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 transition-colors duration-200">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14m-7 7V5" />
                </svg>
                Add New Car
            </button>
        </div>

    </div>
    </div>









    <x-modal-forms.container id="add-modal">
        <x-modal-forms.header data-modal-hide="add-modal">
            Add New Car
        </x-modal-forms.header>
        <x-modal-forms.body>
            <x-modal-forms.form method="POST" action="/cars" enctype="multipart/form-data">
                @csrf
                <x-modal-forms.error></x-modal-forms.error>
                <div>
                    <x-modal-forms.label for="car_name">Car Name</x-modal-forms.label>
                    <x-modal-forms.input type="text" name="car_name" />
                </div>

                <div>
                    <x-modal-forms.label for="car_price">Car Price</x-modal-forms.label>
                    <x-modal-forms.input type="text" name="car_price" />
                </div>

                <div>
                    <x-modal-forms.label for="">Description</x-modal-forms.label>
                    <x-modal-forms.input type="text" name="description" />
                </div>

                <div>
                    <x-modal-forms.label for="">Driver</x-modal-forms.label>
                    <x-modal-forms.select name="driver" id="status">
                        @foreach ($drivers as $driver)
                        <option
                            value="{{ $driver->first_name }} {{ $driver->middle_name }} {{ $driver->last_name }} {{ $driver->suffix }}">
                            {{ $driver->first_name }} {{ $driver->middle_name }} {{ $driver->last_name }} {{
                            $driver->suffix }}</option>
                        @endforeach


                    </x-modal-forms.select>
                </div>

                <div>
                    <x-modal-forms.label for="">Status</x-modal-forms.label>
                    <x-modal-forms.select name="status" id="status">
                        <option value="available">Available</option>
                        <option value="rented">Rented</option>
                        <option value="maintenance">Maintenance</option>
                    </x-modal-forms.select>
                </div>

                <div>
                    <x-modal-forms.label for="">Image</x-modal-forms.label>
                    <x-modal-forms.input type="file" name="image" />
                </div>
                <x-modal-forms.button type="submit">
                    Submit
                </x-modal-forms.button>
            </x-modal-forms.form>
        </x-modal-forms.body>
    </x-modal-forms.container>
    <div>
        {{$cars->links()}}
    </div>
    <div class="flex-1 flex flex-col items-center justify-center">
        <div
            class="flex items-center p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 max-w-md w-full">
            <svg class="shrink-0 inline w-5 h-5 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div>
                <span class="font-medium">No Cars Available.</span>
            </div>
        </div>
    </div>
    @endif
</x-admin-layout>