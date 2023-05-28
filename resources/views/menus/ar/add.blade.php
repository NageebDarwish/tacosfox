<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" dir="rtl">
            {{ __('منيو جديدة') }}
        </h2>
    </x-slot>

    <div class="py-12" dir="rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
                <form action="{{ url('/dashboard-ar/menu/add-menu') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="title" class="form-label">العنوان</label>
                        <input required name="title" type="text" class="form-control" id="title"
                            placeholder="العنوان...">
                    </div>
                    <div class="mb-3">
                        <label for="coverimg" class="form-label">الصورة</label>
                        <input required name="image" class="form-control form-control-lg p-2" type="file"
                            id="coverimg">
                    </div>
                    <div>
                        <x-primary-button>{{ __('حفظ المنيو') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
