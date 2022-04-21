@extends('layout.layout_admin')
@section('titleAdmin', 'Thêm giảng viên')
@section('content-admin')
@include('partials.breadcumb', ['page' => 'Giảng viên', 'key' => 'Add', 'link' => route('giangvien.index')])
<div class="h-12"></div>

    <div class="container mx-auto px-4 h-full ">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-2/5 px-4 z-10 ">
                <div class="flex flex-col w-full mb-6 shadow-lg rounded-lg border-0 bg-white">
                    <div class="rounded-t mb-0 px-6 py-6">

                        <div class="text-center mb-3">
                            <h6 class="text-blueGray-500 text-sm font-bold">
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
                                <label class="block text-blueGray-600 font-bold mb-2" for="giangvien_id">
                                    {{ __('Mã giảng viên') }}
                                </label>
                                <input type="text" name="giangvien_id"
                                    class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="{{ $giangvien_id }}" required readonly autocomplete="giangvien_id" />
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-bold mb-2" for="tengiangvien">
                                    {{ __('Tên giảng viên') }}
                                </label>
                                <input type="text" name="tengiangvien"
                                    class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" required autocomplete="name" autofocus
                                    placeholder="{{ __('Nhập tên') }}" />
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-bold mb-2" for="email">
                                    {{ __('Email giảng viên') }}
                                </label>
                                <input type="email" name="email"
                                    class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" required autocomplete="email"
                                    placeholder="{{ __('Nhập email') }}" />
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-bold mb-2" for="sdt">
                                    {{ __('Số điện thoại') }}
                                </label>
                                <input type="tel" name="sdt"
                                    class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" required autocomplete="sdt"
                                    placeholder="{{ __('Nhập số điện thoại') }}" />
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-bold mb-2" for="diachi">
                                    {{ __('Địa chỉ') }}
                                </label>
                                <input type="text" name="diachi"
                                    class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" required autocomplete="diachi"
                                    placeholder="{{ __('Nhập địa chỉ') }}" />
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-bold mb-2" for="ngaysinh">
                                    {{ __('Ngày sinh') }}
                                </label>
                                <input type="date" name="ngaysinh"
                                    class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" required autocomplete="ngaysinh"/>
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-bold mb-2" for="bomon">
                                    {{ __('Bộ môn') }}
                                </label>
                                <select
                                    class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    aria-label="{{ __('Chọn bộ môn') }}" name="bomon">
                                    <option selected>{{ __('Chọn bộ môn') }}</option>
                                    {!! $htmlOptionBoMon !!}
                                </select>
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-bold mb-2" for="avatar">
                                    {{ __('Avatar') }}
                                </label>
                                <input type="file" name="avatar"
                                    class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" required autocomplete="avatar"/>
                            </div>

                            <div class="relative w-full mb-3 ">
                                <label class="block text-blueGray-600 font-bold mb-2">
                                    {{ __('Chọn con nhỏ') }}
                                </label>
                                <div class="flex justify-around">
                                    <div>
                                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="connho" id="connho1" value="1">
                                        <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault1">
                                            {{ __('Có con nhỏ') }}
                                        </label>
                                    </div>
                                    <div>
                                        <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="connho" id="connho2" value="0" checked>
                                        <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault2">
                                            {{ __('Không có con nhỏ') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="relative w-full mb-3">
                                <select
                                    class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    aria-label="{{ __('Chọn quyền giảng viên') }}" name="quyen">
                                    <option selected>{{ __('Chọn quyền') }}</option>
                                    {!! $htmlOptionQuyen !!}
                                </select>
                            </div>

                            <div class="flex justify-around mt-6">
                                <a
                                    class="bg-white text-blue-500 hover:bg-blue-500 hover:text-white text-sm font-bold uppercase px-6 py-3.5 rounded shadow hover:shadow-lg outline-none focus:outline-none w-20"
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
