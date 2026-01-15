<?php
  session_start();
  include_once "./controlls/admin_logic.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard | MaBagnole</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<?php include_once "./View/header.php"; ?>

<div class="bg-gray-900 text-gray-100 min-h-screen flex">

<!-- SIDEBAR -->
<aside class="w-64 bg-gray-800 p-6 hidden md:block">

  <nav class="space-y-3">
    <button onclick="showSection('stats')" class="nav-btn">📊 Dashboard</button>
    <button onclick="showSection('vehicles')" class="nav-btn">🚗 Vehicles</button>
    <button onclick="showSection('categories')" class="nav-btn">📂 Categories</button>
    <button onclick="showSection('reservations')" class="nav-btn">📅 Reservations</button>
    <button onclick="showSection('reviews')" class="nav-btn">⭐ Reviews</button>
  </nav>
</aside>

<!-- MAIN -->
<main class="flex-1 p-8">

<!-- ================= DASHBOARD ================= -->
<section id="stats" class="admin-section">
  <h2 class="title">Statistics Overview</h2>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="stat-card">🚗 Vehicles <span>32</span></div>
    <div class="stat-card">📅 Reservations <span>74</span></div>
    <div class="stat-card">⭐ Reviews <span>189</span></div>
  </div>
</section>

<!-- ================= VEHICLES ================= -->
<section id="vehicles" class="admin-section hidden">
  <h2 class="title">Vehicle Management</h2>

  <!-- BULK INSERT -->
  <div class="bg-gray-800 p-4 rounded-lg mb-6">
    <h3 class="font-semibold mb-2 text-yellow-400">Bulk Insert Vehicles</h3>
    <input type="file" class="w-full bg-gray-700 p-2 rounded" />
    <button class="btn-primary mt-3">Upload CSV</button>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>Model</th>
        <th>Category</th>
        <th>Price/Day</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($vehicledata as $data){
          echo "
            <tr>
              <td>{$data['model']}</td>
              <td>Economy</td>
              <td>{$data['price_day']}</td>
              <td class='text-green-400'>{$data['vehicle_status']}</td>
              <td>
                <a href='edit_Vehicle/{$data['vehicle_id']}' class='btn-edit'>Edit</a>
                <a href='delete_Vehicle/{$data['vehicle_id']}' class='btn-delete'>Delete</a>
              </td>
            </tr>
          ";
        }

      ?>
    </tbody>
  </table>
</section>

<!-- ================= CATEGORIES ================= -->
<section id="categories" class="admin-section hidden">
  <h2 class="title">Category Management</h2>

  <div class="bg-gray-800 p-4 rounded-lg mb-6">
    <h3 class="text-yellow-400 font-semibold mb-2">Add Category</h3>
    <input type="text" placeholder="Category name"
      class="w-full bg-gray-700 p-2 rounded mb-3">
    <button class="btn-primary">Add Category</button>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Category</th>
        <th>actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($categorydata as $dat){
          echo "
            <tr>
              <td class='text-center'>{$dat['id']}</td>
              <td class='text-center'>{$dat['cate_name']}</td>
              <td class='text-center'>
                <button class='btn-edit'>Edit</button>
                <button class='btn-delete' onclick='openDelete()'>Delete</button>
              </td>
            </tr>
          ";
        }

      ?>
    </tbody>
  </table>
</section>

<!-- ================= RESERVATIONS ================= -->
<section id="reservations" class="admin-section hidden">
  <h2 class="title">Reservations</h2>

  <?php
    foreach($reserdata as $res){
      echo "
            <div class='card'>
              <div>
                <p class='font-semibold'>{$res['model']}</p>
                <p class='text-sm text-gray-400'>{$res['start_date']} → {$res['end_date']}</p>
              </div>
              <div class='space-x-2'>
                <button class='btn-approve'>Approve</button>
                <button class='btn-reject'>Reject</button>
              </div>
            </div>
          ";
    }
  ?>
  
</section>

<!-- ================= REVIEWS ================= -->
<section id="reviews" class="admin-section hidden">
  <h2 class="title">Review Moderation</h2>

  <?php
    foreach($revidate as $revi){
      if($revi['reviews_comment'] != null){
      echo "
        <div class='card'>
          <div>
            <p class='font-semibold'>{$revi['model']}</p>
            <p class='text-sm text-gray-400'>
              '{$revi['reviews_comment']}'
            </p>
          </div>
          <button class='btn-delete' onclick='openDelete()'>Delete</button>
        </div>
        ";
      }
    }
  ?>
  
</section>

<!-- ================= CUSTOMERS ================= -->
<section id="customers" class="admin-section hidden">
  <h2 class="title">Customer Management</h2>

  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Reservations</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Achraf</td>
        <td>achraf@email.com</td>
        <td>4</td>
        <td class="text-green-400">Active</td>
      </tr>
    </tbody>
  </table>
</section>

</main>

<!-- DELETE MODAL -->
<div id="deleteModal"
 class="fixed inset-0 hidden bg-black/60 flex items-center justify-center z-50">

  <div class="bg-gray-800 p-6 rounded-xl text-center max-w-sm">
    <h3 class="text-xl font-bold text-red-400 mb-4">
      Confirm Deletion
    </h3>
    <p class="mb-6 text-gray-300">
      This action is irreversible.
    </p>
    <div class="flex justify-center gap-4">
      <button onclick="closeDelete()" class="btn-secondary">Cancel</button>
      <button class="btn-delete">Delete</button>
    </div>
  </div>
</div>
</div>
<!-- JS -->
<script>
function showSection(id) {
  document.querySelectorAll('.admin-section')
    .forEach(sec => sec.classList.add('hidden'));
  document.getElementById(id).classList.remove('hidden');
}

function openDelete() {
  document.getElementById('deleteModal').classList.remove('hidden');
}
function closeDelete() {
  document.getElementById('deleteModal').classList.add('hidden');
}
</script>

<!-- STYLES -->
<style>
.nav-btn {
  width: 100%;
  text-align: left;
  padding: 10px;
  background: #374151;
  border-radius: 8px;
}
.nav-btn:hover { background: #facc15; color: black; }

.title {
  font-size: 28px;
  font-weight: bold;
  color: #facc15;
  margin-bottom: 20px;
}

.stat-card {
  background: #1f2937;
  padding: 20px;
  border-radius: 12px;
  display: flex;
  justify-content: space-between;
}

.table {
  width: 100%;
  background: #1f2937;
  border-radius: 10px;
  overflow: hidden;
}
.table th, .table td {
  padding: 12px;
  border-bottom: 1px solid #374151;
}

.card {
  background: #1f2937;
  padding: 16px;
  border-radius: 10px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 12px;
}

.btn-primary { background:#facc15;color:black;padding:6px 14px;border-radius:6px }
.btn-secondary { background:#6b7280;padding:6px 14px;border-radius:6px }
.btn-edit { background:#facc15;color:black;padding:4px 10px;border-radius:6px }
.btn-delete { background:#ef4444;padding:4px 10px;border-radius:6px }
.btn-approve { background:#22c55e;padding:6px 12px;border-radius:6px }
.btn-reject { background:#ef4444;padding:6px 12px;border-radius:6px }
</style>

</body>
</html>
