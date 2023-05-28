<x-app-layout>
    <x-slot name="header" dir="rtl">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('تعديل الوجبة') }}
            </h2>
            <a href="{{ url('/dashboard-ar/meal/add-meal') }}"
                class="btn btn-primary d-flex align-items-center justify-content-between gap-1">
                <x-plus-icon></x-plus-icon>
                <span> {{ __('إضافة وجبة') }}</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12" dir="rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">العنوان</label>
                        <input required name="title" value="{{ $meal->title }}" type="text" class="form-control"
                            id="title" placeholder="العنوان...">
                    </div>
                    <div class="mb-3">
                        <label for="Menu" class="form-label">اختيار الصنف (المنيو)</label>
                        <select name="menu_id" class="form-select" id="Menu">
                            <option value="0" disabled>Open this select menu</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}" {{ $menu->id == $meal->menu_id ? 'selected' : '' }}>
                                    {{ $menu->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Description" class="form-label">الوصف</label>
                        <input name="description" value="{{ $meal->description }}" type="text" class="form-control"
                            id="Description" placeholder="الوصف...">
                    </div>
                    <div class="mb-3">
                        <label for="Currency" class="form-label">العملة</label>
                        <input name="currency" value="{{ $meal->currency }}" type="text" class="form-control"
                            id="Currency" placeholder="العملة...">
                    </div>
                    <div class="mb-3">
                        <label for="Price" class="form-label">السعر</label>
                        <input name="price" value="{{ $meal->price }}" type="number" class="form-control"
                            id="Price" placeholder="السعر...">
                    </div>
                    <div class="mb-3">
                        <label for="coverimg" class="form-label">الصورة</label>
                        <input name="image" class="form-control form-control-lg p-2" type="file" id="coverimg">
                    </div>
                    <div>
                        <x-primary-button>{{ __('تعديل الوجبة') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
