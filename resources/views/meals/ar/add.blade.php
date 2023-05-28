<x-app-layout>
    <x-slot name="header">
        <div dir="rtl">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('إضافة وجبة') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12" dir="rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                <form action="{{ url('dashboard-ar/meal/add-meal') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="title" class="form-label">العنوان</label>
                        <input required name="title" type="text" class="form-control" id="title"
                            placeholder="العنوان...">
                    </div>
                    <div class="mb-3">
                        <label for="Menu" class="form-label">اختيار الصنف (المنيو)</label>
                        <select name="menu_id" class="form-select" id="Menu">
                            <option value="55" disabled>Open this select menu</option>
                            @foreach ($menus as $key => $menu)
                                <option value="{{ $menu->id }}" {{ $key == 0 ? 'selected' : '' }}>
                                    {{ $menu->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">الوصف</label>
                        <input name="description" type="text" class="form-control" id="description"
                            placeholder="الوصف...">
                    </div>
                    <div class="mb-3">
                        <label for="currency" class="form-label">العملة</label>
                        <input name="currency" type="text" class="form-control" id="currency"
                            placeholder="العملة...">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">السعر</label>
                        <input name="price" type="number" class="form-control" id="price" placeholder="السعر...">
                    </div>
                    <div class="mb-3">
                        <label for="coverimg" class="form-label">الصورة</label>
                        <input required name="image" class="form-control form-control-lg p-2" type="file"
                            id="coverimg">
                    </div>
                    <div>
                        <x-primary-button>{{ __('إضافة الوجبة') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
