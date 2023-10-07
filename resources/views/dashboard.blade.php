<x-app-layout>
    <div class="min-h-screen custom-background flex flex-col sm:justify-center items-center">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg text-center">
            <p>{{ __("Congratulations, ") }} {{ Auth::user()->name }}</p>
            <p>{{ __("You have signed Up Successfully.") }}</p>
        </div>
    </div>
</x-app-layout>

<style>
    .custom-background {
        background-image: url('/images/guest_bg.jpg');
        background-size: cover;
        background-position: center;
        height: calc(100vh - 80px);; 
        overflow: hidden;
    }
</style>
