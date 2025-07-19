<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CarVibe</title>
  @vite('resources/css/app.css')
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <x-forms.main>
    <x-forms.main-container>
      <x-forms.header>Sign Up</x-forms.header>
      <x-forms.sub-heading>
        To access our features and rent a car, sign up now.
      </x-forms.sub-heading>

      <x-forms.form method="POST" action="/registerdriver" enctype="multipart/form-data">
      
        <x-forms.error/>

        <x-forms.container>

          <div>
            <x-forms.label for="region">First Name</x-forms.label>
            <x-forms.input type="text" name="first_name" placeholder="e.g. John"
              :value="old('first_name')"/>

          </div>

          <div>
            <x-forms.label for="province">Middle Name <span
                class="text-gray-500">(OPTIONAL)</span></x-forms.label>
            <x-forms.input type="text" name="middle_name" placeholder="e.g. David"
              :value="old('middle_name')"/>
          </div>

          <div>
            <x-forms.label for="province">Surname</x-forms.label>
            <x-forms.input type="text" name="last_name" placeholder="e.g. Doe"
              :value="old('last_name')"/>
          </div>

          <div>
            <x-forms.label for="barangay">Suffix <span
                class="text-gray-500">(OPTIONAL)</span></x-forms.label>
            <x-forms.select name="suffix">
              <option disabled selected>Choose Suffix</option>
              <option value="">N/A</option>
              <option value="Sr.">Sr.</option>
              <option value="Jr.">Jr.</option>
              <option value="II">II</option>
              <option value="III">III</option>
              <option value="IV">IV</option>
              <option value="V">V</option>
              <option value="VI">VI</option>
              <option value="VII">VII</option>
            </x-forms.select>
          </div>

          <div>
            <x-forms.label for="province">Email</x-forms.label>
            <x-forms.input type="text" name="email_driver" placeholder="e.g. johndoe@example.com"
              :value="old('email')"/>
          </div>

          <div>
            <x-forms.label for="province">Phone Number</x-forms.label>
            <x-forms.input type="tel" maxlength="11" name="phone" placeholder="e.g. 09912345678"
              :value="old('phone')"/>
          </div>

           <div class="md:col-span-2">
            <x-forms.label for="street">Profile</x-forms.label>
            <x-forms.input type="file" autocomplete="off" name="profile" />
          </div>

           <div class="md:col-span-2">
            <x-forms.label for="street">Driver License</x-forms.label>
            <x-forms.input type="file" autocomplete="off" name="valid_id_photo" />
          </div>

          <div class="md:col-span-2">
            <x-forms.label for="street">Password</x-forms.label>
            <x-forms.input type="password" autocomplete="off" autocomplete="off" name="password" placeholder="Password"/>
          </div>

          <div class="md:col-span-2">
            <x-forms.label for="street">Confirm Password</x-forms.label>
            <x-forms.input  type="password" autocomplete="off" autocomplete="off" name="password_confirmation" placeholder="Comfirm Password" />
          </div>

          <input type="hidden" name="is_driver" value="1">

        </x-forms.container>

        <div class="mt-8 flex justify-end">
          <button type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-500 transition duration-200">
            Sign Up
          </button>
        </div>
      </x-forms.form>
    </x-forms.main-container>
    </x-forms.main>
</body>
</html>