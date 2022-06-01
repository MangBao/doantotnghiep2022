@extends('layouts.auth')

@section('title')
    {{ __('Đăng ký tài khoản') }}
@endsection

@section('images')
    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('images/login-office.jpeg') }}"
        alt="Office" />
    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
        src="{{ asset('images/login-office-dark.jpeg') }}" alt="Office" />
@endsection

@section('form-title')
    {{ __('Đăng ký tài khoản') }}
@endsection

@section('form')
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">{{ __('Mã sinh viên') }}</span>
            <input type="text" name="sinhvien_id" value="{{ old('sinhvien_id') }}" required autocomplete="sinhvien_id" autofocus
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 @error('name') border-red-500 @enderror focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="{{ __('Mã sinh viên') }}" />
        </label>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">{{ __('Tên sinh viên') }}</span>
            <input type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 @error('name') border-red-500 @enderror focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="{{ __('Tên sinh viên') }}" />
        </label>
        @error('name')
        <p class="text-red-500 text-xs italic mt-2">
            {{ $message }}
        </p>
        @enderror
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">{{ __('Địa chỉ email') }}</span>
            <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 @error('email') border-red-500 @enderror focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="{{ __('Email') }}" />
        </label>
        @error('email')
        <p class="text-red-500 text-xs italic mt-2">
            {{ $message }}
        </p>
        @enderror
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">{{ __('Mật khẩu') }}</span>
            <input type="password" name="password" required autocomplete="new-password" id="password"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 @error('password') border-red-500 @enderror focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="{{ __('Mật khẩu') }}" />
        </label>
        @error('password')
        <p class="text-red-500 text-xs italic mt-2">
            {{ $message }}
        </p>
        @enderror
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">{{ __('Xác nhận mật khẩu') }}</span>
            <span id="message"></span>
            <input type="password" name="password_confirmation" required autocomplete="new-password" id="confirm_password"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="{{ __('Xác nhận mật khẩu') }}" />
        </label>

        <button type="submit" id="submit"
            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            {{ __('Đăng ký') }}
        </button>

        <hr class="my-8" />

        <p class="mt-1 text-sm dark:text-gray-200">
            {{ __('Bạn đã có tài khoản?') }}
            <a class="font-medium text-purple-600 dark:text-purple-400 hover:underline" href="{{ route('login') }}">
                {{ __('đăng nhập') }}
            </a>
        </p>
    </form>
    <script>
        $('#password, #confirm_password').on('keyup', function() {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('Mật khẩu khớp').css('color', 'green');
                $('#submit').removeAttr('disabled');

            } else
                $('#message').html('Mật khẩu không khớp').css('color', 'red');
                $('#submit').addAttr('disabled');
        });
    </script>
@endsection
