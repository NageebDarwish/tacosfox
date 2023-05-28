<x-app-layout>
    <x-slot name="header" dir="rtl">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('الوجبات') }}
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
                                            <th>العمولة</th>
                                            <th>السعر</th>
                                            <th class="d-none d-md-table-cell">الصورة</th>
                                            <th>حذف أو تعديل</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id = 1; @endphp
                                        @forelse ($menu->arabicmeals as $meal)
                                            <tr>
                                                <td>{{ $id }}</td>
                                                <td>{{ $meal->title }}</td>
                                                <td class="d-none d-md-table-cell">{{ $meal->description }}</td>
                                                <td>{{ $meal->currency }}</td>
                                                <td>{{ $meal->price }}</td>
                                                <td class="d-none d-md-table-cell"><img src="{{ $meal->image }}"
                                                        style="width: 60px" /></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <a href="{{ url('dashboard-ar/meal/edit-meal/' . $meal->id) }}"
                                                            class="btn btn-primary">
                                                            <x-edit-icon></x-edit-icon>
                                                        </a>
                                                        <form
                                                            action="{{ url('dashboard-ar/meal/delete/' . $meal->id) }}"
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
                <div class="mx-auto pb-10 w-75" dir="ltr">
                    {{ $menus->links() }}
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
