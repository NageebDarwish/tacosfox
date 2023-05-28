@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <x-header position=""></x-header>
    <x-our-menu :menus="$menus" title="Our Menu" viewMenu="View Menu"></x-our-menu>
    <section class="meals my-5">
        <div class="container">
            <h1 class="mb-5" style="font-size: 35px"> <span style="color: var(--primary-color)"> Menu:
                </span>{{ $menuTitle }}
            </h1>
            <div class="row justify-content-between gy-5">
                @foreach ($meals as $meal)
                    <div class="col-12 col-md-6 d-flex gap-3 position-relative">
                        <div class="col-6"
                            style="border: 1px solid #C59D5F;
                        box-shadow: 2px 1px 6px 2px #C59D5F;
                         width:148px;
                         height: 100px;
                            border-radius: 17px;
                            background-image: url('{{ $meal->image }}');
                            background-position: center;
                            background-size: contain;
                            background-repeat: no-repeat
                            
                            ">

                        </div>
                        <div class="meal-content ">
                            <h1 class="f-fjalla-one">{{ $meal->title }}</h1>
                            <p class="f-open-sans"> {{ $meal->description }} </p>
                            <p class="f-fjalla-one price mt-2">{{ $meal->currency }} {{ $meal->price }}</p>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <x-footer></x-footer>
@endsection
