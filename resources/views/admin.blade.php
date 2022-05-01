@extends(' layout.layout_admin')
@section('titleAdmin', 'Dashboard')
@section('content-admin')
@include('partials.breadcumb', ['page' => 'Home', 'key' => '', 'link' => route('home')])
<div class="h-12"></div>
<div class="container flex flex-wrap mt-4 min-h-126 down-md:mx-auto">
    <div class="w-full mb-12 xl:mb-0 px-4">
        @if (session('error'))
            <div class="animate-fadeInDown flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
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
        <div class="relative flex bg-green-400 w-full mb-6 shadow-lg rounded justify-center py-6">
            <p class="bold text-2xl text-white text-center px-3">
                {{ 'Chào mừng' . ' '  . (Auth::user()->role_id == 1 ? ' Administrator' : (Auth::user()->role_id == 2 ? 'Thư ký khoa' : 'Giảng viên')) . ' ' . Auth::user()->name . ' ' . __('trở lại !') }}
            </p>
        </div>
    </div>
</div>
@endsection
