<?php
session_start();
include "../config.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Error " . mysqli_connect_error());
}
$result = mysqli_query($conn, '
  SELECT AUTO_INCREMENT
  FROM information_schema.TABLES
  WHERE TABLE_SCHEMA = "datadb"
  AND TABLE_NAME = "sales_orders"
');
$row = mysqli_fetch_array($result);
$next_so_no = $row["AUTO_INCREMENT"];
$next_so_no = str_pad((string)$next_so_no, 5, "0", STR_PAD_LEFT);
$currentDate = date('Y-m-d');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shopping Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include '../comp/nav.php' ?>

    <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <div class="pointer-events-auto w-screen max-w-md">
                        <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500" onclick="goToProductPage()">
                                            <span class="absolute -inset-0.5"></span>
                                            <span class="sr-only">Close panel</span>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <form action="sale_order.php" method="post">
                                    <div class="mt-8">
                                        <div class="flow-root">
                                            <input type="hidden" name="so_no" value="<?= $next_so_no ?>">
                                            <input type="hidden" name="subtotal" value="<?= $sumprice ?>">
                                            <ul role="list" class="-my-6 divide-y divide-gray-200">
                                                <?php
                                                $sumprice = 0;
                                                $i = 0;

                                                while ($i <= $_SESSION["intLine"]) {
                                                    if (isset($_SESSION["strProductID"][$i]) && $_SESSION["strProductID"][$i] !== "") {
                                                        // ดึงข้อมูลสินค้าจากฐานข้อมูลหรือ array อื่น ๆ
                                                        $product_id = $_SESSION["strProductID"][$i];
                                                        $quantity = $_SESSION["strQty"][$i];

                                                        $sql = "SELECT * FROM product ,type where product.type_id=type.type_id and pro_id='" . $product_id . "'";
                                                        $result = mysqli_query($conn, $sql);
                                                        $row = mysqli_fetch_array($result);

                                                        $subtotal = $quantity * $row['price'];
                                                        $sumprice += $subtotal;
                                                ?>
                                                        <li class="flex py-6">
                                                            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                                <img class="w-full h-full" src="../img/<?= $row['img'] ?>">
                                                            </div>
                                                            <div class="ml-4 flex flex-1 flex-col">
                                                                <div>
                                                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                                                        <h3>
                                                                            <a href="#"><?= $row['pro_name'] ?></a>
                                                                        </h3>
                                                                        <p class="ml-4">ราคา <?= $row['price'] ?> บาท</p>
                                                                    </div>
                                                                    <p class="mt-1 text-sm text-gray-500"><?= $row['type_name'] ?> </p>
                                                                    <div class="flex items-center">
                                                                        <?php if ($quantity > 1) : ?>
                                                                            <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-1 px-2 border rounded-l" href="disorder.php?id=<?= $row['pro_id'] ?>">-</a>
                                                                        <?php endif; ?>
                                                                        <p class="mx-2 text-lg font-semibold"><?= $quantity ?></p>
                                                                        <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-1 px-2 border rounded-r" href="order.php?id=<?= $row['pro_id'] ?>">+</a>
                                                                    </div>

                                                                </div>
                                                                <div class="flex flex-1 items-end justify-between text-sm">
                                                                    <p class="ml-4">รวมทั้งหมด <?= $subtotal ?> บาท</p>
                                                                    <div class="flex">
                                                                        <a type="button" class="font-medium text-indigo-600 hover:text-indigo-500" href="pro_delete.php?Line=<?= $i ?>">Remove</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                <?php
                                                    }
                                                    $i++;
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                            </div>

                            <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Subtotal</p>
                                    <p><?= $sumprice ?> บาท</p>
                                </div>
                                <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                                <div class="mt-6">
                                    <button type="submit" name="submitOrder" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">สั่งซื้อ</button>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                    <p>
                                        or
                                        <a type="button" class="font-medium text-indigo-600 hover:text-indigo-500" href="product.php">
                                            Continue Shopping
                                            <span aria-hidden="true"> &rarr;</span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function goToProductPage() {
            // Redirect to the product.php page
            window.location.href = 'index.php';
        }
    </script>

</body>

</html>