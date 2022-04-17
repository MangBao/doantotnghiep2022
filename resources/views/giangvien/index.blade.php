@extends('layout.layout_admin')
@section('titleAdmin', 'Giảng viên')
@section('content-admin')
@include('partials.breadcumb', ['page' => 'Giảng viên', 'key' => 'Index'])
<div class="h-12"></div>
<a href="{{ route('giangvien.create') }}" class="btn-primary">
    Thêm giảng viên
</a>
<div class="h-6"></div>
<div class="container mx-auto px-4 h-full">
    <div class="flex content-center items-center justify-center h-full">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Mã giảng viên
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tên giảng viên
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ngày sinh
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Con nhỏ
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Số điện thoại
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Chức năng</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gvs as $gv)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $gv->giangvien_id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $gv->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $gv->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $gv->ngaysinh }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($gv->connho == 1)
                                    {{ __('Có') }}
                                @else
                                    {{ __('Không có') }}
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $gv->sodienthoai }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('giangvien.update', [$gv->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> |
                                <a href="{{ route('giangvien.show', [$gv->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Details</a> |
                                <a href="{{ route('giangvien.delete', [$gv->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
