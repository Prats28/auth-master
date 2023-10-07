<x-guest-layout>

    <div class="text-center">
        <h1 class="font-bold text-2xl">Sign Up</h1>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Password')" />
            <span class="text-xs">(Recommended: Use alphanumeric characters with lowercase, uppercase, and special character.)</span>
            
            <!-- Container for input field and password preview -->
            <div class="flex items-center">
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" onkeyup="checkPasswordStrength(this.value)" />

                <!-- Password preview toggle -->
                <span id="password-preview" class="absolute top-2 right-0 text-md cursor-pointer p-2" onclick="togglePasswordPreview('password',this)">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </span>
            </div>

            <!-- Password strength indicator -->
            <span id="password-strength" class="absolute top-full right-3 text-xs"></span>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>



        <!-- Confirm Password -->
        <div  class="mt-4 relative">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <div class="flex items-center">
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

                <!-- Password preview toggle -->
                <span id="password-preview" class="absolute top-2 right-0 text-md cursor-pointer p-2" onclick="togglePasswordPreview('password_confirmation', this)">
                <i class="fa fa-eye" aria-hidden="true"></i>
                </span>      
            </div>

             <!-- Password strength indicator -->
             <span id="password-strength" class="absolute top-full right-3 text-xs"></span>
           

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="form-group mt-4">
            <label for="terms_and_conditions" class="text-sm font-medium text-gray-700">
                <input type="checkbox" name="terms_and_conditions" id="terms_and_conditions" required>
                I accept the <a href="{{ asset('pdfs/terms_and_conditions.pdf') }}" target="_blank" style="font-weight: bold; text-decoration: underline;">Terms and Conditions</a>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
    // Function to check password strength manually
    function checkPasswordStrength(password) {
        const strengthMeter = document.getElementById('password-strength');
        const passwordStrength = calculatePasswordStrength(password);

        // Display password strength based on your own criteria
        if (passwordStrength === 4) {
            strengthMeter.textContent = 'Password: Strong';
            strengthMeter.style.color = 'green';
        } else if (passwordStrength === 3) {
            strengthMeter.textContent = 'Password: Good';
            strengthMeter.style.color = 'yellow';
        } else if (passwordStrength === 2) {
            strengthMeter.textContent = 'Password: Fair';
            strengthMeter.style.color = 'orange';
        } else {
            strengthMeter.textContent = 'Password: Weak';
            strengthMeter.style.color = 'red';
        }
    }

    // Function to calculate password strength based on your criteria
    function calculatePasswordStrength(password) {
        let strength = 0;

        // Check for length and add points for each criterion met
        if (password.length >= 8) strength++;
        if (/[a-z]/.test(password)) strength++;
        if (/[A-Z]/.test(password)) strength++;
        if (/[!@#$%^&*()_+{}\[\]:;<>,.?~\\\-]/.test(password)) strength++;

        return strength;
    }

    // Function to toggle password preview
    function togglePasswordPreview(inputId, icon) {
        const passwordField = document.getElementById(inputId);
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
        } else {
            passwordField.type = 'password';
            icon.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
        }
    }

</script>