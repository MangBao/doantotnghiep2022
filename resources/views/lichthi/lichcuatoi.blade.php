@extends('layouts.landing')
@section('contentHome')
    <div class="h-10"></div>

    <div class="container mx-auto flex">
        @if (Auth::check() && Auth::user()->role_id == 4)
            <form action="{{ route('lichthisv.updatethongbao') }}" method="POST">
                @csrf
                {{-- {{dd($lichthis);}} --}}
                @if (Auth::user()->thongbaomail == 1)
                    <input type="hidden" name="thongbaomail" value="0">
                    <button type="submit"
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <i class="fas fa-bell-slash"></i>
                        <span class="ml-2">Tắt thông báo</span>
                    </button>
                    {{-- <input type="submit" value="Tắt thông báo" class="btn-primary cursor-pointer"> --}}
                @elseif (Auth::user()->thongbaomail == 0)
                    <input type="hidden" name="thongbaomail" value="1">
                    {{-- <input type="submit" value="Bật thông báo" class="btn-primary cursor-pointer"> --}}
                    <button type="submit"
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <i class="fas fa-bell"></i>
                        <span class="ml-2">Bật thông báo</span>
                    </button>
                @endif
            </form>
            <div class="ml-8 pt-3">
                <a href="{{ route('lichthisv.export') }}"
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Export Lịch thi
                </a>
            </div>
        @endif

    </div>
    <div class="h-8 dark:bg-gray-700"></div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-16 container mx-auto grid mb-19">
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
                        @if (Auth::check() && Auth::user()->role_id == 4)
                            <th class="px-4 py-3 text-sm">
                                Actions
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

                            @if (Auth::check() && Auth::user()->role_id == 4)
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="{{ route('lichthisv.delete', [$lt->id]) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Thêm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
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
