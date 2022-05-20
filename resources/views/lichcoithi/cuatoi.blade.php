@extends('layouts.app')
@section('titleAdmin', 'Lịch của tôi')
@section('content')

    <div class="h-10"></div>

    <div class="flex">
        {{-- <div class="mr-8 pt-3">
        <a href="{{ route('lichcoithi.lichcoithiauto') }}" class="btn-primary">
            Lịch coi thi tự động
        </a>
    </div> --}}
        <div class="mr-8 pt-1">
            {{-- {{ route('lichcoithi.updatethongbao') }} --}}
            <form action="{{ route('lichcoithi.updatethongbao') }}" method="POST">
                @csrf
                {{-- {{dd($lichthis);}} --}}
                @if ($giangvien->thongbaomail == 1)
                    <input type="hidden" name="thongbaomail" value="0">
                    <button type="sultit"
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <i class="fas fa-bell-slash"></i>
                        <span class="ml-2">Tắt thông báo</span>
                    </button>
                    {{-- <input type="sultit" value="Tắt thông báo" class="btn-primary cursor-pointer"> --}}
                @elseif ($giangvien->thongbaomail == 0)
                    <input type="hidden" name="thongbaomail" value="1">
                    {{-- <input type="sultit" value="Bật thông báo" class="btn-primary cursor-pointer"> --}}
                    <button type="sultit"
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <i class="fas fa-bell"></i>
                        <span class="ml-2">Bật thông báo</span>
                    </button>
                @endif
            </form>
        </div>
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
    <div class="h-8"></div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
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
                            Giờ bắt đầu
                        </th>
                        <th class="px-4 py-3 text-sm">
                            Giờ kết thúc
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
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
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
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $lt->giobatdau)->format('H:i') }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $lt->gioketthuc)->format('H:i') }}
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
                                    <a href="{{ route('lichcoithi.xinvang', [$lt->id]) }}" title="Xin vắng"
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
                        <div id="popup-modal-{{ $lt->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-full bgModal ">
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
                                            Bạn có chắc muốn xóa {{ $lt->tenbomon }} chứ ?
                                        </h3>
                                        <a href="{{ route('bomon.delete', [$lt->id]) }}"
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
