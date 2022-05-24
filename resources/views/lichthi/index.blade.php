@extends('layouts.landing')
@section('contentHome')
    <div class="h-10"></div>

    <div class="flex">
        @if (session('sinhvien'))
            <div class="mr-8 pt-3">
                <a href="{{ route('lichthisv.lichcuatoi') }}"
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Lịch của tôi
                </a>
            </div>
            <div class="mr-8 pt-3">
                <a href="{{ route('lichthisv.export') }}"
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Export Lịch thi
                </a>
            </div>
        @endif
        @if (session('success'))
            <div class="animate-fadeInDown flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @elseif (session('error'))
            <div class="animate-fadeInDown flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
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
                        <th class="px-4 py-3 text-sm">
                            Actions
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

                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href=""
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>

                            </td>
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
