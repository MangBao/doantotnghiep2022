@extends('layout.layout_admin')
@section('titleAdmin', 'Đơn xin vắng')
@section('content-admin')
    @include('partials.breadcumb', ['page' => 'Đơn xin vắng', 'key' => 'Index', 'link' => route('donxinvang.index')])
    <div class="h-12"></div>

    <div class="flex">
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
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tên giảng viên
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ca
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ngày vắng
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tình trạng đơn
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Chức năng</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($notification)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td colspan="10" class="px-6 py-4 text-center">
                                {{ $notification }}
                            </td>
                        </tr>
                        @endisset
                        @foreach ($donxinvangs as $d)
                            <tr title="Lý do: {{ $d->lydo }}"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $i++ }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $d->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{
                                        $d->cathi_id
                                    }}
                                </td>
                                <td class="px-6 py-4">
                                    {{
                                        date('d/m/Y', strtotime($d->ngayxinvang))
                                    }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($d->trangthai == 0)
                                        {{ __('Chưa xác nhận') }}
                                    @else
                                        {{ __('Đã xác nhận') }}
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <span onclick="event.preventDefault(); document.getElementById('popupModalDuyet-{{$d->id}}').classList.add('block'); document.getElementById('popupModalDuyet-{{$d->id}}').classList.remove('hidden');"
                                            class="cursor-pointer font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        Duyệt đơn
                                    </span> |
                                    <span onclick="event.preventDefault(); document.getElementById('popupModalDel-{{$d->id}}').classList.add('block'); document.getElementById('popupModalDel-{{$d->id}}').classList.remove('hidden');"
                                            class="cursor-pointer font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        Delete
                                    </span>
                                </td>
                            </tr>
                            <div id="popupModalDel-{{$d->id}}" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-full bgModal ">
                                <div class="relative p-4 w-full max-w-md h-full md:h-auto mx-auto">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 mt-44 animate-fadeInDown">
                                        <!-- Modal header -->
                                        <div class="flex justify-end p-2">
                                            <span onclick="event.preventDefault(); document.getElementById('popupModalDel-{{$d->id}}').classList.add('hidden'); document.getElementById('popupModal-{{$d->id}}').classList.remove('block');"
                                                class="cursor-pointer text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                data-modal-toggle="popupModalDel-{{$d->id}}">
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
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                                                delete this product?</h3>
                                            <a href="{{ route('donxinvang.delete', [$d->id]) }}"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </a>
                                            <span onclick="event.preventDefault(); document.getElementById('popupModalDel-{{$d->id}}').classList.add('hidden'); document.getElementById('popupModal-{{$d->id}}').classList.remove('block');"
                                                class="cursor-pointer text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                cancel</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="popupModalDuyet-{{$d->id}}" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-full bgModal ">
                                <div class="relative p-4 w-full max-w-md h-full md:h-auto mx-auto">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 mt-44 animate-fadeInDown">
                                        <!-- Modal header -->
                                        <div class="flex justify-end p-2">
                                            <span onclick="event.preventDefault(); document.getElementById('popupModalDuyet-{{$d->id}}').classList.add('hidden'); document.getElementById('popupModalDuyet-{{$d->id}}').classList.remove('block');"
                                                class="cursor-pointer text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                data-modal-toggle="popupModalDuyet-{{$d->id}}">
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
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Bạn chắc chắn xác nhận vắng cho {{ $d->name }}?</h3>
                                            <a href="{{ route('donxinvang.duyetdon', [$d->id]) }}"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </a>
                                            <span onclick="event.preventDefault(); document.getElementById('popupModalDuyet-{{$d->id}}').classList.add('hidden'); document.getElementById('popupModalDuyet-{{$d->id}}').classList.remove('block');"
                                                class="cursor-pointer text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                cancel</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>

        <!-- Delete Product Modal -->


        <div class="h-6"></div>
        <div class="row">
            <div class="col w-full">
                {{-- {{ $ds->links('pagination::tailwind') }} --}}
            </div>
        </div>
    </div>
@endsection
