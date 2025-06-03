@extends('layouts.app')

@section('content')
    <form class="max-w-sm mx-auto" id="productForm">
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
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
    </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#productForm').on('submit', function(e) {
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    url: "{{ route('product.store') }}",
                    type: "POST",
                    data: data,
                    success: function(response) {
                        alert('Product created successfully!');
                    },
                    error: function(xhr) {
                        alert('Error creating product: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
