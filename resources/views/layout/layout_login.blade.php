<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="{{ @asset('images/logo-ntu.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('titleLogin')</title>
</head>

<body class="text-[rgb(30,41,59)] antialiased">
    <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-primary">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                    href="../../index.html">
                    <img src="{{ @asset('images/ntu-hrm.png') }}" alt="">
                </a>
            </div>
        </div>
    </nav>
    <main>
        <section class="relative w-full h-full py-40 min-h-screen">
            <div class="absolute top-0 w-full h-full bg-full bg-no-repeat"
                style="background-image: url(../../assets/img/register_bg_2.png)">
            </div>

            @yield('body')

            <footer class="absolute w-full bottom-0 bg-blueGray-800 pb-6 bg-primary">
                <div class="container mx-auto px-4">
                    <hr class="mb-6 border-b-1 border-blueGray-600" />
                    <div class="flex flex-wrap items-center md:justify-between justify-center">
                        <div class="w-full md:w-4/12 px-4">
                            <div class="text-sm text-white font-semibold py-1 text-center md:text-left">
                                Copyright © <span id="get-current-year">2022</span>
                                <a href="https://www.creative-tim.com?ref=njs-login"
                                    class="text-white hover:text-blueGray-300 text-sm font-semibold py-1">Nha Trang University</a>
                            </div>
                        </div>
                        <div class="w-full md:w-8/12 px-4">
                            <ul class="flex flex-wrap list-none md:justify-end justify-center">
                                <li>
                                    <a href="https://www.creative-tim.com?ref=njs-login"
                                        class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3">Mang Bảo</a>
                                </li>
                                <li>
                                    <a href="https://www.creative-tim.com/presentation?ref=njs-login"
                                        class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3">About
                                        Me</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </section>
    </main>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
