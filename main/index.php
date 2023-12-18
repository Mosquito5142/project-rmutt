<?php include '../config.php' ?>

<?php
session_start();

// Handle sorting
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'pro_id';
$sortOptions = [
  'price_asc' => 'price ASC',
  'price_desc' => 'price DESC',
  'name_asc' => 'pro_name ASC',
  'name_desc' => 'pro_name DESC',
];

$orderBy = $sortOptions[$sort] ?? 'pro_id';
$sql = "SELECT * FROM product INNER JOIN type ON product.type_id = type.type_id ORDER BY $orderBy";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Website</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
  </style>
</head>

<body>
  <div class="head_bg bg-gray-100">
    <div class="container mx-auto">
      <header>
        <?php include '../comp/navnew.php' ?>
        <div class="head-image">
          <a>
            <img style="height: 600px; width: 1920;" src="../img/head1.png" alt="#" />
          </a>
      </header>
    </div>
  </div>

  <div class="container mx-auto">
    <div class="main-content">
      <div class="sorting-form">
        <label for="sort" class="text-sm text-white">Sort by:</label>
        <select name="sort" id="sort" class="text-sm border p-1 rounded" onchange="sortProducts()">
          <option value="price_asc" <?= ($sort === 'price_asc') ? 'selected' : '' ?>>Price - Low to High</option>
          <option value="price_desc" <?= ($sort === 'price_desc') ? 'selected' : '' ?>>Price - High to Low</option>
          <option value="name_asc" <?= ($sort === 'name_asc') ? 'selected' : '' ?>>Name - A to Z</option>
          <option value="name_desc" <?= ($sort === 'name_desc') ? 'selected' : '' ?>>Name - Z to A</option>
        </select>
      </div>
      <div class="card  grid grid-cols-4 gap-2" id="product-container">
        <?php while ($row = mysqli_fetch_array($result)) : ?>
          <a href="product_detail.php?id=<?= $row['pro_id'] ?>" class="product-card">
            <figure class="snip1581"><img src="../img/<?= $row['img'] ?>" alt="<?= $row['pro_name'] ?>" />
              <figcaption>
                <h3 class="title1"><?= $row['pro_name'] ?></h3>
                <h4 class="title2"><?= $row['type_name'] ?></h4>
                <h3 class="title3"> <i class="fa-solid fa-sack-dollar"></i> <?= $row['price'] ?> บาท</h3>
              </figcaption>
            </figure>
          </a>
        <?php endwhile; ?>

      </div>
    </div>
  </div>

  <script>
    function sortProducts() {
      var selectedValue = document.getElementById('sort').value;
      window.location.href = '?sort=' + selectedValue;
    }
  </script>
</body>

</html>