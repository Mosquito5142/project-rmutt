<?php include '../config.php';
 session_start(); 
?>
<!DOCTYPE html>
<html>
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
      </header>
    </div>
  </div>
  <div class="container mx-auto">
    <div class="main-content">
    <?php
    $ids=$_GET['id'];
            $sql = "SELECT * FROM product ,type where product.type_id=type.type_id and product.pro_id='$ids'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
      ?>
    <div style="width: 100%; height: 100%; position: relative;">
    <div style="width: 350px; height: 50px; left: 740px; top: 509px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
        <div style="width: 350px; height: 50px; position: relative">
            <div style="width: 350px; height: 50px; left: 0px; top: 0px; position: absolute; background: #0D0D0D; border: 1px #0D0D0D solid"></div>
            <a style="left: 111.12px; top: 14px; position: absolute; text-align: center; color: white; font-size: 16px; font-family: Public Sans; font-weight: 600; line-height: 22px; word-wrap: break-word" href="order.php?id=<?= $row['pro_id'] ?>">Add to Cart - <?=$row['price']?> บาท</a>
        </div>
    </div>
    <div style="height: 84px; left: 1108px; top: 475px; position: absolute">
    </div>
    <div style="width: 28.89px; height: 25.84px; left: 1114.56px; top: 149.08px; position: absolute; background: black"></div>
    <div style="width: 554px; height: 420px; left: 110px; top: 148px; position: absolute; background: #a6C4C4">
    <img class="w-full h-full" src="../img/<?= $row['img'] ?>" alt="<?= $row['pro_name'] ?>" />
    </div>
    <div style="width: 519px; left: 740px; top: 138px; position: absolute; color: black; font-size: 36px; font-family: Public Sans; font-weight: 600; line-height: 44px; word-wrap: break-word"><?= $row['pro_name']?></div>
    <div style="width: 519px; left: 740px; top: 188px; position: absolute; color: black; font-size: 18px; font-family: Public Sans; font-weight: 400; line-height: 26px; word-wrap: break-word"><?= $row['type_name']?></div>
    <div style="width: 357px; left: 740px; top: 237px; position: absolute; color: #0D0D0D; font-size: 20px; font-family: Public Sans; font-weight: 400; line-height: 28px; word-wrap: break-word"><?= $row['pro_detail']?></div>
    <div style="left: 739px; top: 357px; position: absolute; color: #0D0D0D; font-size: 20px; font-family: Public Sans; font-weight: 400; line-height: 28px; word-wrap: break-word">คงเหลือ: <?=$row['amount']?></div>
    <div style="width: 32px; height: 32px; left: 1153px; top: 146px; position: absolute">
        <div style="width: 25.60px; height: 25.60px; left: 3.20px; top: 3.20px; position: absolute">
            <div style="width: 25.60px; height: 25.60px; left: 0px; top: 0px; position: absolute; background: black"></div>
            <div style="width: 13.34px; height: 13.35px; left: 12.26px; top: 0px; position: absolute; background: black"></div>
        </div>
    </div>
      </div>
      </div>
</body>

</html>