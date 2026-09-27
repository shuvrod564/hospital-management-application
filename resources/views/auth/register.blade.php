<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="row g-3">
        @csrf

        <!-- Name -->
        <div class="col-md-6">
            <x-input-label for="name" :value="__('First Name')" class="required" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div> 
        <div class="col-md-6">
            <x-input-label for="last_name" :value="__('Last Name')" class="required" />
            <x-text-input id="last_name" type="text" name="last_name" :value="old('last_name')" autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-1" />
        </div> 
        <div class="col-md-6">
            <x-input-label for="email" :value="__('Email')" class="required" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>
        <div class="col-md-6">
            <x-input-label for="phone" :value="__('Phone')" class="required" />
            <x-text-input id="phone" type="tel" name="phone" :value="old('phone')" autocomplete="username" />
            <x-input-error :messages="$errors->get('phone')" class="mt-1" />
        </div>

        <!-- Password -->
        <div class="col-md-6">
            <x-input-label for="password" :value="__('Password')" class="required" /> 
            <div class="position-relative mt-1">
                <x-text-input id="password" class="block w-full pe-5"
                            type="password"
                            name="password"
                            autocomplete="new-password" />
                <button type="button" class="btn btn-link position-absolute end-0 top-50 translate-middle-y text-secondary text-decoration-none pe-3 py-2 border-0 z-3" onclick="togglePasswordVisibility('password', this)">
                    <i data-lucide="eye" style="width: 18px; height: 18px;"></i>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirm Password -->
        <div class="col-md-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="required" /> 
            <div class="position-relative mt-1">
                <x-text-input id="password_confirmation" class="block w-full pe-5"
                            type="password"
                            name="password_confirmation" autocomplete="new-password" />
                <button type="button" class="btn btn-link position-absolute end-0 top-50 translate-middle-y text-secondary text-decoration-none pe-3 py-2 border-0 z-3" onclick="togglePasswordVisibility('password_confirmation', this)">
                    <i data-lucide="eye" style="width: 18px; height: 18px;"></i>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <script>
        function togglePasswordVisibility(inputId, button) {
            const input = document.getElementById(inputId);
            const icon = button.querySelector('[data-lucide]');
            
            if (input.type === 'password') {
                input.type = 'text';
                if (icon) icon.setAttribute('data-lucide', 'eye-off');
            } else {
                input.type = 'password';
                if (icon) icon.setAttribute('data-lucide', 'eye');
            }
            
            // Re-initialize Lucide icons to update the graphic state if lucide script is loaded
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        }
        </script>
 
        <div class="col-12">
            <div class="position-relative text-center">
                <x-input-label for="" :value="__('Patient Information')" class="bg-white d-inline-block px-2 z-3 position-relative m-0 p-0" /> 
                <div class="w-100 position-absolute top-50 start-0 translate-middle-y bg-light" style="height:1px"></div>
            </div>
        </div> 
        <div class="col-md-6">
            <x-input-label for="gender" :value="__('Genger')" class="required" />
            <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
                <option value="" selected disabled>Select Gender</option>
                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
            </select> 
            <x-input-error :messages="$errors->get('gender')" class="mt-1" />
        </div>
        <div class="col-md-6">
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" class="block mt-1 w-full"
                            type="number"
                            name="age" />
            <x-input-error :messages="$errors->get('age')" class="mt-1" />
        </div>
        <div class="col-md-6">
            <x-input-label for="weight" :value="__('weight')" />
            <x-text-input id="weight" class="block mt-1 w-full"
                            type="number"
                            name="weight" />
            <x-input-error :messages="$errors->get('weight')" class="mt-1" />
        </div>
        <div class="col-md-6">
            <x-input-label for="blood_group" :value="__('blood group')" class="required" />
            <select name="blood_group" id="blood_group" class="form-select @error('blood_group') is-invalid @enderror">
                <option value="" selected disabled>Select Blood Group</option>
                <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O-</option>
            </select>
            <x-input-error :messages="$errors->get('blood_group')" class="mt-1" />
        </div>

        

        <div class="col-12 pt-4">
            <x-primary-button class="w-100">
                {{ __('Register') }}
            </x-primary-button>
            <div class="mt-3 text-center">
                <a class="link" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>

        </div>
    </form>
</x-guest-layout>
