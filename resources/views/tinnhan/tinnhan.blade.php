@extends('layout.layout_admin')
@section('titleAdmin', 'Tin nhắn')
@section('content-admin')
    @include('partials.breadcumb', [
        'page' => 'Tin nhắn',
        'key' => 'Index',
        'link' => route('tinnhan.tinnhan'),
    ])
    <div class="h-12"></div>

    <div class="h-8"></div>
    <div class="container mx-auto px-4 h-full down-md:mx-auto md:min-h-141">
        <div class="flex content-center items-center justify-center h-full">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <section class="users">
                    <header>
                        <div class="content">
                            <img src="/images/{{ Auth::user()->avatar }}" alt="">
                            <div class="details">
                                <span>{{ Auth::user()->name }}</span>
                                <p>{{ Auth::user()->trangthaihoatdong == 0 ? 'Offline now' : 'Active now' }}</p>
                            </div>
                        </div>
                    </header>
                    <div class="search">
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
