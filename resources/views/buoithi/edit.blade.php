@extends('layout.layout_admin')
@section('titleAdmin', 'Edit Buổi thi')
@section('content-admin')
@include('partials.breadcumb', ['page' => 'Buổi thi', 'key' => 'Edit', 'link' => route('buoithi.index')])
<div class="h-12"></div>

    <div class="container mx-auto px-4 h-full ">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-2/5 px-4 z-10 ">
                <div class="flex flex-col w-full mb-6 shadow-lg rounded-lg border-0 bg-white">
                    <div class="rounded-t mb-0 px-6 py-6">

                        <div class="text-center mb-3">
                            <h6 class="text-blueGray-500 text-sm font-bold">
                                {{ __('EDIT BUỔI THI') }}
                            </h6>
                        </div>

                        <hr class="mt-6 border-b-1 border-blueGray-300" />
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        {{-- {{ route('giangvien.store') }} --}}
                        <form method="POST" action="{{ route('buoithi.update', ['buoithi_id' => $ct->buoithi_id]) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-bold mb-2" for="tengiangvien">
                                    {{ __('Buổi thi') }}
                                </label>
                                <input type="text" name="buoithi_id"
                                    class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="{{ $ct->buoithi_id }}" required autocomplete="name" readonly />
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-bold mb-2" for="giobatdau">
                                    {{ __('Giờ bắt đầu') }}
                                </label>
                                <input type="time" name="giobatdau"
                                    class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="{{ $ct->giobatdau }}" required autocomplete="giobatdau"/>
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block text-blueGray-600 font-bold mb-2" for="gioketthuc">
                                    {{ __('Giờ kết thúc') }}
                                </label>
                                <input type="time" name="gioketthuc"
                                    class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all"
                                    value="{{ $ct->gioketthuc }}" required autocomplete="gioketthuc"/>
                            </div>

                            <div class="flex justify-around mt-6">
                                <a
                                    class="bg-white text-blue-500 hover:bg-blue-500 hover:text-white text-sm font-bold uppercase px-6 py-3.5 rounded shadow hover:shadow-lg outline-none focus:outline-none w-20"
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
