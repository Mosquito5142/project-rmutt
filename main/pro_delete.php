<?php
    ob_start();
    session_start();

    if (isset($_GET["Line"])) {
        $Line = $_GET["Line"];
        unset($_SESSION["strProductID"][$Line]);
        unset($_SESSION["strQty"][$Line]);

        // ลบ intLine ด้วย
        if ($_SESSION["intLine"] > 0) {
            $_SESSION["intLine"]--;
        }
    }

    header("location:cart.php");
?>
