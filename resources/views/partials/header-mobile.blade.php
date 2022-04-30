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
        <a class="text-blueGray-500 block" href="#" onclick="openDropdown(event,'user-responsive-dropdown')">
            <div class="items-center flex">
                <span
                    class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"><img
                        alt="..." class="w-full rounded-full align-middle border-none shadow-lg"
                        src="{{ @asset('images/logo-ntu.png') }}" /></span>
            </div>
        </a>
        <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
            id="user-responsive-dropdown">
            <h4 class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
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
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </li>
</ul>
