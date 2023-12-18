<?php
session_start();
include "../config.php";
$so_no = $_POST['so_no'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .main-content {
            width: 80%;
            padding: 20px;
            flex-wrap: wrap;
        }

        .head {
            height: 46px;
        }

        .cart-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .cart-table th,
        .cart-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .cart-product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-right: 10px;
        }

        .product-info h3 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }

        .product-info p {
            margin: 0;
            font-size: 14px;
            color: #777;
        }

        .quantity {
            display: flex;
            align-items: center;
        }

        .quantity-value {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            margin-right: 5px;
        }

        .total {
            margin-top: 20px;
            text-align: right;
            font-size: 18px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
            font-size: 14px;
        }
    </style>
</head>

<body class="shadow dark:bg-gray-700">
    <?php include '../comp/nav.php' ?>
    <div class="container mx-auto">
        <div class="columns-2 flex">
            <?php include '../comp/sidebar.php' ?>
            <div class="main-content">
                <div class="head bg-zinc-400">
                    <a>ทำการสั่งซื้อ</a>
                </div>

                <div class="form-container">
                    <form action="addsale_order.php" method="post">
                        <div class="form-group">
                            <label for="address">ที่อยู่</label>
                            <textarea id="address" name="address" rows="4" placeholder="กรอกที่อยู่ของคุณ"></textarea>
                        </div>
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Line Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $sumprice = 0;
                                $EMS = 50;
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
                                        $total = $subtotal+$EMS;
                                ?>
                                        <tr>
                                            <td>
                                                <img class="cart-product-image" src="../img/<?= $row['img'] ?>" alt="<?= $row['pro_name'] ?>">
                                                <div class="product-info">
                                                    <h3><?= $row['pro_name'] ?></h3>
                                                    <p><?= $row['type_name'] ?></p>
                                                </div>
                                            </td>
                                            <td><?= $row['price'] ?> บาท</td>
                                            <td>
                                                <div class="quantity">
                                                    <span class="quantity-value"><?= $quantity ?></span>
                                                </div>
                                            </td>
                                            <td><?= $subtotal ?> บาท</td>
                                        </tr>
                                <?php
                                    }
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>

                        <div class="total">
                             <a>รวมการสั่งซื้อ <?php echo $subtotal ?> บาท</a>
                              <a>รวมการจัดส่ง: <?php echo $EMS ?></a>
                              <a>ยอดชำระเงินทั้งหมด : <?php echo $total ?></a>
                        </div>

                        <div class="mt-6">
                            <button type="submit" name="submitOrder" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">สั่งซื้อ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
