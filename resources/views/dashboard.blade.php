<x-app-layout>
    <div class="min-h-screen custom-background flex flex-col sm:justify-center items-center">
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg text-center">
            <p>{{ __("Congratulations, ") }} {{ Auth::user()->name }}</p>
            <p>{{ __("You have signed Up Successfully.") }}</p>
        </div>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg text-center">
            <div class="col-md-12 mt-4">
                <div class="card card-default">
                    <h4 class="card-heading text-center mt-4">Set up Google Authenticator</h4>

                    <div class="card-body text-center">
                        <p>Set up your two-factor authentication by scanning the barcode below. Alternatively, you can use the code <strong>{{ $secret }}</strong></p>
                        <div class="text-center inline-block">
                            <div class="d-flex justify-content-center">
                                {!! $QR_Image !!}
                            </div>
                        </div>
                        <p>You must set up your Google Authenticator app before continuing. You will be unable to login otherwise</p>
                        <div class="pt-5">
                             <a href="{{ route('complete.registration') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Enable 2FA</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>

<style>
    .custom-background {
        background-image: url('/images/guest_bg.jpg');
        background-size: cover;
        background-position: center;
        height: calc(100vh - 80px);
        ;
        overflow: hidden;
    }
</style>