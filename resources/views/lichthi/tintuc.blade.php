@extends('layouts.landing')
@section('contentHome')
    <div class="h-10"></div>

    <div class="container mx-auto grid px-3 lg:px-0">
        <div class="mr-8 pt-3 w-1/3 ">
            <form action="
            @if (config('app.env') === 'local')
                {{ route('lichthisv.tintuc') }}
            @else
                {{ secure_url('lichthisv/tintuc') }}
            @endif
            " method="get">
                {{-- @csrf --}}
                <input
                    class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                    type="text" placeholder="Nhập từ khóa" name="param" aria-label="Search" />
            </form>

        </div>
    </div>
    <div class="h-8 dark:bg-gray-700"></div>
    <div class="w-full fix-respon overflow-hidden rounded-lg shadow-xs mb-16 container mx-auto grid mb-19 px-3 lg:px-0">

        <div class="sc-news">
            <div class="title px-14">
                <div class="max-w-168">
                    <h2 class="font-bold text-xl dark:text-gray-400 hover:text-blue-500">Tin tức & sự kiện</h2>
                </div>
            </div>
            <div class="h-4"></div>
            <div class="flex flex-wrap antialiased px-10" style="100vh">
                @foreach ($ttn as $tt)
                    <div class="pb-6 px-5 flex flex-col w-full md:w-1/3 xl:w-1/4">
                        <a href="{{route('tintuc.show', [$tt->id])}}">
                            <img src="/images/tintuc/{{ $tt->image1 }}" alt=" random imgee"
                            class="w-full object-cover object-center rounded-lg shadow-md h-72">
                        </a>
                        <div class="relative px-4 -mt-20">
                            <a href="{{route('tintuc.show', [$tt->id])}}">
                                <div class="bg-white p-6 rounded-lg shadow-lg">
                                    <div class="flex items-baseline">
                                        <span
                                            class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
                                            New
                                        </span>
                                    </div>

                                    <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">{{ $tt->title }}</h4>

                                    <div class="mt-1">
                                        {{ date('l, M d, Y', strtotime($tt->created_at)) }}
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>

        <div
            class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <div class="row">
                <div class="col w-full">
                    {{ $ttn->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
    <div class="h-2"></div>
@endsection
