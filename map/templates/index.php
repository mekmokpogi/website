<?php
include "config.php";

function getUniqueBarangays() {
  global $conn;
  $sql = "SELECT DISTINCT barangay FROM `forms`";
  $result = $conn->query($sql);
  $barangays = [];
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $barangays[] = $row['barangay'];
  }
  return $barangays;
}

function getFilteredData($barangay) {
  global $conn;
  $sql = "SELECT * FROM `forms`";
  if (!empty($barangay)) {
    $sql .= " WHERE barangay = :barangay";
  }
  $sql .= " ORDER BY id DESC";
  $stmt = $conn->prepare($sql);
  if (!empty($barangay)) {
    $stmt->bindParam(':barangay', $barangay);
  }
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$selectedBarangay = isset($_GET['barangay']) ? $_GET['barangay'] : '';

$result = getFilteredData($selectedBarangay);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>crud</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  <style>
    /* Custom style for the scrollable container */
    .scrollable-container {
      max-height: 500px;
      /* Set a maximum height for the scrollable container */
      overflow-y: auto;
      /* Enable vertical scrolling */
      border: 1px solid #ddd;
      /* Add a border for a box-like appearance */
      border-radius: 8px;
      /* Optional: Add border-radius for rounded corners */
    }

    /* Style for the labels in the table header */
    .table-dark th {
      background-color: #1E90FF;
      /* Blue background color */
      color: white;
      /* White text color */
    }

    .btn-custom {
      background-color: #1E90FF;
      /* Blue background color */
      color: white;
      border-radius: 30px;
      /* Adjust border-radius as needed */
      padding: 10px 20px;
      /* Adjust padding as needed */
      text-decoration: none;
      font-weight: bold;
    }

    .btn-custom:hover {
      background-color: #0056b3;
      /* Darker blue on hover */
    }
  </style>
</head>

<body>

  <div class="container mt-4">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="forms.php" class="btn btn-custom mb-3">Add New</a>

    <div class="mb-3">
      <label for="searchInput" class="form-label">Search:</label>
      <input type="text" class="form-control" id="searchInput" oninput="searchRecords()" placeholder="Enter keywords">
    </div>

    <div class="mb-3">
  <label for="barangaySelect" class="form-label">Select Barangay:</label>
  <select class="form-select" id="barangaySelect" onchange="filterByBarangay()">
    <option value="">All Barangays</option>
    <?php
    $barangays = getUniqueBarangays();
    foreach ($barangays as $barangay) {
      $selected = ($_SESSION['logged_in_user_barangay'] == $barangay) ? 'selected' : '';
      echo "<option value='" . $barangay . "' " . $selected . ">" . $barangay . "</option>";
    }
    ?>
  </select>
</div>


    <div class="scrollable-container">
      <table class="table table-hover text-center">
        <thead class="table-dark sticky-top">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Age</th>
            <th scope="col">Term</th>
            <th scope="col">Barangay</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $rowNumber = 1;
          foreach ($result as $row) {
          ?>
            <tr data-row="<?php echo $rowNumber; ?>">
              <td><?php echo $row["id"] ?></td>
              <td><?php echo $row["last_name"] ?></td>
              <td><?php echo $row["first_name"] ?></td>
              <td><?php echo $row["age"] ?></td>
              <td><?php echo $row["term"] ?></td>
              <td><?php echo $row["barangay"] ?></td>
              <td>
                <a href="view.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-eye fs-5"></i></a>
                <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
              </td>
            </tr>
          <?php
            $rowNumber++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    function searchRecords() {
        var searchInput = document.getElementById("searchInput").value.toLowerCase();
      var tableRows = document.querySelectorAll(".table tbody tr");

      tableRows.forEach(function(row) {
        var rowData = row.innerText.toLowerCase();
        if (rowData.includes(searchInput)) {
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      });
    }

    function filterByBarangay() {
      var select = document.getElementById("barangaySelect");
      var selectedBarangay = select.options[select.selectedIndex].value;
      var tableRows = document.querySelectorAll(".table tbody tr");

      tableRows.forEach(function (row) {
        var rowData = row.innerText.toLowerCase();
        if (rowData.includes(selectedBarangay.toLowerCase()) || selectedBarangay === "") {
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      });
    }
  </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>