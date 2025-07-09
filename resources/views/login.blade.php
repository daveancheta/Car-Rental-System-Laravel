<x-layout>
    <x-forms.form method="POST" action="/login">

        <x-forms.header>Log In</x-forms.header>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <x-forms.group-input-label>
            <x-forms.label for="email">Email</x-forms.label>
            <x-forms.input type="email" name="email" placeholder="Email" :value="old('email')" />
        </x-forms.group-input-label>

        <x-forms.group-input-label>
            <x-forms.label for="password">Password</x-forms.label>
            <x-forms.input type="password" autocomplete="off" name="password" placeholder="Password" autocomplete="off" />
        </x-forms.group-input-label>

        <x-forms.button>Login</x-forms.button>

        <a href="/register">Dont have an account yet? <span class="underline">Register</span></a>
        </x-forms>


</x-layout>