@extends('layout.layout_admin')
@section('titleAdmin', 'Chat box')
@section('content-admin')
    @include('partials.breadcumb', [
        'page' => 'Chat box',
        'key' => 'Index',
        'link' => route('tinnhan.tinnhan'),
    ])
    <div class="h-12"></div>

    <div class="h-8"></div>
    <div class="container mx-auto px-4 h-full down-md:mx-auto md:min-h-141">
        <div class="flex content-center items-center justify-center h-full">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <section class="chat-area">
                    <header>
                        <a href="{{ route('tinnhan.tinnhan') }}" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                        <img src="/images/{{ $user->avatar }}" alt="" class="rounded-full">
                        <div class="details">
                            <span>{{ $user->name }}</span>
                            <p>{{ $user->trangthaihoatdong == 0 ? 'Offline now' : 'Active now' }}</p>
                        </div>
                    </header>
                    <div class="chat-box">

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
