@extends('layouts.app')
@section('titleAdmin', 'Edit buổi thi')
@section('content')
    <div class="h-10"></div>
    <div class="container mx-auto px-4 h-full down-md:mx-auto md:min-h-141">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-2/5 px-4 z-10 ">
                <div class="flex flex-col w-full mb-6 shadow-lg rounded-lg border-0 bg-white dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                    <div class="rounded-t mb-0 px-6 py-6">

                        <div class="text-center mb-3">
                            <h6 class="text-gray-700 dark:text-gray-400 text-sm font-bold">
                                {{ __('EDIT BUỔI THI MỚI') }}
                            </h6>
                        </div>

                        <hr class="mt-6 border-b-1 border-blueGray-300" />
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        {{-- {{ route('giangvien.store') }} --}}
                        <form method="POST" action="{{ route('buoithi.update', ['id' => $bt->id]) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="phongthi_id">
                                    {{ __('Phòng thi') }}
                                </label>
                                <select
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    aria-label="{{ __('Chọn phòng thi') }}" name="phongthi_id">
                                    <option value="">{{ __('Chọn phòng') }}</option>
                                    {!! $htmlOptionPhongThi !!}
                                </select>
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="ngaythi">
                                    {{ __('Ngày thi') }}
                                </label>
                                <input type="date" name="ngaythi"
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="{{ $bt->ngaythi }}" required autocomplete="ngaythi" />
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="cathi_id">
                                    {{ __('Ca thi') }}
                                </label>
                                <select
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    aria-label="{{ __('Chọn ca thi') }}" name="cathi_id">
                                    <option value="">{{ __('Chọn ca') }}</option>
                                    {!! $htmlOptionCaThi !!}
                                </select>
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="monthi_id">
                                    {{ __('Môn thi') }}
                                </label>
                                <select
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    aria-label="{{ __('Chọn bộ môn') }}" name="monthi_id">
                                    <option value="">{{ __('Chọn bộ môn') }}</option>
                                    {!! $htmlOptionMonThi !!}
                                </select>
                            </div>

                            <div class="flex justify-around mt-6">
                                <a class="bg-white text-blue-500 hover:bg-blue-500 hover:text-white text-sm font-bold uppercase px-6 py-3.5 rounded shadow hover:shadow-lg outline-none focus:outline-none w-20"
                                    href="{{ route('buoithi.index') }}">
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

@endsection
