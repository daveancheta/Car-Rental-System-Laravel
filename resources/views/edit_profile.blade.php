<x-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="min-h-screen bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto p-6 bg-gray-800 border border-gray-700 rounded shadow-lg relative z-10">
            <h1 class="text-2xl font-bold text-center text-white mb-2">Edit Profile</h1>
            <p class="text-center text-sm text-gray-300 mb-6">
                Update your personal information
            </p>

            <form method="POST" action="/userss/{{ $user->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <strong class="font-bold">Whoops!</strong>
                    <ul class="list-disc list-inside mt-2">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label for="region" class="block mb-2 text-sm font-medium text-gray-200">First Name</label>
                        <input type="text" name="first_name" placeholder="e.g. John"
                            class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            value="{{ Auth::user()->first_name}}">

                    </div>

                    <div>
                        <label for="province" class="block mb-2 text-sm font-medium text-gray-200">Middle Name <span
                                class="text-gray-500">(OPTIONAL)</span></label>
                        <input type="text" name="middle_name" placeholder="e.g. David"
                            class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        value="{{ Auth::user()->middle_name}}">
                    </div>

                    <div>
                        <label for="province" class="block mb-2 text-sm font-medium text-gray-200">Surname</label>
                        <input type="text" name="last_name" placeholder="e.g. Doe"
                            class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            value="{{ Auth::user()->last_name }}">
                    </div>

                    <div>
                        <label for="barangay" class="block mb-2 text-sm font-medium text-gray-200">Suffix <span
                                class="text-gray-500">(OPTIONAL)</span></label>
                        <select name="suffix"
                            class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option disabled selected>Choose Suffix</option>
                            <option value="" {{ Auth::user()->suffix == NULL ? 'selected' : ''}}>N/A</option>
                            <option value="Sr." {{ Auth::user()->suffix == 'Sr.' ? 'selected' : ''
                                        }}>Sr.</option>
                            <option value="Jr." {{ Auth::user()->suffix == 'Jr.' ? 'selected' : ''}}>Jr.</option>
                            <option value="II" {{ Auth::user()->suffix == 'II' ? 'selected' : ''}}>II</option>
                            <option value="III" {{ Auth::user()->suffix == 'III' ? 'selected' : ''}}>III</option>
                            <option value="IV" {{ Auth::user()->suffix == 'IV' ? 'selected' : ''}}>IV</option>
                            <option value="V" {{ Auth::user()->suffix == 'IV' ? 'selected' : ''}}>V</option>
                            <option value="VI" {{ Auth::user()->suffix == 'VI' ? 'selected' : ''}}>VI</option>
                            <option value="VII" {{ Auth::user()->suffix == 'VII' ? 'selected' : ''}}>VII</option>
                        </select>
                    </div>

                    <div>
                        <label for="province" class="block mb-2 text-sm font-medium text-gray-200">Email</label>
                        <input type="text" name="email" placeholder="e.g. johndoe@example.com"
                            class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            value="{{ Auth::user()->email}}" readonly>
                    </div>

                    <div>
                        <label for="province" class="block mb-2 text-sm font-medium text-gray-200">Phone Number</label>
                        <input type="tel" maxlength="11" name="phone" placeholder="e.g. 09912345678"
                            class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            value="{{ Auth::user()->phone}}">
                    </div>

                    <div>
                        <label for="region" class="block mb-2 text-sm font-medium text-gray-200">Region</label>
                        <select id="region" name="region"
                            class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option disabled selected>Choose Region</option>
                        </select>
                    </div>

                    <div>
                        <label for="province" class="block mb-2 text-sm font-medium text-gray-200">Province /
                            District</label>
                        <select id="province" name="province" disabled
                            class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option disabled selected>Choose Province / District</option>
                        </select>
                    </div>

                    <div>
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-200">City /
                            Municipality</label>
                        <select id="city" name="city" disabled
                            class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option disabled selected>Choose City/Municipality</option>
                        </select>
                    </div>

                    <div>
                        <label for="barangay" class="block mb-2 text-sm font-medium text-gray-200">Barangay</label>
                        <select id="barangay" name="barangay" disabled
                            class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option disabled selected>Choose Barangay</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label for="street" class="block mb-2 text-sm font-medium text-gray-200">House No. / Street
                            Name</label>
                        <input type="text" id="street" name="additional_address" placeholder="e.g. 123 Mabini St."
                            class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ Auth::user()->additional_address}}">
                    </div>

                    <div class="md:col-span-2">
                        <label for="street" class="block mb-2 text-sm font-medium text-gray-200">Upload Valid Id</label>
                        <input type="file" autocomplete="off" name="valid_id_poto"
                            class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div class="md:col-span-2">
                        <label for="street" class="block mb-2 text-sm font-medium text-gray-200">Upload Profiile
                            Picture <span
                                class="text-gray-500">(OPTIONAL)</span></label>
                        <input type="file" autocomplete="off" name="profile"
                            class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                </div>

                <div class="mt-8 flex justify-end space-x-6">
                    <a href="/profile"
                        class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-500 transition duration-200">
                        Cancel
                </a>
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-500 transition duration-200">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(function () {
      const base = '/ph-json/';

      $.getJSON(base + 'region.json', regionData => {
        regionData.forEach(r => {
          $('#region').append(`<option value="${r.region_code}">${r.region_name}</option>`);
        });
      });

      $('#region').change(function () {
        const reg = this.value;
        $('#province').empty().append('<option disabled selected>Choose Province / District</option>').prop('disabled', false);
        $('#city, #barangay').prop('disabled', true).empty().append('<option disabled selected>Select...</option>');

        $.getJSON(base + 'province.json', provData => {
          provData.filter(p => p.region_code === reg)
            .sort((a, b) => a.province_name.localeCompare(b.province_name))
            .forEach(p => {
              $('#province').append(`<option value="${p.province_code}">${p.province_name}</option>`);
            });
        });
      });

      $('#province').change(function () {
        const prov = this.value;
        $('#city').empty().append('<option disabled selected>Choose City/Municipality</option>').prop('disabled', false);
        $('#barangay').prop('disabled', true).empty().append('<option disabled selected>Select Barangay</option>');

        $.getJSON(base + 'city.json', cityData => {
          cityData.filter(c => c.province_code === prov)
            .sort((a, b) => a.city_name.localeCompare(b.city_name))
            .forEach(c => {
              $('#city').append(`<option value="${c.city_code}">${c.city_name}</option>`);
            });
        });
      });

      $('#city').change(function () {
        const cityCode = this.value;
        $('#barangay').empty().append('<option disabled selected>Select Barangay</option>').prop('disabled', false);

        $.getJSON(base + 'barangay.json', brgyData => {
          brgyData.filter(b => b.city_code === cityCode)
            .sort((a, b) => a.brgy_name.localeCompare(b.brgy_name))
            .forEach(b => {
              $('#barangay').append(`<option value="${b.brgy_name}">${b.brgy_name}</option>`);
            });
        });
      });
    });
    </script>
</x-layout>