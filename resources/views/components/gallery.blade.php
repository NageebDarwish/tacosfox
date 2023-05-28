@props(['title'])
<div class="gallery position-relative overflow-hidden py-5">
    <img src="{{ asset('Assets/menuLeft.png') }}" class="menu-right-left menu-left">
    <img src="{{ asset('Assets/menuRight.png') }}" class="menu-right-left menu-right">
    <h1 class="text-center">
        {{ $title }}
    </h1>
    <div class="container">
        <div class="d-flex align-items-center s">
            <div class="d-flex flex-column">
                <img src="{{ asset('Assets/Gallery/1.png') }}">
                <img src="{{ asset('Assets/Gallery/2.png') }}">
            </div>
            <div class="d-flex flex-column">
                <img src="{{ asset('Assets/Gallery/3.png') }}">
                <img src="{{ asset('Assets/Gallery/4.png') }}">
            </div>
            <div class="d-flex flex-column">
                <img src="{{ asset('Assets/Gallery/5.png') }}">
                <img src="{{ asset('Assets/Gallery/6.png') }}">
            </div>
            <div class="d-flex flex-column">
                <div class="d-flex">
                    <img width="50%" src="{{ asset('Assets/Gallery/7.png') }}">
                    <img width="50%" src="{{ asset('Assets/Gallery/8.png') }}">
                </div>
                <img src="{{ asset('Assets/Gallery/9.png') }}">
            </div>
            <div class="d-flex flex-column">
                <img src="{{ asset('Assets/Gallery/10.png') }}">
                <img src="{{ asset('Assets/Gallery/11.png') }}">
            </div>
        </div>
    </div>
</div>
