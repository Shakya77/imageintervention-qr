@extends('layouts.app')

@section('content')
    <form class="max-w-sm mx-auto" id="productForm" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Product Name</label>
            <input type="text" id="name" name="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                placeholder="name@flowbite.com" required />
        </div>
        <div class="mb-5">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
            <input type="number" id="price" name="price"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                required />
        </div>
        <input type="file" id="image" name="image"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5" />
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
    </form>

    <div class="">
        @foreach ($products as $product)
            <div class="max-w-sm mt-5">
                <div class="bg-white border border-gray-200 rounded-lg shadow-md p-5">
                    <h5 class="text-xl font-bold tracking-tight text-gray-900">{{ $product->name }}</h5>
                    <p class="text-gray-700">Price: ${{ number_format($product->price, 2) }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#productForm').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                var formData = new FormData(form); // use `form`, not `$(this)`
                $.ajax({
                    url: "{{ route('product.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false, // don't let jQuery set contentType
                    processData: false, // don't let jQuery process FormData
                    success: function(response) {
                        window.location.reload(true);
                    },
                    error: function(xhr) {
                        alert('Error creating product: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
