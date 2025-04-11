<form action="{{ route('cars.store') }}" method="POST" class="max-w-4xl mx-auto p-8 bg-white rounded-lg shadow-md" id="car-form">
    @csrf

    <label for="license_plate" class="block text-sm font-medium text-gray-600">License Plate:</label>
    <input type="text" id="license_plate" name="license_plate" required class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="XX-99-99" pattern="[A-Za-z]{2}-\d{2}-\d{2}" onblur="fetchCarData()">


    <div id="car-info" class="hidden">
        <h3 class="mt-6 text-lg font-semibold text-gray-700">Auto Informatie</h3>
        <ul>
            <li><strong>Brand:</strong> <span id="brand"></span></li>
            <li><strong>Model:</strong> <span id="model"></span></li>
            <li><strong>Price:</strong> <span id="price"></span></li>
            <li><strong>Mileage:</strong> <span id="mileage"></span></li>
        </ul>
    </div>

    <button type="submit" class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
        Create Car
    </button>
</form>

<script>
    function fetchCarData() {
        const licensePlate = document.getElementById('license_plate').value;
        if (licensePlate) {
            fetch(`/cars/get-rdw-data`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ license_plate: licensePlate }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('car-info').classList.remove('hidden');
                    document.getElementById('brand').innerText = data.data.brand || 'N/A';
                    document.getElementById('model').innerText = data.data.model || 'N/A';
                    document.getElementById('price').innerText = data.data.price || 'N/A';
                    document.getElementById('mileage').innerText = data.data.mileage || 'N/A';
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Er is iets misgegaan.');
            });
        }
    }
</script>
