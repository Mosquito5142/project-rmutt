<?php
include "../config.php";
session_start();

// เชื่อมต่อกับฐานข้อมูล
$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    echo "Fail to connect to MySQL";
    exit();
}

// ดึงวันที่ปัจจุบัน
$so_date = date('Y-m-d');
$so_no = $_POST['so_no'];

if (isset($_SESSION['user_no'])) {
    $user_no = $_SESSION['user_no'];

    // เพิ่มข้อมูลในตาราง sales_orders
    $sql_sales_orders = "INSERT INTO sales_orders (so_no, so_date, user_no,  order_status) VALUES ('$so_no', '$so_date', '$user_no','Pending')";

    if (mysqli_query($con, $sql_sales_orders)) {
        echo "New record created successfully in sales_orders";
    } else {
        echo "Error: " . $sql_sales_orders . "<br>" . mysqli_error($con);
    }

    // เพิ่มข้อมูลในตาราง sale_relations
    if ($_SESSION["intLine"] > 0) {
        for ($i = 0; $i < $_SESSION["intLine"]; $i++) {
            if (isset($_SESSION["strProductID"][$i]) && isset($_SESSION["strQty"][$i])) {
                $pro_no = $_SESSION["strProductID"][$i];
                $qty_ordered = $_SESSION["strQty"][$i];

                $sql_sale_relations = "INSERT INTO sale_relations (so_no, pro_id, qty_ordered) VALUES ('$so_no', '$pro_no', '$qty_ordered')";

                if (mysqli_query($con, $sql_sale_relations)) {
                    echo "New record created successfully in sale_relations";
                } else {
                    echo "Error: " . $sql_sale_relations . "<br>" . mysqli_error($con);
                }
            }
        }
    }

    // ทำความสะอาด Session
    unset($_SESSION["intLine"]);
    unset($_SESSION["strProductID"]);
    unset($_SESSION["strQty"]);
} else {
    echo "Error: user_no is not set in the session.";
}
?>
