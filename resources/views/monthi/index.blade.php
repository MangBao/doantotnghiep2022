@extends('layout.layout_admin')
@section('titleAdmin', 'Giảng viên')
@section('content-admin')
    @include('partials.breadcumb', ['page' => 'Giảng viên', 'key' => 'Index'])
    <div class="h-12"></div>
    <a href="{{ route('giangvien.create') }}" class="btn-primary">
        Thêm giảng viên
    </a>
    <div class="h-6"></div>
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Mã giảng viên
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tên giảng viên
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ngày sinh
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Con nhỏ
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Số điện thoại
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Chức năng</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gvs as $gv)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $gv->giangvien_id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $gv->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $gv->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $gv->ngaysinh }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($gv->connho == 1)
                                        {{ __('Có') }}
                                    @else
                                        {{ __('Không có') }}
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $gv->sodienthoai }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('giangvien.edit', [$gv->id]) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> |
                                    <a href="{{ route('giangvien.show', [$gv->id]) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a> |
                                    <span onclick="event.preventDefault(); document.getElementById('popup-modal').classList.add('block'); document.getElementById('popup-modal').classList.remove('hidden');"

                                        class="cursor-pointer font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</span>
                                </td>
                            </tr>
                            <div id="popup-modal" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-full bg-slate-600">
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto mx-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 mt-44">
                                    <!-- Modal header -->
                                    <div class="flex justify-end p-2">
                                        <span onclick="event.preventDefault(); document.getElementById('popup-modal').classList.add('hidden'); document.getElementById('popup-modal').classList.remove('block');"
                                            class="cursor-pointer text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-toggle="popup-modal">
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
                                        <a href="{{ route('giangvien.delete', [$gv->id]) }}"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Yes, I'm sure
                                        </a>
                                        <span onclick="event.preventDefault(); document.getElementById('popup-modal').classList.add('hidden'); document.getElementById('popup-modal').classList.remove('block');"
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
                {{ $gvs->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
@endsection
