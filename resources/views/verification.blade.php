<x-layout>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <x-forms.main>
    <x-forms.main-container>
      <x-forms.header>Account Verification</x-forms.header>
      <x-forms.sub-heading>
        To verify your account, please enter your official address and upload a valid ID photo.
      </x-forms.sub-heading>

      <x-forms.form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
        @method('PATCH')

       <x-forms.error />

        <x-forms.form-container>

          <div>
            <x-forms.label for="region">Region</x-forms.label>
            <x-forms.select id="region" name="region">
              <option disabled selected>Choose Region</option>
            </x-forms.select>
          </div>

          <div>
            <x-forms.label for="province">Province / District</x-forms.label>
            <x-forms.select id="province" name="province" disabled>
              <option disabled selected>Choose Province / District</option>
            </x-forms.select>
          </div>

          <div>
            <x-forms.label for="city">City / Municipality</x-forms.label>
            <x-forms.select id="city" name="city" disabled>
              <option disabled selected>Choose City/Municipality</option>
            </x-forms.select>
          </div>

          <div>
            <x-forms.label for="barangay">Barangay</x-forms.label>
            <x-forms.select id="barangay" name="barangay" disabled>
              <option disabled selected>Choose Barangay</option>
            </x-forms.select>
          </div>

          <div class="md:col-span-2">
            <x-forms.label for="street">House No. / Street Name</x-forms.label>
            <x-forms.input type="text" id="street" name="additional_address" placeholder="e.g. 123 Mabini St."/>
          </div>

          <div class="md:col-span-2">
            <x-forms.label for="street">Upload Valid Id</x-forms.label>
            <x-forms.input type="file" name="valid_id_photo"/>
          </div>

          <div class="md:col-span-2">
            <x-forms.label for="street">Upload Profile Picture <span
                class="text-gray-500">(OPTIONAL)</span></x-forms.label>
            <x-forms.input type="file" name="profile"/>
          </div>
        </x-forms.form-container>

        <x-forms.input type="hidden" name="verification_code" value="{{ $uniqueCode }}"/>

        <div class="mt-8 flex justify-end">
          <button type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-500 transition duration-200">
            Verify
          </button>
        </div>
      </x-forms.form>
    </x-forms.main-container>
  </x-forms.main>
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
        $('#city, #barangay').prop('disabled', true).empty().append('<option disabled selected>select...</option>');

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
        $('#barangay').prop('disabled', true).empty().append('<option disabled selected>select Barangay</option>');

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
        $('#barangay').empty().append('<option disabled selected> Barangay</option>').prop('disabled', false);

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