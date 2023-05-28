<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Meals') }}
            </h2>
            <a href="{{ url('/meals/add-meal') }}"
                class="btn btn-primary d-flex align-items-center justify-content-between gap-1">
                <x-plus-icon></x-plus-icon>
                <span> {{ __('Add Meal') }}</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
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
                                            <th>Title</th>
                                            <th class="d-none d-md-table-cell">Description</th>
                                            <th>Currency</th>
                                            <th>Price</th>
                                            <th class="d-none d-md-table-cell">Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $id = 1; @endphp
                                        @forelse ($menu->meals as $meal)
                                            <tr>
                                                <td>{{ $id }}</td>
                                                <td>{{ $meal->title }}</td>
                                                <td class="d-none d-md-table-cell">{{ $meal->description }}</td>
                                                <td>{{ $meal->currency }}</td>
                                                <td>{{ $meal->price }}</td>
                                                <td class="d-none d-md-table-cell"><img src="{{ $meal->image }}"
                                                        style="width: 60px" /></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
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
                                                <td colspan="5">No meals found for this menu</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mx-auto pb-10 w-75">
                    {{ $menus->links() }}
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
