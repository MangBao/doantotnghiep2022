@extends('front-end.layout.master')
@section('title', 'Login')
@section('body')
<div class="container mx-auto px-4 h-full">
    <div class="flex content-center items-center justify-center h-full">
        <div class="w-full lg:w-2/5 px-4">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                <div class="rounded-t mb-0 px-6 py-6">

                    <div class="text-center mb-3">
                        <h6 class="text-blueGray-500 text-sm font-bold">
                            Sign in
                        </h6>
                    </div>

                    <hr class="mt-6 border-b-1 border-blueGray-300" />
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">

                    <form action="login_process" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="relative w-full mb-3">
                            <label class="block text-blueGray-600 text-xs font-bold mb-2"
                                for="grid-password">
                                Email or ID
                            </label>
                            <input type="email"
                                name="email"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Email" />
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block text-blueGray-600 text-xs font-bold mb-2"
                                for="grid-password">
                                Password
                            </label>
                            <input type="password"
                                name="password"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Password" />
                        </div>

                        <div>
                            <label class="inline-flex items-center cursor-pointer">
                                <input id="customCheckLogin" type="checkbox"
                                class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" />
                                <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                    Remember me
                                </span>
                            </label>
                        </div>

                        <div class="text-center mt-6">
                            <button
                                class="bg-blue-500 text-white active:bg-blue-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                type="submit">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex flex-wrap mt-6 relative z-10">
                <div class="w-1/2">
                    <a href="#pablo" class="text-blueGray-200"><small>Forgot password?</small></a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
