@extends('layouts.app')
@section('titleAdmin', 'Lịch coi thi tự động')
@section('content')
    <div class="h-10"></div>

    <div class="flex">
        <div class="mr-8 pt-3">
            <form action="{{ route('lichcoithi.store') }}" method="POST">
                @csrf
                {{-- {{dd($lichthis);}} --}}
                @if (!is_null($lt_not_panigate))
                    @foreach ($lt_not_panigate as $lt)
                        <input type="hidden" name="id[]" value="{{ $lt->id }}">
                        <input type="hidden" name="tenmonthi[]" value="{{ $lt->tenmonhoc }}">
                        <input type="hidden" name="cathi_id[]" value="{{ $lt->cathi_id }}">
                        <input type="hidden" name="giobatdau[]" value="{{ $lt->giobatdau }}">
                        <input type="hidden" name="gioketthuc[]" value="{{ $lt->gioketthuc }}">
                        <input type="hidden" name="phongthi_id[]" value="{{ $lt->phongthi_id }}">
                        <input type="hidden" name="ngaythi[]" value="{{ $lt->ngaythi }}">
                        <input type="hidden" name="giangvien_id1[]" value="{{ $lt->giangvien_id1 }}">
                        <input type="hidden" name="tengiangvien1[]" value="{{ $lt->tengiangvien1 }}">
                        <input type="hidden" name="giangvien_id2[]" value="{{ $lt->giangvien_id2 }}">
                        <input type="hidden" name="tengiangvien2[]" value="{{ $lt->tengiangvien2 }}">

                        <input type="hidden" name="bomon_id[]" value="{{ $lt->bomon_id }}">
                    @endforeach
                    <input type="submit" value="Lưu lịch coi thi"
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple cursor-pointer">
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
                    @if (!is_null($lichthis))
                        @foreach ($lichthis as $lt)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                    {{ $i++ }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $lt->tenmonhoc }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $lt->giobatdau }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $lt->gioketthuc }}
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
                    @endif
                </tbody>
            </table>
        </div>
        <div
            class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <div class="row">
                <div class="col w-full">
                    {{-- {{ $lichthis->links('pagination::tailwind') }} --}}
                </div>
            </div>
        </div>
    </div>






@endsection
