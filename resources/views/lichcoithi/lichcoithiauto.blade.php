@extends('layouts.app')
@section('titleAdmin', 'Lịch coi thi tự động')
@section('content')
    @if (!is_null($lt_not_panigate))
        <div class="h-10"></div>

        <div class="flex">
            <div class="mr-8 pt-3">
                <form action="{{ route('lichcoithi.store') }}" method="POST">
                    @csrf
                    {{-- {{dd($lichthis);}} --}}

                    @foreach ($lt_not_panigate as $lt)
                        <input type="hidden" name="id[]" value="{{ $lt->id }}">
                        <input type="hidden" name="tenmonthi[]" value="{{ $lt->tenmonhoc }}">
                        <input type="hidden" name="cathi_id[]" value="{{ $lt->cathi_id }}">
                        <input type="hidden" name="giobatdau[]" value="{{ $lt->giobatdau }}">
                        <input type="hidden" name="gioketthuc[]" value="{{ $lt->gioketthuc }}">
                        <input type="hidden" name="phongthi_id[]" value="{{ $lt->phongthi_id }}">
                        <input type="hidden" name="ngaythi[]" value="{{ $lt->ngaythi }}">
                        <input type="hidden" name="canbogiangday[]" value="{{ $lt->canbogiangday }}">
                        <input type="hidden" name="hinhthucthi[]" value="{{ $lt->hinhthucthi }}">
                        <input type="hidden" name="user_id1[]" value="{{ $lt->user_id1 }}">
                        <input type="hidden" name="tengiangvien1[]" value="{{ $lt->tengiangvien1 }}">
                        <input type="hidden" name="user_id2[]" value="{{ $lt->user_id2 }}">
                        <input type="hidden" name="tengiangvien2[]" value="{{ $lt->tengiangvien2 }}">

                        <input type="hidden" name="bomon_id[]" value="{{ $lt->bomon_id }}">
                    @endforeach
                    <input type="submit" value="Lưu lịch coi thi"
                        class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple cursor-pointer">

                </form>
            </div>
            <div class="h-2"></div>
        </div>

    @endif
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
                            Cán bộ giảng dạy
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
                                    {{ $lt->ten_canbogd }}
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
