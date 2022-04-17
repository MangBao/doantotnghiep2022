@extends(' layout.layout_admin')
@section('titleAdmin', 'Dashboard')
@section('content-admin')
@include('partials.breadcumb', ['page' => 'Home', 'key' => ''])
<div class="h-12"></div>
<div class="container flex flex-wrap mt-4">
    <div class="w-full mb-12 xl:mb-0 px-4">
        <div class="relative flex bg-green-400 w-full mb-6 shadow-lg rounded justify-center py-6">
            <p class="bold text-2xl text-white">
                {{ __('Chào mừng') . ' '  . 'Administrator' . ' ' . Auth::user()->name . ' ' . __('trở lại !') }}
            </p>
        </div>
    </div>
</div>
@endsection
