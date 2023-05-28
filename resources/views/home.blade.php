@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <x-header class="main-header" position="absolute"></x-header>
    <section class="landing">
        <div class="container position-relative h-100">
            <div class="d-flex align-items-center justify-content-end flex-column landing-content">
                <h1 class="text-center landing-title">Best Quality </h1>
                <h1 class="text-center landing-title"> Good Taste</h1>
                <x-website-button link="menu">Menu</x-website-button>
            </div>
        </div>
    </section>
    <x-our-menu :menus="$menus" title="Our Menu" viewMenu="View Menu"></x-our-menu>
    <x-order-now></x-order-now>
    <section class="burger d-flex flex-row-reverse align-content-center justify-content-between">
        <img class="burger-img" src="{{ asset('Assets/Burger.png') }}" />
        <div class="d-flex align-items-center justify-content-center flex-column text-center ms-4 burger-discount">
            <img class="w-50" src="{{ asset('Assets/discount.gif') }}" alt="">
            <h1 class="burger-title">BEEF 'N CHEDDAR</h1>
            <h1 class="burger-title" style="color: #D52025">CLASSIC SANDWICHES</h1>
        </div>
    </section>
    <x-order-now></x-order-now>
    <section class="map">
        <div class="d-flex align-items-center map-flex">
            <div class=" map-left-side map-side position-relative" style="height: 75vh">
                <div class="content text-center ">
                    <h1 class="mb-2">Our Menu</h1>
                    <p class="mb-3 f-inter  mx-auto">Fast food classics made with joy. Enjoy our great-tasting range of
                        products
                        —
                        Fried
                        Chicken, Burgers,
                        Pies, Spaghetti, Rice Bowls, Wraps and many more!</p>
                    <x-website-button link="menu">View Menu</x-website-button>
                </div>
            </div>
            <div class=" map-right-side map-side position-relative">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3612.723835794544!2d55.1948418!3d25.111208100000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6b32deb9e1cd%3A0xd112368666188f1f!2sTacosFox!5e0!3m2!1sar!2sus!4v1684333965209!5m2!1sar!2sus"
                    width="100%" style="border:0; height: 75vh" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="map-overlay"></div>
                <div class="content text-center ">
                    <h1 class="mb-2">Our Locations</h1>
                    <h2 class="mb-2">TacosFox</h2>
                    <p class="mb-3 f-inter  mx-auto">456V+FWR Nada bulding_barcha1 -- Al Barsha 1
                        Dubai - United Arab Emirates</p>
                    <x-website-button link="https://goo.gl/maps/mLVdi7eC9bkwBQ7W6">View Locations</x-website-button>
                </div>
            </div>
        </div>
    </section>
    <x-gallery title="Gallery"></x-gallery>
    <x-footer></x-footer>
@endsection
