<x-admin-layout>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        @foreach ($users as $user)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden transition transform hover:scale-105 duration-200">
                <div class="p-6 flex items-center space-x-5">
                    {{-- Profile Image --}}
                    @if($user->profile === NULL)
                        <div class="w-24 h-24 flex items-center justify-center bg-gray-200 dark:bg-gray-700 rounded-full">
                            <svg class="w-12 h-12 text-gray-500 dark:text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    @else
                        <img src="{{ asset('storage/' . $user->profile) }}" alt="Profile"
                             class="w-24 h-24 object-cover rounded-full border border-gray-300 dark:border-gray-600">
                    @endif

                    {{-- Info Section --}}
                    <div>
                        <div class="mb-2 text-sm text-gray-500 dark:text-gray-300">
                            Role:
                            @if($user->is_admin === 0)
                                <span class="text-yellow-600 font-semibold uppercase">User</span>
                            @else
                                <span class="text-blue-500 font-semibold uppercase">Admin</span>
                            @endif
                        </div>

                        <div class="text-base font-semibold text-gray-900 dark:text-white">
                            @if($user->is_admin === 0)
                                <div><span class="font-normal text-sm text-gray-500 dark:text-gray-400">Name:</span><br>
                                {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</div>
                            @else
                                <div><span class="font-normal text-sm text-gray-500 dark:text-gray-400">Username:</span><br>
                                {{ $user->username }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-admin-layout>
