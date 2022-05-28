@extends('layouts.app')
@section('titleAdmin', 'Thêm giảng viên')
@section('content')

    <div class="h-2"></div>
    @if (session('error'))
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
    <div class="container mx-auto px-4 h-full down-md:mx-auto md:min-h-141">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-2/5 px-4 z-10 ">
                <div class="flex flex-col w-full mb-6 shadow-lg rounded-lg border-0 bg-white dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                    <div class="rounded-t mb-0 px-6 py-6">

                        <div class="text-center mb-3">
                            <h6 class="text-gray-700 dark:text-gray-400 text-sm font-bold">
                                {{ __('THÊM GIẢNG VIÊN MỚI') }}
                            </h6>
                        </div>

                        <hr class="mt-6 border-b-1 border-blueGray-300" />
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        {{-- {{ route('giangvien.store') }} --}}
                        <form method="POST" action="{{ route('giangvien.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="user_id">
                                    {{ __('Mã giảng viên') }}
                                </label>
                                <input type="text" name="user_id"
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="{{ $user_id }}" required readonly autocomplete="user_id" />
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="tengiangvien">
                                    {{ __('Tên giảng viên') }}
                                </label>
                                <input type="text" name="tengiangvien"
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" required autocomplete="name" autofocus placeholder="{{ __('Nhập tên') }}" />
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="email">
                                    {{ __('Email giảng viên') }}
                                </label>
                                <input type="email" name="email"
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" required autocomplete="email" placeholder="{{ __('Nhập email') }}" />
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="sdt">
                                    {{ __('Số điện thoại') }}
                                </label>
                                <input type="tel" name="sdt"
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" required autocomplete="sdt" placeholder="{{ __('Nhập số điện thoại') }}" />
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="diachi">
                                    {{ __('Địa chỉ') }}
                                </label>
                                <input type="text" name="diachi"
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" required autocomplete="diachi" placeholder="{{ __('Nhập địa chỉ') }}" />
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="ngaysinh">
                                    {{ __('Ngày sinh') }}
                                </label>
                                <input type="date" name="ngaysinh"
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" required autocomplete="ngaysinh" />
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="bomon">
                                    {{ __('Bộ môn') }}
                                </label>
                                <select
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    aria-label="{{ __('Chọn bộ môn') }}" name="bomon">
                                    <option selected>{{ __('Chọn bộ môn') }}</option>
                                    {!! $htmlOptionBoMon !!}
                                </select>
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="avatar">
                                    {{ __('Avatar') }}
                                </label>
                                <input type="file" name="avatar"
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" required autocomplete="avatar" />
                            </div>

                            <div class="relative w-full mb-3 ">
                                <label class="text-gray-700 dark:text-gray-400">
                                    {{ __('Chọn con nhỏ') }}
                                </label>
                                <div class="flex justify-around">

                                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400" for="flexRadioDefault1">
                                        <input
                                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                            type="radio" name="connho" id="connho1" value="1">
                                        {{ __('Có con nhỏ') }}
                                    </label>

                                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400" for="flexRadioDefault2">
                                        <input
                                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                            type="radio" name="connho" id="connho2" value="0" >
                                        {{ __('Không có con nhỏ') }}
                                    </label>
                                </div>
                            </div>

                            <div class="relative w-full mb-3">
                                <select
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    aria-label="{{ __('Chọn quyền giảng viên') }}" name="quyen">
                                    <option selected>{{ __('Chọn quyền') }}</option>
                                    {!! $htmlOptionQuyen !!}
                                </select>
                            </div>

                            <div class="flex justify-around mt-6">
                                <a class="bg-white text-blue-500 hover:bg-blue-500 hover:text-white text-sm font-bold uppercase px-6 py-3.5 rounded shadow hover:shadow-lg outline-none focus:outline-none w-20"
                                    href="{{ route('giangvien.index') }}">
                                    {{ __('Hủy') }}
                                </a>
                                <input
                                    class="cursor-pointer bg-blue-500 text-white hover:bg-white hover:text-blue-500 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none w-24"
                                    type="submit" value="{{ __('Thêm') }}">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
