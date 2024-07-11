<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                <h1 class="text-2xl text-gray-600 font-bold">{{Fungsi::app_nama()}}</h1>
               
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('daftar.store') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nama Lengkap')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus />
            </div>


            <!-- Email Address -->
            <div>
                <x-label for="username" :value="__('Username')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>



            <!-- Name -->
            <div>
                <x-label for="alamat" :value="__('Alamat')" />

                <x-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autofocus />
            </div>


            <!-- Name -->
            <div>
                <x-label for="telp" :value="__('Telp')" />

                <x-input id="telp" class="block mt-1 w-full" type="text" name="telp" :value="old('telp')" required autofocus />
            </div>


            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Jenis Kelamin')" />

                <select name="jk" required class="form-select form-select-lg mb-3
                appearance-none
                block
                w-full
                px-4
                py-1
                text-xl
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label=".form-select-lg example">
                  <option selected>Laki-laki</option>
                  <option >Perempuan</option>
              </select>
            </div>


            <!-- Remember Me -->
            <div class="block mt-4">
               
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Sudah mempunyai akun ?') }}
                </a>

                <x-button class="ml-3">
                    {{ __('Daftar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
