<header class="position-{{ $position }} w-100" style="z-index: 3">
    {{-- Small Header --}}
    <div class="small-nav py-2">
        <div class="container">
            <nav class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
                <div class="d-flex align-items-center justify-content-between gap-2">
                    <img src="{{ asset('Assets/Icons/circle.png') }}" />
                    <p class="number">Free Hot Delivery : +971545574911</p>
                </div>
                <div class="d-flex align-items-center justify-content-between gap-3">
                    <a href="https://www.facebook.com/tacosfoxuae/" target="_blank"> <img
                            src="{{ asset('Assets/Icons/facebook.png') }}">
                    </a>
                    <a href="https://www.instagram.com/tacosfoxuae/" target="_blank"> <img
                            src="{{ asset('Assets/Icons/instagram.png') }}">
                    </a>
                    <a href="https://www.youtube.com/channel/UCb-WvLqz8WKkOAffP5fuI4A" target="_blank"> <img
                            width="25px" src="{{ asset('Assets/Icons/youtube.png') }}">
                    </a>
                    <a href="https://www.tiktok.com/@tacosfoxuae?" target="_blank"> <img width="25px"
                            src="{{ asset('Assets/Icons/tiktok.png') }}">
                    </a>
                </div>
            </nav>
        </div>
    </div>
    {{-- Main Header --}}
    <header {{ $attributes->merge(['class' => 'bg-black']) }}>
        <div class="container">

            <nav class="navbar navbar-expand-lg text-white p-0">
                <div class="container-fluid d-flex align-items-center justify-content-between pe-3 text-white">
                    <img class="navbar-brand" src="{{ asset('Assets/logo.png') }}" alt="logo">
                    <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <div class="collapse navbar-collapse " id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto">
                            <x-nav-website-link :href="route('home')" :active="request()->routeIs('home')">Home</x-nav-website-link>
                            <x-nav-website-link :href="route('gallery')" :active="request()->routeIs('gallery')">Gallery</x-nav-website-link>
                            <x-nav-website-link :href="route('menu')" :active="request()->routeIs('menu')">Menu</x-nav-website-link>
                            <x-nav-website-link :href="route('contact')" :active="request()->routeIs('contact')">Contact</x-nav-website-link>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Lang
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/ar">العربية</a></li>
                                    <li><a class="dropdown-item" href="/">English</a></li>

                                </ul>
                            </li>

                            <img class="mx-2 my-2 " id="search-icon" src="{{ asset('Assets/search.png') }}"
                                style="height: 20px" width="20px" alt="search-icon">
                            <div class="d-flex align-items-center nav-link">
                                <div class="my-auto">
                                    <form id="search-form" action="{{ 'menu' }}" method="GET"
                                        class="position-relative search-form">
                                        <input type="text" class="search-click" name="search" style="color: black"
                                            placeholder="Search menus...">
                                    </form>
                                </div>
                                <span class="my-auto search-cancel m-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                    </svg>
                                </span>
                            </div>
                        </ul>

                    </div>
                </div>
            </nav>

        </div>
    </header>
</header>
