@extends('layouts.app')

@section('title')
    {{ __('Dashboard') }}
@endsection

@section('content')
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{ __('Dashboard') }}
    </h2>
    <!-- CTA -->
    <span class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                </path>
            </svg>
            <span>Chào, {{ Auth::user()->name }} trở lại ! Chúc bạn một buổi
                {{ date('H') > 17 ? 'tối vui vẻ 🌜' : (date('H') > 12 ? 'chiều mát mẻ ⛅️' : 'sáng tốt lành 🍀') }}</span>
        </div>
    </span>
    <span
        class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple pl-5">
        <div class="flex items-center">
            {{-- <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                </path>
            </svg> --}}
            {{-- <span>See the fortify-windmill repo on GitHub</span> --}}
            <div id="weatherContainer">
                <span id="cityName">Hà Nội</span> <br>
                <span id="temp">33°C</span> <br>
                <span id="main">Cloudy</span> <br>
                <span id="discription">few clouds</span> <br>
                <img id="image" src="https://openweathermap.org/img/wn/02n@2x.png">
            </div>
        </div>
    </span>
    <script>
        const city = document.querySelector("#city");
        const cityName = document.querySelector("#cityName");
        const Temp = document.querySelector("#temp");
        const main = document.querySelector("#main");
        const discription = document.querySelector("#discription");
        const image = document.querySelector("#image");
        weatherUpdate = (city) => {
            const xhr = new XMLHttpRequest();
            xhr.open(
                "GET",
                `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=cad7ec124945dcfff04e457e76760d90`
            );
            // in place of appid enter your open weather API Key
            // You can create it for free
            // https://home.openweathermap.org/users/sign_up

            xhr.send();
            xhr.onload = () => {
                if (xhr.status === 404) {
                    alert("Place not found");
                } else {
                    var data = JSON.parse(xhr.response);
                    cityName.innerHTML = data.name;
                    Temp.innerHTML = `${Math.round(data.main.temp - 273.15)}°C`;
                    main.innerHTML = data.weather[0].main;
                    discription.innerHTML = data.weather[0].description;
                    image.src = `https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`;
                }
            };
        };
        weatherUpdate("Nha Trang");
    </script>
@endsection
