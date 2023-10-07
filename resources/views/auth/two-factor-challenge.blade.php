@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Two-Factor Challenge') }}</div>

                <div class="card-body">
                    <form method="POST" action="/two-factor-challenge">
                        @csrf

                        <div class="mb-3">
                            <label for="code" class="form-label">{{ __('Two-Factor Authentication Code') }}</label>
                            <input id="code" type="text" class="form-control" name="code" required autocomplete="one-time-code">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
