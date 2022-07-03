@extends('layouts.landing')
@section('contentHome')
    <div class="h-10"></div>

    <div class="container mx-auto grid px-3 lg:px-0">
        @if (Auth::check() && Auth::user()->role_id == 4)
            <div class="mr-8 pt-3">
                <a href="{{ route('lichthisv.lichcuatoi') }}"
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Lịch của tôi
                </a>
            </div>
        @endif
        <div class="mr-8 pt-3 w-1/3 mt-3">
            <form action="
            @if (config('app.env') === 'local')
                {{ route('lichthisv.index') }}
            @else
                {{ secure_url('lichthisv.index') }}
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
                            Hình thức
                        </th>
                        <th class="px-4 py-3 text-sm">
                            Phòng thi
                        </th>
                        <th class="px-4 py-3 text-sm">
                            Ngày thi
                        </th>
                        <th class="px-4 py-3 text-sm">
                            Cán bộ giảng dạy
                        </th>
                        <th class="px-4 py-3 text-sm">
                            Cán bộ coi thi 1
                        </th>
                        <th class="px-4 py-3 text-sm">
                            Cán bộ coi thi 2
                        </th>
                        @if (Auth::check() && Auth::user()->role_id == 4)
                            <th class="px-4 py-3 text-sm">
                                Chức năng
                            </th>
                        @endif
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
                    @foreach ($lichthi as $lt)
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
                                {{ $lt->hinhthucthi }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $lt->phongthi_id }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ date('d/m/Y', strtotime($lt->ngaythi)) }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $lt->name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $lt->tengiangvien1 }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $lt->tengiangvien2 }}
                            </td>

                            @if (Auth::check() && Auth::user()->role_id == 4)
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="{{ route('lichthisv.store', [$lt->id]) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Thêm">
                                            <svg class="w-5 h-5" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                            </svg>
                                        </a>
                                    </div>

                                </td>
                            @endif

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div
            class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <div class="row">
                <div class="col w-full">
                    {{ $lichthi->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
    <div class="h-2"></div>
@endsection
