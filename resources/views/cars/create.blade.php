@vite('resources/css/app.css')

<form action="{{ route('cars.store') }}" method="POST" class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md space-y-6">
    @csrf

    <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Create a Car Listing</h2>

    <div class="space-y-4">

        <!-- License Plate -->
        <div>
            <label for="license_plate" class="block text-sm font-medium text-gray-600">License Plate:</label>
            <input type="text" id="license_plate" name="license_plate" required class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="XX-99-99" pattern="[A-Za-z]{2}-\d{2}-\d{2}">
        </div>

        <!-- Brand -->
        <div>
            <label for="brand" class="block text-sm font-medium text-gray-600">Brand:</label>
            <input type="text" id="brand" name="brand" required class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Model -->
        <div>
            <label for="model" class="block text-sm font-medium text-gray-600">Model:</label>
            <input type="text" id="model" name="model" required class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block text-sm font-medium text-gray-600">Price:</label>
            <input type="text" id="price" name="price" required class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="€0.00">
        </div>

        <!-- Mileage -->
        <div>
            <label for="mileage" class="block text-sm font-medium text-gray-600">Mileage:</label>
            <input type="number" id="mileage" name="mileage" required class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Seats -->
        <div>
            <label for="seats" class="block text-sm font-medium text-gray-600">Seats (optional):</label>
            <input type="number" id="seats" name="seats" class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Doors -->
        <div>
            <label for="doors" class="block text-sm font-medium text-gray-600">Doors (optional):</label>
            <input type="number" id="doors" name="doors" class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Production Year -->
        <div>
            <label for="production_year" class="block text-sm font-medium text-gray-600">Production Year (optional):</label>
            <input type="number" id="production_year" name="production_year" class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Weight -->
        <div>
            <label for="weight" class="block text-sm font-medium text-gray-600">Weight (optional):</label>
            <input type="number" id="weight" name="weight" class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Color -->
        <div>
            <label for="color" class="block text-sm font-medium text-gray-600">Color (optional):</label>
            <input type="text" id="color" name="color" class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Image URL -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-600">Image URL (optional):</label>
            <input type="text" id="image" name="image" class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Sold At -->
        <div>
            <label for="sold_at" class="block text-sm font-medium text-gray-600">Sold At (optional):</label>
            <input type="date" id="sold_at" name="sold_at" class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
        </div>

    </div>

    <!-- Submit Button -->
    <div class="mt-8">
        <button type="submit" class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
            Create Car
        </button>
    </div>
</form>
