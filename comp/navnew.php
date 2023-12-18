<nav>
    <div class="bg-gray-100 rounded-md shadow-md">
        <div style="width: 100%; height: 59px; position: relative" class="flex justify-between items-center px-4 py-2">
            <div style="width: 100%; height: 0px; left: 0px; top: 59px; position: absolute; border: 1px #E3E3E3 solid"></div>
            <div style="width: 100%; height: 25px; left: 530px; top: 4px; position: absolute; justify-content: center; align-items: center; gap: 22px; display: inline-flex">
                <div style="justify-content: flex-start; align-items: center; gap: 8px; display: flex">
                    <div style="width: 25px; height: 25px; justify-content: center; align-items: center; display: flex">
                        <div style="width: 20px; height: 19px; text-align: center; color: #1E2832; font-size: 20px; font-family: Font Awesome 6 Free; font-weight: 900; word-wrap: break-word"><i class="fa-solid fa-user"></i></div>
                    </div>
                    <?php if (!isset($_SESSION["user_login"])) : ?>
                        <a href="../users/login.php" class="font-semibold text-gray-600 hover:text-gray-700">Account</a>
                    <?php else : ?>
                        <span class="font-semibold text-gray-600 hover:text-gray-700"><?php echo $_SESSION["user_name"]; ?></span>
                        <a href="../users/logout.php" class="font-semibold text-gray-600 hover:text-gray-700">
                                Logout
                            </a>
                    <?php endif; ?>
                </div>
                <div style="justify-content: flex-start; align-items: center; gap: 8px; display: flex">
                    <div style="width: 25px; height: 25px; justify-content: center; align-items: center; display: flex">
                        <div style="width: 20px; height: 19px; text-align: center; color: #1E2832; font-size: 20px; font-family: Font Awesome 6 Free; font-weight: 900; word-wrap: break-word"><i class="fa-solid fa-cart-plus"></i></div>
                    </div>
                    <a href="cart.php" style="color: #1E2832; font-size: 18px; font-family: Roboto; font-weight: 400; text-transform: capitalize; word-wrap: break-word">Shoping</a>
                </div>
            </div>
            <div style="width: 180px; height: 34px; left: 570px; top: 0px; position: absolute">
                <div style="left: 41px; top: 0px; position: absolute; color: black; font-size: 28px; font-family: AmstelvarAlpha; font-weight: 400; word-wrap: break-word">กูไม่รู้ชื่อร้าน</div>
                <div style="width: 31px; height: 15px; left: 149px; top: 10px; position: absolute">
                </div>
                <div style="width: 31px; height: 15px; left: 0px; top: 10px; position: absolute">
                </div>
            </div>
            <div style="width: 25px; height: 25px; left: 0px; top: 4px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
                <div style="width: 20px; height: 19px; text-align: center; color: #1E2832; font-size: 20px; font-family: Font Awesome 6 Free; font-weight: 900; word-wrap: break-word"><i class="fa-solid fa-magnifying-glass"></i></div>
            </div>
        </div>
        <div style="width: 100%; height: 40px; justify-content: space-between; align-items: center; display: inline-flex">
            <div style="justify-content: flex-start; align-items: flex-start; display: flex">
                <div style="color: black; font-size: 16px; font-family: Open Sans; font-weight: 300; text-transform: capitalize; line-height: 24px; word-wrap: break-word">Jewelry & Accessories</div>
            </div>
            <div style="justify-content: flex-start; align-items: flex-start; display: flex">
                <div style="color: black; font-size: 16px; font-family: Open Sans; font-weight: 300; text-transform: capitalize; line-height: 24px; word-wrap: break-word">Clothing & Shoes</div>
            </div>
            <div style="justify-content: flex-start; align-items: flex-start; display: flex">
                <div style="color: black; font-size: 16px; font-family: Open Sans; font-weight: 300; text-transform: capitalize; line-height: 24px; word-wrap: break-word">Home & Living</div>
            </div>
            <div style="justify-content: flex-start; align-items: flex-start; display: flex">
                <div style="color: black; font-size: 16px; font-family: Open Sans; font-weight: 300; text-transform: capitalize; line-height: 24px; word-wrap: break-word">Wedding & Party</div>
            </div>
            <div style="justify-content: flex-start; align-items: flex-start; display: flex">
                <div style="color: black; font-size: 16px; font-family: Open Sans; font-weight: 300; text-transform: capitalize; line-height: 24px; word-wrap: break-word">Toys & Entertainment</div>
            </div>
            <div style="justify-content: flex-start; align-items: flex-start; display: flex">
                <div style="color: black; font-size: 16px; font-family: Open Sans; font-weight: 300; text-transform: capitalize; line-height: 24px; word-wrap: break-word">Art & Collectibles</div>
            </div>
            <div style="justify-content: flex-start; align-items: flex-start; display: flex">
                <div style="color: black; font-size: 16px; font-family: Open Sans; font-weight: 300; text-transform: capitalize; line-height: 24px; word-wrap: break-word">Craft Supplies & Tools</div>
            </div>
        </div>
    </div>
</nav>