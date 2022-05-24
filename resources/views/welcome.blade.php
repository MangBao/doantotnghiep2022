@extends('layouts.landing')
{{-- @section('titleAdmin', 'Phòng thi') --}}
@section('contentHome')
    {{-- Slider --}}
    <div id="indicators-carousel" class="relative dark:bg-gray-800" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="overflow-hidden relative h-48 sm:h-64 xl:h-80 2xl:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img src="https://xuconcept.com/wp-content/uploads/2021/11/tai-hinh-nen-mien-phi.jpg"
                    class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://cdn.tgdd.vn/Files/2020/06/08/1261696/moi-tai-bo-hinh-nen-asus-rog-2020-moi-nhat_800x450.jpg"
                    class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://cdn.trangcongnghe.vn/uploads/posts/2017-01/moi-tai-ve-200-tam-anh-nen-doc-la-danh-cho-may-tinh-phan-4_1.jpeg"
                    class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://pdp.edu.vn/wp-content/uploads/2021/01/hinh-nen-4k-tuyet-dep-cho-may-tinh.jpg"
                    class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://st.quantrimang.com/photos/image/2018/10/08/hinh-nen-may-tinh-1.jpg"
                    class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="hidden">Previous</span>
            </span>
        </button>
        <button type="button"
            class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="hidden">Next</span>
            </span>
        </button>
    </div>
    <div class="h-10"></div>
    {{-- News --}}
    <div class="sc-news">
        <div class="title px-14">
            <h2 class="font-bold text-xl dark:text-gray-400">Tin tức & sự kiện</h2>
        </div>
        <div class="h-4"></div>
        <div class="flex flex-wrap antialiased px-10" style="100vh">
            <div class="pb-6 px-5 flex flex-col w-full md:w-1/3 xl:w-1/4">
                <img src="https://source.unsplash.com/random/350x350" alt=" random imgee"
                    class="w-full object-cover object-center rounded-lg shadow-md">

                <div class="relative px-4 -mt-24  ">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-baseline">
                            <span
                                class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
                                New
                            </span>
                            <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
                                2 baths &bull; 3 rooms
                            </div>
                        </div>

                        <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">A random Title</h4>

                        <div class="mt-1">
                            $1800
                            <span class="text-gray-600 text-sm"> /wk</span>
                        </div>
                        <div class="mt-4">
                            <span class="text-teal-600 text-md font-semibold">4/5 ratings </span>
                            <span class="text-sm text-gray-600">(based on 234 ratings)</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="pb-6 px-5 flex flex-col w-full md:w-1/3 xl:w-1/4">
                <img src="https://source.unsplash.com/random/350x350" alt=" random imgee"
                    class="w-full object-cover object-center rounded-lg shadow-md">

                <div class="relative px-4 -mt-24  ">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-baseline">
                            <span
                                class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
                                New
                            </span>
                            <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
                                2 baths &bull; 3 rooms
                            </div>
                        </div>

                        <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">A random Title</h4>

                        <div class="mt-1">
                            $1800
                            <span class="text-gray-600 text-sm"> /wk</span>
                        </div>
                        <div class="mt-4">
                            <span class="text-teal-600 text-md font-semibold">4/5 ratings </span>
                            <span class="text-sm text-gray-600">(based on 234 ratings)</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="pb-6 px-5 flex flex-col w-full md:w-1/3 xl:w-1/4">
                <img src="https://source.unsplash.com/random/350x350" alt=" random imgee"
                    class="w-full object-cover object-center rounded-lg shadow-md">

                <div class="relative px-4 -mt-24  ">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-baseline">
                            <span
                                class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
                                New
                            </span>
                            <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
                                2 baths &bull; 3 rooms
                            </div>
                        </div>

                        <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">A random Title</h4>

                        <div class="mt-1">
                            $1800
                            <span class="text-gray-600 text-sm"> /wk</span>
                        </div>
                        <div class="mt-4">
                            <span class="text-teal-600 text-md font-semibold">4/5 ratings </span>
                            <span class="text-sm text-gray-600">(based on 234 ratings)</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="pb-6 px-5 flex flex-col w-full md:w-1/3 xl:w-1/4">
                <img src="https://source.unsplash.com/random/350x350" alt=" random imgee"
                    class="w-full object-cover object-center rounded-lg shadow-md">

                <div class="relative px-4 -mt-24  ">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-baseline">
                            <span
                                class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
                                New
                            </span>
                            <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
                                2 baths &bull; 3 rooms
                            </div>
                        </div>

                        <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">A random Title</h4>

                        <div class="mt-1">
                            $1800
                            <span class="text-gray-600 text-sm"> /wk</span>
                        </div>
                        <div class="mt-4">
                            <span class="text-teal-600 text-md font-semibold">4/5 ratings </span>
                            <span class="text-sm text-gray-600">(based on 234 ratings)</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="pb-6 px-5 flex flex-col w-full md:w-1/3 xl:w-1/4">
                <img src="https://source.unsplash.com/random/350x350" alt=" random imgee"
                    class="w-full object-cover object-center rounded-lg shadow-md">

                <div class="relative px-4 -mt-24  ">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-baseline">
                            <span
                                class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
                                New
                            </span>
                            <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
                                2 baths &bull; 3 rooms
                            </div>
                        </div>

                        <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">A random Title</h4>

                        <div class="mt-1">
                            $1800
                            <span class="text-gray-600 text-sm"> /wk</span>
                        </div>
                        <div class="mt-4">
                            <span class="text-teal-600 text-md font-semibold">4/5 ratings </span>
                            <span class="text-sm text-gray-600">(based on 234 ratings)</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="h-10"></div>
    {{-- Lich thi --}}
    <div class="sc-lichthi">
        <div class="title px-14">
            <h2 class="font-bold text-xl dark:text-gray-400">Lịch thi NTU</h2>
            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-16">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-700">
                                <th class="px-4 py-3 text-sm">
                                    #
                                </th>
                                <th class="px-4 py-3 text-sm">
                                    Môn thi
                                </th>
                                <th class="px-4 py-3 text-sm">
                                    Ca thi
                                </th>

                                <th class="px-4 py-3 text-sm">
                                    Phòng thi
                                </th>
                                <th class="px-4 py-3 text-sm">
                                    Ngày thi
                                </th>
                                <th class="px-4 py-3 text-sm">
                                    Cán bộ coi thi 1
                                </th>
                                <th class="px-4 py-3 text-sm">
                                    Cán bộ coi thi 2
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @isset($notification)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td colspan="10" class="px-6 py-4 text-center">
                                        {{ $notification }}
                                    </td>
                                </tr>
                            @endisset
                            @foreach ($lichcoithi as $lt)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">
                                        {{ $i++ }}
                                        </th>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $lt->tenmonthi }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $lt->cathi_id }}
                                    </td>

                                    <td class="px-4 py-3 text-sm">
                                        {{ $lt->phongthi_id }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ date('d/m/Y', strtotime($lt->ngaythi)) }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $lt->tengiangvien1 }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $lt->tengiangvien2 }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="h-10"></div>
@endsection
