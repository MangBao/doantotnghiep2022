@extends('layouts.app')
@section('titleAdmin', 'Edit lịch coi thi')
@section('content')
    <div class="h-10"></div>
    <div class="container mx-auto px-4 h-full down-md:mx-auto md:min-h-141">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-2/5 px-4 z-10 ">
                <div class="flex flex-col w-full mb-6 shadow-lg rounded-lg border-0 bg-white dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                    <div class="rounded-t mb-0 px-6 py-6">

                        <div class="text-center mb-3">
                            <h6 class="text-gray-700 dark:text-gray-400 text-sm font-bold">
                                {{ __('EDIT LỊCH COI THI') }}
                            </h6>
                        </div>

                        <hr class="mt-6 border-b-1 border-blueGray-300" />
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        {{-- {{ route('lichcoithi.store') }} --}}
                        <form method="POST" action="{{ route('lichcoithi.update', ['id' => $lct->id]) }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="ngaythi">
                                    {{ __('Ngày thi') }}
                                </label>
                                <input type="text" name="ngaythi"
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="{{ date('d/m/Y', strtotime($lct->ngaythi)) }}" required disabled autocomplete="ngaythi" />
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="user_id1">
                                    {{ __('Cán bộ 1') }}
                                </label>
                                <select id="user_id1"
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    aria-label="{{ __('Chọn cán bộ 1') }}" name="user_id1">
                                    <option >{{ __('Chọn cán bộ 1') }}</option>
                                    {!! $htmlOptionGiangVien1 !!}
                                </select>
                            </div>

                            <input type="hidden" id="tengiangvien1" name="tengiangvien1" value="">

                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="user_id2">
                                    {{ __('Cán bộ 2') }}
                                </label>
                                <select id="user_id2"
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    aria-label="{{ __('Chọn cán bộ 2') }}" name="user_id2">
                                    <option value="">{{ __('Chọn cán bộ 2') }}</option>
                                    {!! $htmlOptionGiangVien2 !!}
                                </select>
                            </div>

                            <input type="hidden" id="tengiangvien2" name="tengiangvien2" value="">

                            <div class="flex justify-around mt-6">
                                <a class="bg-white text-blue-500 hover:bg-blue-500 hover:text-white text-sm font-bold uppercase px-6 py-3.5 rounded shadow hover:shadow-lg outline-none focus:outline-none w-20"
                                    href="{{ route('lichcoithi.index') }}">
                                    {{ __('Hủy') }}
                                </a>
                                <input
                                    class="cursor-pointer bg-blue-500 text-white hover:bg-white hover:text-blue-500 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none w-24"
                                    type="submit" value="{{ __('Sửa') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="{{ asset('js/main.js') }} "></script> --}}
@endsection
