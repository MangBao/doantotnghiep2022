@extends('layouts.app')
@section('titleAdmin', 'Quyền')
@section('content')
    <div class="h-10"></div>

    <div class="flex">
        <div class="mr-8 q-3">
            <a href="{{ route('phanquyen.create') }}" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Thêm quyền
            </a>
        </div>
<div class="h-2"></div>
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
                            Tên Quyền
                        </th>
                        <th class="px-4 py-3 text-sm">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($quyen as $q)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $i++ }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $q->role_name }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button
                                        onclick="event.preventDefault(); document.getElementById('popup-modal-{{ $q->id }}').classList.add('block'); document.getElementById('popup-modal-{{ $q->id }}').classList.remove('hidden');"
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
                        <div id="popup-modal-{{ $q->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-full bg-black bg-opacity-50 ">
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto mx-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 mt-44 animate-fadeInDown">
                                    <!-- Modal header -->
                                    <div class="flex justify-end p-2">
                                        <span
                                            onclick="event.preventDefault(); document.getElementById('popup-modal-{{ $q->id }}').classList.add('hidden'); document.getElementById('popup-modal-{{ $q->id }}').classList.remove('block');"
                                            class="cursor-pointer text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-toggle="popup-modal-{{ $q->id }}">
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
                                            Bạn có chắc muốn xóa {{ $q->role_name }} chứ ?
                                        </h3>
                                        <a href="{{ route('bomon.delete', [$q->id]) }}"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Vâng, tôi chắc !
                                        </a>
                                        <span
                                            onclick="event.preventDefault(); document.getElementById('popup-modal-{{ $q->id }}').classList.add('hidden'); document.getElementById('popup-modal-{{ $q->id }}').classList.remove('block');"
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
                    {{ $quyen->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>

@endsection
