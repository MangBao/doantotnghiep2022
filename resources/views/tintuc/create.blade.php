@extends('layouts.app')
@section('titleAdmin', 'Thêm tin tức')
@section('content')
    <div class="h-10"></div>
    <div class="container mx-auto px-4 h-full down-md:mx-auto md:min-h-141">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-3/4 px-4 z-10 ">
                <div
                    class="flex flex-col w-full mb-6 shadow-lg rounded-lg border-0 bg-white dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                    <div class="rounded-t mb-0 px-6 py-6">

                        <div class="text-center mb-3">
                            <h6 class="text-gray-700 dark:text-gray-400 text-sm font-bold">
                                {{ __('THÊM TIN TỨC MỚI') }}
                            </h6>
                        </div>

                        <hr class="mt-6 border-b-1 border-blueGray-300" />
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        {{-- {{ route('tintuc.store') }} --}}
                        <form method="POST" action="
                        @if (config('app.env') === 'local')
                            {{ route('tintuc.store') }}
                        @else
                            {{ secure_url('tintuc/store') }}
                        @endif
                        " enctype="multipart/form-data">
                            @csrf
                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="title">
                                    {{ __('Tiêu đề tin') }}
                                </label>
                                <input type="text" id="title" name="title"
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" required autocomplete="title" autofocus
                                    placeholder="{{ __('Nhập tiêu đề tin tức') }}" />
                            </div>
                            <div class="flex justify-between">
                                <div class="w-2/5">
                                    <div class="relative w-full mb-3">
                                        <label class="text-gray-700 dark:text-gray-400" for="heading1">
                                            {{ __('Phần mở đầu') }}
                                        </label>
                                        <input type="text" name="heading1"
                                            class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                            value="" required autocomplete="name" autofocus
                                            placeholder="{{ __('Nhập heading 1') }}" />
                                    </div>

                                    <div class="relative w-full mb-3">
                                        <label class="text-gray-700 dark:text-gray-400" for="image1">
                                            {{ __('Ảnh minh họa 1') }}
                                        </label>
                                        <input type="file" name="image1"
                                            class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                            value="" required autocomplete="image1" />
                                    </div>
                                </div>
                                <div class="w-3/5 ml-8">
                                    <div class="relative w-full mb-3">
                                        <label class="text-gray-700 dark:text-gray-400" for="content1">
                                            {{ __('Nội dung 1') }}
                                        </label>
                                        <textarea required type="text" name="content1" cols="20" rows="5"
                                            class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between">
                                <div class="w-2/5">
                                    <div class="relative w-full mb-3">
                                        <label class="text-gray-700 dark:text-gray-400" for="heading2">
                                            {{ __('Phần mở đầu 2') }}
                                        </label>
                                        <input type="text" name="heading2"
                                            class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                            value="" autocomplete="name" autofocus
                                            placeholder="{{ __('Nhập heading 1') }}" />
                                    </div>

                                    <div class="relative w-full mb-3">
                                        <label class="text-gray-700 dark:text-gray-400" for="image2">
                                            {{ __('Ảnh minh họa 2') }}
                                        </label>
                                        <input type="file" name="image2"
                                            class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                            value="" autocomplete="image2" />
                                    </div>

                                </div>
                                <div class="w-3/5 ml-8">
                                    <div class="relative w-full mb-3">
                                        <label class="text-gray-700 dark:text-gray-400" for="content2">
                                            {{ __('Nội dung 2') }}
                                        </label>
                                        <textarea type="text" name="content2" cols="20" rows="5"
                                            class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between">
                                <div class="w-2/5">
                                    <div class="relative w-full mb-3">
                                        <label class="text-gray-700 dark:text-gray-400" for="heading3">
                                            {{ __('Phần mở đầu 3') }}
                                        </label>
                                        <input type="text" name="heading3"
                                            class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                            value="" autocomplete="name" autofocus
                                            placeholder="{{ __('Nhập heading 1') }}" />
                                    </div>

                                    <div class="relative w-full mb-3">
                                        <label class="text-gray-700 dark:text-gray-400" for="image3">
                                            {{ __('Ảnh minh họa 3') }}
                                        </label>
                                        <input type="file" name="image3"
                                            class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                            value="" autocomplete="image3" />
                                    </div>
                                </div>
                                <div class="w-3/5 ml-8">
                                    <div class="relative w-full mb-3">
                                        <label class="text-gray-700 dark:text-gray-400" for="content3">
                                            {{ __('Nội dung 3') }}
                                        </label>
                                        <textarea type="text" name="content3" cols="20" rows="5"
                                            class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="text-gray-700 dark:text-gray-400" for="title">
                                    {{ __('Files') }}
                                </label>
                                <input type="file" id="file" name="filesupload[]"
                                    class="dark:border-gray-100 dark:bg-gray-700 dark:text-gray-300 border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="" autofocus multiple
                                    placeholder="{{ __('Chọn các file') }}" />
                            </div>

                            <div class="flex justify-around mt-6">
                                <a class="bg-white text-blue-500 hover:bg-blue-500 hover:text-white text-sm font-bold uppercase px-6 py-3.5 rounded shadow hover:shadow-lg outline-none focus:outline-none w-20"
                                    href="{{ route('tintuc.index') }}">
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
