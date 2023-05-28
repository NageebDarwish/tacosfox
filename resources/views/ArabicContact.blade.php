@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <section class="f-cairo">
        <x-headerAr position=""></x-headerAr>
        <div class="contact contact-ar py-5" dir="rtl">
            <div class="container">
                <h1 class="mb-3">تواصل معنا</h1>
                <form>
                    <div class="form-group mb-3">
                        <label class="" for="name">ادخل اسمك</label>
                        <input class="form-control" name="name" type="text" id="name" required />
                    </div>
                    <div class="form-group mb-3">
                        <label class="" for="email">بريدك الالكتروني</label>
                        <input class="form-control" name="email" type="text" id="email" required />
                    </div>
                    <div class="form-group mb-3">
                        <label class="" for="message">الرسالة</label>
                        <textarea class="form-control" rows="5" name="message" id="message" required> </textarea>
                    </div>
                    <div class="btn-contact f-cairo">
                        <button>ارسال</button>
                    </div>
                </form>
            </div>
        </div>
        <section class="social-contact">
            <div class="container">
                <div class="social-flex d-flex align-items-center justify-content-evenly " dir="rtl">
                    <div class="d-flex align-items-center gap-2">
                        <div class="icon">
                            <img src="{{ asset('Assets/phone.png') }}" alt="">
                        </div>
                        <div>
                            <h1>رقم الهاتف</h1>
                            <p class="">+971545574911</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2" dir="rtl">
                        <div class="icon">
                            <img src="{{ asset('Assets/email.png') }}" alt="">
                        </div>
                        <div>
                            <h1>البريد الالكتروني</h1>
                            <p class="">tacosfoxuae@gmail.com</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="icon">
                            <img src="{{ asset('Assets/email.png') }}" alt="">
                        </div>
                        <div>
                            <h1>العنوان</h1>
                            <p class="">Al Barsha 1-Dubai UAE</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <x-gallery title="المعرض"></x-gallery>
        <x-ArabicFooter></x-ArabicFooter>
    </section>
@endsection
