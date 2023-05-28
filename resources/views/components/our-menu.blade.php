@props(['menus', 'title', 'viewMenu'])

<section class="our-menu py-5 position-relative" style="overflow: hidden">
    <img src="{{ asset('Assets/menuLeft.png') }}" class="menu-right-left menu-left">
    <img src="{{ asset('Assets/menuRight.png') }}" class="menu-right-left menu-right">

    <div class="d-flex align-items-center justify-content-center mb-5">
        <span class="custom-menu-line"></span>
        <h1 class="text-center mx-2 title">{{ $title }}</h1>
        <span class="custom-menu-line"></span>
    </div>
    <div class="container">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($menus->chunk(4) as $index => $chunk)
                    <div class="carousel-item  {{ $index == 0 ? 'active' : '' }}">
                        <div class="row gy-4">
                            @foreach ($chunk as $menu)
                                <a href="{{ route('menu', 'search=' . $menu->title) }}"
                                    class="col-6 col-md-3 position-relative car-item">

                                    <img src="{{ asset('Assets/Rectangle.png') }}" class="rectangle w-75" />
                                    <div class="w-100 position-relative">
                                        <img src="{{ $menu->image }}" class=" bg-black d-block w-100" alt="">
                                        <div class="overlay"></div>
                                    </div>
                                    <h1 class="carousel-item-title-hover">{{ $viewMenu }}</h1>
                                    <h1 class="carousel-item-title text-center">{{ $menu->title }}</h1>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
