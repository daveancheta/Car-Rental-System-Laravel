<x-layout>
  <x-forms.main>
    <x-forms.main-container>
      <x-forms.header>Account Verification</x-forms.header>
      <x-forms.sub-heading>
          To verify your account, please enter the one-time code we sent you.
      </x-forms.sub-heading>

      <x-forms.form method="POST" action="/verify_code">
      
        
       <x-forms.error/>

        <div class="space-y-6">
          <input type="hidden" name="email" value="{{ Auth::user()->email}}">

          <div>
            <x-forms.label>Enter Verification Code</x-forms.label>
            <p class="text-sm text-gray-400 mb-2">
              We just sent a 6-digit code to <span class="font-medium text-white">{{ Auth::user()->email }}</span>.
              Please enter it below to continue.
            </p>
            <x-forms.input type="number" name="verification_code" id="code" maxlength="6" placeholder="Enter 6-digit code" />
          </div>

        
          <input type="hidden" name="account_status" value="verified">

 
          <div class="flex justify-end">
            <button type="submit"
              class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-500 transition duration-200">
              Verify Account
            </button>
          </div>
        </div>
      </x-forms.form>
    </x-forms.main-container>
  </x-forms.main>
</x-layout>