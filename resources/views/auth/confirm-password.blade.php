@extends('layouts.auth')

@section('title')
    {{ __('Confirm Password') }}
@endsection

@section('images')
    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
        src="{{ asset('images/forgot-password-office.jpeg') }}" alt="Office" />
    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
        src="{{ asset('images/forgot-password-office-dark.jpeg') }}" alt="Office" />
@endsection

@section('form-title')
    {{ __('Confirm Password') }}
@endsection

@section('form')
    <p class="mb-2 leading-normal text-sm text-gray-600 dark:text-gray-300">
        {{ __('Please confirm your password before continuing.') }}
    </p>
    <form action="
    @if (config('app.env') === 'local')
        {{ route('password.confirm') }}
    @else
        {{ secure_url('password/confirm') }}
    @endif
    " method="POST">

        @csrf
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">{{ __('Password') }}</span>
            <input type="password" name="password" required
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 @error('password') border-red-500 @enderror focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="{{ __('Password') }}" />
        </label>
        @error('password')
        <p class="text-red-500 text-xs italic mt-2">
            {{ $message }}
        </p>
        @enderror
        <button
            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            {{ __('Confirm Password') }}
        </button>

        <hr class="my-6" />

        @if (Route::has('password.request'))
            <p>
                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                    href="{{ route('password.request') }}">
                    {{ __('Qu??n m???t kh???u?') }}
                </a>
            </p>
        @endif
    </form>
    {{-- {{dd(route('password.confirm'))}} --}}
@endsection
