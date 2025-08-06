<x-admin-layout>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Account Status
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            First Name
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Middle Name
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Last Name
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Suffix
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Email
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Phone Number
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Region
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            City
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Barangay
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            House No. / Street Name
                        </div>
                    </th>
                      <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Profile
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Valid ID
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Action
                        </div>
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $u->id }}
                    </th>
                    <td
                        class="px-6 py-4 uppercase font-bold {{$u->account_status === NULL ? 'dark:text-red-500' : 'dark:text-green-500'}}">
                        {{ $u->account_status ?? 'NOT VERIFIED'}}
                    </td>
                    <td class="px-6 py-4 uppercase">
                        {{ $u->first_name }}
                    </td>
                    <td class="px-6 py-4 uppercase">
                        {{ $u->middle_name ?? 'N/A'}}
                    </td>
                    <td class="px-6 py-4 uppercase">
                        {{ $u->last_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $u->suffix ?? 'N/A'}}
                    </td>
                    <td class="px-6 py-4 uppercase">
                        {{ $u->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $u->phone}}
                    </td>
                    <td class="px-6 py-4 uppercase" id="region-name" data-code="{{$u->region}}">
                      
                    </td>
                    <td class="px-6 py-4" id="city-name" data-code="{{ $u->city}}">
                        
                    </td>
                    <td class="px-6 py-4 uppercase">
                        {{ $u->barangay }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $u->additional_address}}
                    </td>
                      <td class="px-6 py-4 uppercase">
                        {{ $u->profile }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $u->valid_id_photo }}
                    </td>
                    <td class="px-6 py-4 uppercase">
                        Edit
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
            $(function () {
    const cityCode = $('#city-name').attr('data-code'); 
    $.getJSON('/ph-json/city.json', cityData => {
      const city = cityData.find(c => c.city_code === cityCode);
      $('#city-name').text(city ? city.city_name : 'Unknown City');
    });
  });

    $(function () {
    const regionCode = $('#region-name').attr('data-code');
    $.getJSON('/ph-json/region.json', regionData => {
      const region = regionData.find(r => r.region_code === regionCode);
      $('#region-name').text(region ? region.region_name : 'Unknown Region');
    });
  });
    </script>
</x-admin-layout>