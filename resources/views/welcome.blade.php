<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mb-4">Generate QR Code for Product</h2>

        <form id="qrForm">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name:</label>
                <input type="text" name="name" class="form-control" placeholder="e.g. Apple iPhone 13" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price (Rs.):</label>
                <input type="number" name="price" class="form-control" placeholder="e.g. 125000" required>
            </div>

            <button type="submit" class="btn btn-primary">Generate QR</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle form submission
            $('#qrForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('generate.qr') }}",
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Redirect to the QR code display page
                        window.location.reload();
                    },
                    error: function(xhr) {
                        alert('Error generating QR code. Please try again.');
                    }
                });
            });
        });
    </script>
</body>

</html>
