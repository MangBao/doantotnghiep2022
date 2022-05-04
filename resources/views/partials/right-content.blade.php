<div class="relative md:ml-64 bg-blueGray-50">
    <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
        <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
            <p class="text-white text-sm uppercase hidden lg:inline-block font-semibold">Dashboard</p>
            <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
                <span class="text-blueGray-500 block text-white cursor-pointer"
                    onclick="openDropdown(event,'user-dropdown')">
                    <div class="items-center flex">
                        <h4 class="px-4">{{ Auth::user()->name }}</h4>
                        <span class="w-12 h-12 text-sm bg-blueGray-200 inline-flex items-center justify-center rounded-full">
                            <img alt="..." class="w-full rounded-full align-middle border-none shadow-lg"
                                src="{{ @asset('images/logo-ntu.png') }}" />
                        </span>
                    </div>
                </span>
                <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                    id="user-dropdown">
                    <a href="/trangcanhan" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
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

    <div class="relative bg-primary md:pt-32 pb-20 pt-12"></div>

    <div class="px-4 md:px-10 mx-auto w-full -m-12">

        @yield('content-admin')

        <div class="h-10"></div>
        @include('partials.footer')

    </div>
</div>
