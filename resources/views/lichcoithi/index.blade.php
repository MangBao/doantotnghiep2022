@extends('layouts.app')
@section('titleAdmin', 'Lịch coi thi')
@section('content')

    <div class="h-10"></div>

    <div class="flex justify-between">
        <div class="flex">
            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                <div class="mr-8 pt-3">
                    <a href="{{ route('lichcoithi.lichcoithiauto') }}"
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Lịch tự động
                    </a>
                </div>
            @endif
            <div class="mr-8 pt-3">
                <a href="{{ route('lichcoithi.cuatoi') }}"
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Lịch của tôi
                </a>
            </div>
            @if ($lichcoithi != null)
                <div class="mr-8 pt-3">
                    <a href="{{ route('lichcoithi.export') }}"
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Export Lịch coi thi
                    </a>
                </div>
            @endif
        </div>
        <div class="mr-8 pt-3">
            <form action="
            @if (config('app.env') === 'local')
                {{ route('lichcoithi.index') }}
            @else
                {{ secure_url('lichcoithi.index') }}
            @endif
            " method="get">
                {{-- @csrf --}}
                <input
                    class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                    type="text" placeholder="Nhập từ khóa" name="param" aria-label="Search" />
            </form>

        </div>
    </div>
    <div class="h-8"></div>
    <div class="w-full fix-respon overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
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
                        <th class="px-4 py-3 text-sm">
                            Chức năng
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

                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{ route('lichcoithi.edit', [$lt->id]) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    <button
                                        onclick="event.preventDefault(); document.getElementById('popup-modal-{{ $lt->id }}').classList.add('block'); document.getElementById('popup-modal-{{ $lt->id }}').classList.remove('hidden');"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>

                            </td>
                        </tr>
                        <div id="popup-modal-{{ $lt->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-full bg-black bg-opacity-50 ">
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto mx-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 mt-44 animate-fadeInDown">
                                    <!-- Modal header -->
                                    <div class="flex justify-end p-2">
                                        <span
                                            onclick="event.preventDefault(); document.getElementById('popup-modal-{{ $lt->id }}').classList.add('hidden'); document.getElementById('popup-modal-{{ $lt->id }}').classList.remove('block');"
                                            class="cursor-pointer text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-toggle="popup-modal-{{ $lt->id }}">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 pt-0 text-center">
                                        <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                            Bạn có chắc muốn xóa lịch này chứ ?
                                        </h3>
                                        <a href="{{ route('lichcoithi.delete', [$lt->id]) }}"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Vâng, tôi chắc !
                                        </a>
                                        <span
                                            onclick="event.preventDefault(); document.getElementById('popup-modal-{{ $lt->id }}').classList.add('hidden'); document.getElementById('popup-modal-{{ $lt->id }}').classList.remove('block');"
                                            class="cursor-pointer text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            Không, để sau
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div
            class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <div class="row">
                <div class="col w-full">
                    {{ $lichcoithi->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>


@endsection
