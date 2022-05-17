@extends('layout.layout_admin')
@section('titleAdmin', 'Lịch của tôi')
@section('content-admin')
@include('partials.breadcumb', ['page' => 'Lịch coi thi', 'key' => 'Lịch của tôi', 'link' => route('lichcoithi.index')])

<div class="h-12"></div>

<div class="flex">
    {{-- <div class="mr-8 pt-3">
        <a href="{{ route('lichcoithi.lichcoithiauto') }}" class="btn-primary">
            Lịch coi thi tự động
        </a>
    </div> --}}
    <div class="mr-8 pt-1">
        {{-- {{ route('lichcoithi.updatethongbao') }} --}}
        <form action="{{ route('lichcoithi.updatethongbao') }}" method="POST">
            @csrf
            {{-- {{dd($lichthis);}} --}}
            @if ($giangvien->thongbaomail == 1)
                <input type="hidden" name="thongbaomail" value="0">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-bell-slash"></i>
                    <span class="ml-2">Tắt thông báo</span>
                </button>
                {{-- <input type="submit" value="Tắt thông báo" class="btn-primary cursor-pointer"> --}}
            @elseif ($giangvien->thongbaomail == 0)
                <input type="hidden" name="thongbaomail" value="1">
                {{-- <input type="submit" value="Bật thông báo" class="btn-primary cursor-pointer"> --}}
                <button type="submit" class="btn-primary">
                    <i class="fas fa-bell"></i>
                    <span class="ml-2">Bật thông báo</span>
                </button>
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
<div class="container mx-auto px-4 h-full down-md:mx-auto md:min-h-141">
    <div class="flex content-center items-center justify-center h-full">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Môn thi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ca thi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Giờ bắt đầu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Giờ kết thúc
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phòng thi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ngày thi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cán bộ coi thi 1
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cán bộ coi thi 2
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Chức năng</span>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($lichcoithi as $lt)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $i++ }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $lt->tenmonthi }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $lt->cathi_id }}
                            </td>
                            <td class="px-6 py-4">
                                {{
                                    \Carbon\Carbon::createFromFormat('H:i:s',$lt->giobatdau)->format('H:i')
                                }}
                            </td>
                            <td class="px-6 py-4">
                                {{
                                    \Carbon\Carbon::createFromFormat('H:i:s',$lt->gioketthuc)->format('H:i')
                                }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $lt->phongthi_id }}
                            </td>
                            <td class="px-6 py-4">
                                {{
                                    date('d/m/Y', strtotime($lt->ngaythi))
                                }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $lt->tengiangvien1 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $lt->tengiangvien2 }}
                            </td>
                            <td class="px-6 py-4 text-right flex" >
                                <a href="{{ route('lichcoithi.xinvang', [$lt->id]) }}" title="Xin vắng"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline px-1">
                                    <i class="fa-solid fa-file-pen"></i>
                                </a>
                            </td>
                        </tr>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Product Modal -->


    <div class="h-6"></div>
    <div class="row">
        <div class="col w-full">
            {{ $lichcoithi->links('pagination::tailwind') }}
        </div>
    </div>
</div>

@endsection
