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

    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        @include('partials.sidebar.main-sidebar')

        <div class="flex flex-col flex-1 w-full">

            @include('partials.navbar.main-navbar')

            <main class="h-full scrollbar-thin scrollbar-thumb-purple-600 scrollbar-track-blue-300 overflow-y-scroll scrollbar-thumb-rounded-full scrollbar-track-rounded-full">
                <div class="container px-6 mx-auto grid mb-19">

                    @yield('content')

                </div>
                @include('partials.footer.main-footer')
            </main>

        </div>
    </div>
</body>

</html>
