@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <x-header position=""></x-header>
    <div class="container my-4" style="height: 70vh">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/-E-1c4C3cxE" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
    </div>

    <section class="mt-5 py-5" style="background-color:#323031">
        <h1 class="text-white d-flex align-items-center gap-3 ms-1">
            <div style="background-color: #333333; border-radius: 50%; padding: 15px">
                <img src="{{ asset('Assets/Icons/instagram.png') }}" alt="">
            </div>
            <span>FoodWize</span>
        </h1>
        <x-gallery-images></x-gallery-images>
        <div class="d-flex align-items-center justify-content-center" >
            <a  href="https://www.instagram.com/tacosfoxuae/" target="_blank" class="d-flex align-items-center gap-2" style="background-color: #408BD1; padding: 5px 8px; margin: 20px 0 0 0; border-radius: 4px">
                <img
                src="{{ asset('Assets/Icons/instagram.png') }}">
                <span class="text-white f-open-sans">Follow on Instagram</span>
            </a>
    </div>

    </section>
    
    <x-footer></x-footer>
@endsection
