@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <x-header position=""></x-header>
    <div class="contact py-5">
        <div class="container">
            <h1 class="mb-3">Contact Us</h1>
            <form>
                <div class="form-group mb-3">
                    <label class="f-open-sans" for="name">Your name</label>
                    <input class="form-control" name="name" type="text" id="name" required />
                </div>
                <div class="form-group mb-3">
                    <label class="f-open-sans" for="email">Your Email</label>
                    <input class="form-control" name="email" type="text" id="email" required />
                </div>
                <div class="form-group mb-3">
                    <label class="f-open-sans" for="message">Your message</label>
                    <textarea class="form-control" rows="5" name="message" id="message" required> </textarea>
                </div>
                <div class="btn-contact">
                    <button>Submit</button>
                </div>
            </form>
        </div>
    </div>
    <section class="social-contact">
        <div class="container">
            <div class="social-flex d-flex align-items-center justify-content-evenly ">
                <div class="d-flex align-items-center gap-2">
                    <div class="icon">
                        <img src="{{ asset('Assets/phone.png') }}" alt="">
                    </div>
                    <div>
                        <h1>Phone</h1>
                        <p class="f-open-sans">+971545574911</p>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <div class="icon">
                        <img src="{{ asset('Assets/email.png') }}" alt="">
                    </div>
                    <div>
                        <h1>Email</h1>
                        <p class="f-open-sans">tacosfoxuae@gmail.com</p>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <div class="icon">
                        <img src="{{ asset('Assets/email.png') }}" alt="">
                    </div>
                    <div>
                        <h1>Address</h1>
                        <p class="f-open-sans">Al Barsha 1-Dubai UAE</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-gallery title="Gallery"></x-gallery>
    <x-footer></x-footer>
@endsection
