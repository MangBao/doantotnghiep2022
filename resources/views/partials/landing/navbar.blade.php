<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-700">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="/" class="flex items-center">
            <img src="/images/logo-ntu.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white hidden lg:block">Nha
                Trang University</span>
        </a>
        <div class="flex items-center md:order-2">
            @if (Auth::check())
                {{-- {{dd(session('sinhvien')['name'])}} --}}
                <button type="button" class="flex mr-3 text-sm rounded-full md:mr-0 pr-2" id="user-menu-button"
                    aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full"
                        src="{{ 'https://ui-avatars.com/api/?name=' . Auth::user()->name ?? 'Windmill' . '&color=7F9CF5&background=EBF4FF' }}"
                        alt="user photo">
                    <p class="hidden ml-2 text-xs text-left md:block">
                        <strong class="block font-medium dark:text-gray-400">Hi,
                            {{ Auth::user()->name }}</strong>
                        <span class="text-gray-500">{{ Auth::user()->email }}</span>
                    </p>
                </button>
                <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="dropdown">
                    <div class="py-3 px-4">
                        <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">
                            {{ Auth::user()->email }}
                        </span>
                    </div>
                    <ul class="py-1" aria-labelledby="dropdown">
                        <li>
                            <a href="/profilesv"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                {{ __('Đăng xuất') }}
                            </a>
                        </li>
                    </ul>
                </div>
            @else
                <ul class="hidden mt-4 md:flex md:space-x-8 md:mt-0 md:text-sm md:font-medium ">
                    <li>
                        <a href="/login"
                            class="px-5 py-1 text-white text-xs transition-colors duration-150 bg-purple-300 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Đăng nhập
                        </a>
                    </li>
                    <li>
                        <a href="/register"
                            class="px-5 py-1 text-white text-xs transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-300 focus:outline-none focus:shadow-outline-purple">
                            Đăng ký
                        </a>
                    </li>
                </ul>
            @endif

            <!-- Dropdown menu -->

            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                <li>
                    <a href="/"
                        class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"
                        aria-current="page">Trang chủ</a>
                </li>
                <li>
                    <a href="{{ route('lichthisv.index') }}"
                        class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Lịch thi
                    </a>
                </li>
                <li>
                    <a href="/home"
                        class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Cán bộ
                    </a>
                </li>
                <li class="md:hidden flex justify-around">
                    <a href="/login"
                        class="px-5 py-1 text-white text-xs transition-colors duration-150 bg-purple-300 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Đăng nhập
                    </a>
                    <a href="/register"
                        class="px-5 py-1 text-white text-xs transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-300 focus:outline-none focus:shadow-outline-purple">
                        Đăng ký
                    </a>
                </li>
                <li>
                    <a href="/lienhe"
                        class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Liên hệ
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
