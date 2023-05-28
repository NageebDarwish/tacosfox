<x-app-layout>
    <x-slot name="header" dir="rtl">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('المنيوهات') }}
            </h2>
            <a href="{{ url('/dashboard-ar/menu/add-menu') }}"
                class="btn btn-primary d-flex align-items-center justify-content-between gap-1">
                <x-plus-icon></x-plus-icon>
                <span> {{ __('منيو جديدة') }}</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12" dir="rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>العنوان</th>
                            <th>الصورة</th>
                            <th>تعديل أو حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $id = ($menus->currentPage() - 1) * $menus->perPage() + 1; @endphp
                        @forelse ($menus as $menu)
                            <tr>
                                <td>{{ $id }}</td>
                                <td>{{ $menu->title }}</td>
                                <td><img src="{{ $menu->image }}" style="width: 60px" /></td>
                                <td class="d-flex gap-1">
                                    <a href="{{ url('/dashboard-ar/menu/edit-menu/' . $menu->id) }}"
                                        class="btn btn-primary">
                                        <x-edit-icon></x-edit-icon>
                                    </a>
                                    <form action="{{ url('/dashboard-ar/menu/delete/' . $menu->id) }}" method="POST"
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
                                <td colspan="7">لايوجد أية قوائم</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mx-auto pb-10 w-75">
                    {{ $menus->links() }}
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
