<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" dir="rtl">
            {{ __('لوحة التحكم') }}
        </h2>
    </x-slot>

    <div class="py-12" dir='rtl'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    اخر المينوهات المضافة
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>العنوان</th>
                                        <th>الصورة</th>
                                        <th>الحذف أو التعديل</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $id =1; @endphp
                                    @forelse ($menus as $menu)
                                        <tr>
                                            <td>{{ $id }}</td>
                                            <td>{{ $menu->title }}</td>
                                            <td><img src="{{ $menu->image }}" style="width: 60px" /></td>
                                            <td class="d-flex gap-1">
                                                <a href="{{ url('menu/edit-menu/' . $menu->id) }}"
                                                    class="btn btn-primary">
                                                    <x-edit-icon></x-edit-icon>
                                                </a>
                                                <form action="{{ url('/menu/delete/' . $menu->id) }}" method="POST"
                                                    class="ms-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">
                                                        <x-delete-icon></x-delete-icon>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php $id++; @endphp
                                    @empty
                                        <tr>
                                            <td colspan="7">لايوجد اصناف</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <a href="{{ route('menus-ar') }}" class="btn btn-primary">إظهار جميع المنيوز</a>

                        </div>
                    </div>

                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
                    اخر الوجبات المضافة
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                        @foreach ($menus as $menu)
                            <div class="card mb-3">
                                <div class="card-header">{{ $menu->title }}</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>العنوان</th>
                                                    <th class="d-none d-md-table-cell">الوصف</th>
                                                    <th>العملة</th>
                                                    <th>السعر</th>
                                                    <th class="d-none d-md-table-cell">الصورة</th>
                                                    <th>الحذف أو التعديل</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $id = 1; @endphp
                                                @forelse ($menu->arabicmeals as $meal)
                                                    <tr>
                                                        <td>{{ $id }}</td>
                                                        <td>{{ $meal->title }}</td>
                                                        <td class="d-none d-md-table-cell">{{ $meal->description }}
                                                        </td>
                                                        <td>{{ $meal->currency }}</td>
                                                        <td>{{ $meal->price }}</td>
                                                        <td class="d-none d-md-table-cell"><img
                                                                src="{{ $meal->image }}" style="width: 60px" />
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-1">
                                                                <a href="{{ url('meals/edit-meal/' . $meal->id) }}"
                                                                    class="btn btn-primary">
                                                                    <x-edit-icon></x-edit-icon>
                                                                </a>
                                                                <form action="{{ url('/meals/delete/' . $meal->id) }}"
                                                                    method="POST" class="ms-2">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger">
                                                                        <x-delete-icon></x-delete-icon>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @php $id++; @endphp
                                                @empty
                                                    <tr>
                                                        <td colspan="5">لايوجد وجبات لهذا الصنف</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <a href="{{ route('meals-ar') }}" class="btn btn-primary">إظهار جميع الوجبات</a>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
