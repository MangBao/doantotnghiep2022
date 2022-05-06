@extends('layout.layout_admin')
@section('titleAdmin', 'Thêm Phòng thi')
@section('content-admin')
    @include('partials.breadcumb', [
        'page' => 'Phòng thi',
        'key' => 'Add',
        'link' => route('phongthi.index'),
    ])
    <div class="h-12"></div>
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
                <div class="flex flex-col w-full mb-6 shadow-lg rounded-lg border-0 bg-white">
                    <div class="rounded-t mb-0 px-6 py-6">

                        <div class="text-center mb-3">
                            <h6 class="text-blueGray-500 text-sm font-bold">
                                {{ __('THÊM PHÒNG THI') }}
                            </h6>
                        </div>

                        <hr class="mt-6 border-b-1 border-blueGray-300" />
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        {{-- {{ route('phongthi.store') }} --}}
                        <form method="POST" action="{{ route('phongthi.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-bold mb-2" for="giangduong_id">
                                    {{ __('Giảng thi') }}
                                </label>
                                <select
                                    class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    aria-label="{{ __('Chọn giảng đường') }}" id="giangduong_id" name="giangduong_id">
                                    <option selected>{{ __('Chọn giảng đường') }}</option>
                                    {!! $htmlOptionGiangDuong !!}
                                </select>
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-bold mb-2" for="phongthi_id">
                                    {{ __('Mã phòng thi') }}
                                </label>
                                <input type="text" id="phongthi_id" name="phongthi_id"
                                    class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" required placeholder="Mã giảng đường + số phòng | Ví dụ: G1-101" />
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-bold mb-2" for="tenphongthi">
                                    {{ __('Tên phòng thi') }}
                                </label>
                                <input type="text" id="tenphongthi" name="tenphongthi"
                                    class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" required autocomplete="tenphongthi" autofocus
                                    placeholder="{{ __('Nhập tên phòng thi') }}" />
                            </div>

                            <div class="flex justify-around mt-6">
                                <a class="bg-white text-blue-500 hover:bg-blue-500 hover:text-white text-sm font-bold uppercase px-6 py-3.5 rounded shadow hover:shadow-lg outline-none focus:outline-none w-20"
                                    href="{{ route('phongthi.index') }}">
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
