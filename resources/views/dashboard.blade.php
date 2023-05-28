<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Latest Menus
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $id =1; @endphp
                                    @forelse ($menus as $menu)
                                        <tr>
                                            <td>{{ $id }}</td>
                                            <td>{{ $menu->title }}</td>
                                            <td><img src="{{ $menu->image }}" style="width: 60px" /></td>
                                            <td class="d-flex">
                                                <a href="{{ url('menus/edit-menu/' . $menu->id) }}"
                                                    class="btn btn-primary">
                                                    <x-edit-icon></x-edit-icon>
                                                </a>
                                                <form action="{{ url('/menus/delete/' . $menu->id) }}" method="POST"
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
                                            <td colspan="7">No Record Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <a href="{{ route('menus') }}" class="btn btn-primary">Show All Menus</a>

                        </div>
                    </div>

                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
                    Latest Meals
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
                                                        <td class="d-none d-md-table-cell">{{ $meal->description }}
                                                        </td>
                                                        <td>{{ $meal->currency }}</td>
                                                        <td>{{ $meal->price }}</td>
                                                        <td class="d-none d-md-table-cell"><img
                                                                src="{{ $meal->image }}" style="width: 60px" />
                                                        </td>
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
                        <a href="{{ route('meals') }}" class="btn btn-primary">Show All Meals</a>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
