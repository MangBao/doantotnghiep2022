<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NTU Dashboard') }} | @yield('titleAdmin', 'Đại học Nha Trang')</title>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    {{-- Scripts --}}

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }} "></script>
</head>

<body>
    @if (session('success') || session('error'))
        <div x-data="{alert: true}" x-show="alert" class="fixed z-30 top-5 left-5">
            <div x-show="alert" @click.away="alert = false"
                class="{{ session('success') ? 'border-green-600 bg-green-200 border-t-4 text-green-600' : 'border-red-600 bg-red-200 border-t-4 text-red-600' }} rounded px-4 py-3 shadow-md"
                role="alert" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <div class="flex">
                    <div>
                        <p class="font-bold">{{ __('Thông báo') }}</p>
                        <p class="text-sm">
                            {{ session('success') ? session('success') : session('error') }}
                        </p>
                    </div>
                    <button @click="alert = false" class="flex items-start focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        @include('partials.sidebar.main-sidebar')

        <div class="flex flex-col flex-1 w-full">

            @include('partials.navbar.main-navbar')

            <main class="h-full scrollbar-thin scrollbar-thumb-purple-600 scrollbar-track-blue-300 overflow-y-scroll scrollbar-thumb-rounded-full scrollbar-track-rounded-full">
                <div class="container px-6 mx-auto grid mb-19 min-h-400">

                    @yield('content')

                </div>
                @include('partials.footer.main-footer')
            </main>

        </div>
    </div>
</body>

</html>
