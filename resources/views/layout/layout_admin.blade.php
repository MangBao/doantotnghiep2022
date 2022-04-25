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
    <title>@yield('titleAdmin')</title>
</head>

<body class="text-blueGray-700 antialiased">
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
        {{-- Nav mobile --}}
        <nav
            class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
            <div
                class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
                <button
                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                    type="button" onclick="toggleNavbar('example-collapse-sidebar')">
                    <i class="fas fa-bars"></i>
                </button>
                <a class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                    href="/">
                    Nha Trang University
                </a>
                <ul class="md:hidden items-center flex flex-wrap list-none">
                    <li class="inline-block relative">
                        <a class="text-blueGray-500 block py-1 px-3" href="#pablo"
                            onclick="openDropdown(event,'notification-dropdown')"><i class="fas fa-bell"></i></a>
                        <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                            id="notification-dropdown">
                            <a href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Something
                                else here</a>
                            <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                            <a href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Seprated
                                link</a>
                        </div>
                    </li>
                    <li class="inline-block relative">
                        <a class="text-blueGray-500 block" href="#"
                            onclick="openDropdown(event,'user-responsive-dropdown')">
                            <div class="items-center flex">
                                <span
                                    class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"><img
                                        alt="..." class="w-full rounded-full align-middle border-none shadow-lg"
                                        src="{{ @asset('images/logo-ntu.png') }}" /></span>
                            </div>
                        </a>
                        <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                            id="user-responsive-dropdown">
                            <h4
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                {{ Auth::user()->name }}
                            </h4>
                            <a href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                Trang cá nhân
                            </a>
                            <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="hidden">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
                    id="example-collapse-sidebar">
                    <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200">
                        <div class="flex flex-wrap">
                            <div class="w-6/12">
                                <a class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                                    href="/">
                                    Nha Trang University
                                </a>
                            </div>
                            <div class="w-6/12 flex justify-end">
                                <button type="button"
                                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                                    onclick="toggleNavbar('example-collapse-sidebar')">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr class="my-4 md:min-w-full" />
                    <!-- Heading -->
                    <h6
                        class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                        Admin Layout Pages
                    </h6>
                    <!-- Navigation -->

                    <ul id="list-nav" class="md:flex-col md:min-w-full flex flex-col list-none">
                            <li class="items-center">
                                <a href="/giangvien"
                                    class="text-xs uppercase py-3 font-bold block text-pink-500 hover:text-pink-600">
                                    <i class="fas fa-tv mr-2 text-sm opacity-75"></i>
                                    Giảng viên
                                </a>
                            </li>

                            <li class="items-center">
                                <a href="/phongthi"
                                    class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                                    <i class="fas fa-tools mr-2 text-sm text-blueGray-300"></i>
                                    Phòng thi
                                </a>
                            </li>

                            <li class="items-center">
                                <a href="/monhoc"
                                    class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                                    <i class="fas fa-table mr-2 text-sm text-blueGray-300"></i>
                                    Môn học
                                </a>
                            </li>

                            <li class="items-center">
                                <a href="/buoithi"
                                    class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                                    <i class="fas fa-map-marked mr-2 text-sm text-blueGray-300"></i>
                                    Buổi thi
                                </a>
                            </li>

                            <li class="items-center">
                                <a href="/lichcoithi"
                                    class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                                    <i class="fas fa-map-marked mr-2 text-sm text-blueGray-300"></i>
                                    Lịch coi thi
                                </a>
                            </li>

                    </ul>

                </div>
            </div>
        </nav>
        {{-- End nav mobile --}}

        <div class="relative md:ml-64 bg-blueGray-50">
            {{-- Nav desktop --}}
            <nav
                class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
                <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
                    <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
                        href="./index.html">Dashboard</a>

                    <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
                        <a class="text-blueGray-500 block text-white" href="#`"
                            onclick="openDropdown(event,'user-dropdown')">
                            <div class="items-center flex">
                                <h4 class="px-4">{{ Auth::user()->name }}</h4>
                                <span
                                    class="w-12 h-12 text-sm bg-blueGray-200 inline-flex items-center justify-center rounded-full">

                                    <img alt="..." class="w-full rounded-full align-middle border-none shadow-lg"
                                        src="{{ @asset('images/logo-ntu.png') }}" />
                                </span>
                            </div>
                        </a>
                        <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                            id="user-dropdown">
                            <a href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                Trang cá nhân
                            </a>

                            <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="hidden">
                                @csrf
                            </form>
                        </div>
                    </ul>
                </div>
            </nav>
            {{-- End nav desktop --}}

            <div class="relative bg-primary md:pt-32 pb-20 pt-12"></div>

            <div class="px-4 md:px-10 mx-auto w-full -m-12">

                @yield('content-admin')

                <div class="h-10"></div>
                <footer class="block py-4">
                    <div class="container mx-auto px-4">
                        <hr class="mb-4 border-b-1 border-blueGray-200" />
                        <div class="flex flex-wrap items-center md:justify-between justify-center">
                            <div class="w-full md:w-4/12 px-4">
                                <div class="text-sm text-blueGray-500 font-semibold py-1 text-center md:text-left">
                                    Copyright © <span id="get-current-year">2022</span>
                                    <a href="https://www.creative-tim.com?ref=njs-dashboard"
                                        class="text-blueGray-500 hover:text-blueGray-700 text-sm font-semibold py-1">
                                        Nha Trang University
                                    </a>
                                </div>
                            </div>
                            <div class="w-full md:w-8/12 px-4">
                                <ul class="flex flex-wrap list-none md:justify-end justify-center">
                                    <li>
                                        <a href="/"
                                            class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                                            Mang Bảo
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/"
                                            class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                                            About Me
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }} "></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="{{ asset('js/main.js') }} "></script>

    <script type="text/javascript">
        /* Make dynamic date appear */
        // (function() {
        //     if (document.getElementById("get-current-year")) {
        //         document.getElementById(
        //             "get-current-year"
        //         ).innerHTML = new Date().getFullYear();
        //     }
        // })();
    </script>
</body>

</html>
