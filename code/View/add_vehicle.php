<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Add Vehicles</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 p-8">

  <form method="POST" class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow space-y-6">

    <h2 class="text-2xl font-bold text-gray-700">Add Vehicles</h2>

    <!-- Vehicles container -->
    <div id="vehicles-container" class="space-y-6">

      <!-- Vehicle block -->
      <div class="vehicle border p-4 rounded-lg space-y-4">
        <h3 class="font-semibold text-lg text-gray-600">Vehicle 1</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <input
            type="text"
            name="model[]"
            placeholder="model"
            class="input"
            required
          />

          <input
            type="number"
            name="prix[]"
            placeholder="Price a Day"
            class="input"
            required
          />

          <select
            name="category[]"
            class="input"
            required
            >
            <option value="" disabled selected>Select category</option>
            <option value="sedan">Sedan</option>
            <option value="suv">SUV</option>
            <option value="hatchback">Hatchback</option>
            <option value="coupe">Coupe</option>
            <option value="convertible">Convertible</option>
            <option value="truck">Truck</option>
        </select>


          <input
            type="text"
            name="image[]"
            placeholder="image"
            class="input"
          />
        </div>
      </div>

    </div>

    <!-- Buttons -->
    <div class="flex gap-4">
      <button
        type="button"
        onclick="addVehicle()"
        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
      >
        + Add another vehicle
      </button>

      <button
        type="submit"
        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700"
      >
        Save Vehicles
      </button>
    </div>

  </form>

  <script>
    let vehicleIndex = 1;

    function addVehicle() {
      const container = document.getElementById("vehicles-container");

      const vehicleHTML = `
        <div class="vehicle border p-4 rounded-lg space-y-4 relative">
          <button
            type="button"
            onclick="this.parentElement.remove()"
            class="absolute top-2 right-2 text-red-500 text-sm"
          >
            ✕ Remove
          </button>

          <h3 class="font-semibold text-lg text-gray-600">Vehicle ${vehicleIndex + 1}</h3>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input type="text" name="" placeholder="Brand" class="input" required />
            <input type="text" name="" placeholder="Model" class="input" required />
            <input type="number" name="" placeholder="Year" class="input" required />
            <input type="text" name="" placeholder="Color" class="input" />
          </div>
        </div>
      `;

      container.insertAdjacentHTML("beforeend", vehicleHTML);
      vehicleIndex++;
    }
  </script>

  <style>
    .input {
      @apply w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500;
    }
  </style>

</body>
</html>
