@extends('layouts.app')
@section('titleAdmin', 'Tin nhắn')
@section('content')
    <div class="h-10"></div>

    <div class="h-8"></div>
    <div class="container mx-auto px-4 h-full down-md:mx-auto md:min-h-141">
        <div class="flex content-center items-center justify-center h-full">
            <div class="relative overflow-x-auto shadow-lg sm:rounded-lg dark:border-gray-500 dark:bg-gray-600">
                <section class="users">
                    <header class="border-solid border-b border-gray-200 dark:border-gray-500">
                        <div class="content">
                            <img src="/images/{{ Auth::user()->avatar }}" alt="">
                            <div class="details">
                                <span class="dark:text-gray-400">{{ Auth::user()->name }}</span>
                                <p class="px-2 py-1 text-xs text-center leading-tight rounded-full {{Auth::user()->trangthaihoatdong == 1 ? 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100' : 'text-gray-700 bg-gray-100 dark:text-gray-100 dark:bg-gray-700'}} ">
                                    {{ Auth::user()->trangthaihoatdong == 0 ? 'Offline now' : 'Active now' }}
                                </p>
                            </div>
                        </div>
                    </header>
                    <div class="search dark:text-gray-400">
                        <span class="text">Select an user to start chat</span>
                        <input type="text" placeholder="Enter name to search...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                    <div class="users-list">

                    </div>
                </section>
                <script src="{{ asset('js/users.js') }} "></script>

            </div>

        </div>

        <!-- Delete Product Modal -->


        <div class="h-6"></div>
    </div>
@endsection
