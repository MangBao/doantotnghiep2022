@extends('layouts.app')
@section('titleAdmin', 'Chat box')
@section('content')
    <div class="h-10"></div>

    <div class="h-8"></div>
    <div class="container mx-auto px-4 h-full down-md:mx-auto md:min-h-141">
        <div class="flex content-center items-center justify-center h-full">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg dark:border-gray-500 dark:bg-gray-600">
                <section class="chat-area">
                    <header>
                        <a href="{{ route('tinnhan.tinnhan') }}" class="back-icon "><i class="fas fa-arrow-left dark:text-gray-400"></i></a>
                        <img src="/images/{{ $user->avatar }}" alt="" class="rounded-full">
                        <div class="details">
                            <span class="dark:text-gray-400">{{ $user->name }}</span>
                            <p class="px-2 py-1 text-xs text-center leading-tight rounded-full {{$user->trangthaihoatdong == 1 ? 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100' : 'text-gray-700 bg-gray-100 dark:text-gray-100 dark:bg-gray-700'}} ">
                                {{ $user->trangthaihoatdong == 0 ? 'Offline now' : 'Active now' }}
                            </p>
                        </div>
                    </header>
                    <div class="chat-box dark:bg-gray-400">

                    </div>
                    <form action="#" class="typing-area">
                        @csrf
                        <input type="text" class="incoming_id" name="incoming_id" value="{{ $user->giangvien_id }}" hidden>
                        <input type="text" name="message" class="input-field" placeholder="Type a message here..."
                            autocomplete="off">
                        <button><i class="fab fa-telegram-plane"></i></button>
                    </form>
                </section>
                <script src="{{ asset('js/chat.js') }} "></script>

            </div>

        </div>

        <!-- Delete Product Modal -->


        <div class="h-6"></div>
    </div>
@endsection
