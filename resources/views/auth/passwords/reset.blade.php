@extends('front-end.layout.layout_login')
@section('titleLogin', 'Reset Password')
@section('body')
<div class="container mx-auto px-4 h-full">
    <div class="flex content-center items-center justify-center h-full">
        <div class="w-full lg:w-2/5 px-4">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                <div class="rounded-t mb-0 px-6 py-6">

                    <div class="text-center mb-3">
                        <h6 class="text-blueGray-500 text-sm font-bold">
                            Reset Password
                        </h6>
                    </div>

                    <hr class="mt-6 border-b-1 border-blueGray-300" />
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="relative w-full mb-3">
                            <label class="block text-blueGray-600 text-xs font-bold mb-2"
                                for="email">
                                {{ __('Email Address') }}
                            </label>
                            <input type="email"
                                name="email"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Email" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="relative w-full mb-3">
                            <label class="block text-blueGray-600 text-xs font-bold mb-2"
                                for="password">
                                Password
                            </label>
                            <input type="password"
                                name="password"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 @error('password') is-invalid @enderror"
                                required autocomplete="current-password"
                                placeholder="Password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="relative w-full mb-3">
                            <label for="password-confirm" class="block text-blueGray-600 text-xs font-bold mb-2">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="text-center mt-6">
                            <button
                                class="bg-blue-500 text-white active:bg-blue-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                type="submit">
                                {{ __('Reset Password') }}
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
