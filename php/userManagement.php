<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" 
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
            crossorigin="anonymous" 
            referrerpolicy="no-referrer" />
            
    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="header">
        <a href="../index.html" class="logo">
            <img src="../images/logo.png" alt="">
        </a>
        <ul class="navbar">
            <li><a href="../index.html">Home</a></li>
            <li><a href="../index.html">Categories</a></li>
            <li><a href="../index.html">Product</a></li>
            <li><a href="../index.html">About</a></li>
            <li><a href="../index.html">Contact</a></li>
            <li><a href="./order.html">Đặt Hàng <i class="fa-solid fa-cart-shopping"></i></a></li>
        </ul>
        <div class="header-icons">
            <a href="../register.html" id="add-user">
                <i class="fa-solid fa-user-plus"></i>
                <span>Đăng ký</span>
            </a>
            <a href="./userManagement.php" id="edit-user">
                <i class="fa-solid fa-user-pen"></i>
                <span>Sửa và xóa</span>
            </a>
        </div>
    </div>

    <div class="user-list">
        <h1>Danh sách người dùng</h1> 
        <?php
            require_once './connect.php';
            $sql = 'SELECT userid, username, useremail, usergender, userhobby, usercountry FROM user';
            $kq = $conn->query($sql);
        ?>
        <table>
            <tr>
                <th>Mã sinh viên</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Giới tính</th>
                <th>Sở thích</th>
                <th>Quốc tịch</th>
                <th>Thao tác</th>
            </tr>
            <tr>
                <?php
                     foreach ($kq as $user) {
                        echo "<tr>"; // Bắt đầu một hàng mới
                        echo "<td>", $user['userid'], "</td>";
                        echo "<td>", $user['username'], "</td>";
                        echo "<td>", $user['useremail'], "</td>";
                        echo "<td>", ($user['usergender'] == 1) ? "Nam" : "Nữ", "</td>";
                        echo "<td>", $user['userhobby'], "</td>";
                        echo "<td>", $user['usercountry'], "</td>";
                        echo "<td>", 
                                "<a href='editUser.php?userid=", $user['userid'],"' class='update-btn'>Sửa</a>
                                 <a href='remove.php?userid=", $user['userid'], "'>Xóa</a>
                             </td>";
                        echo "</tr>"; // Kết thúc hàng
                    }
                ?>
            </tr>
        </table>
    </div>

    <div class="footer">
        <div class="shop-name"><span>P</span>HONE &nbsp;<span>P</span>ARADISE</div>
        <div class="social-media">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-instagram"></i>
        </div>
        <p>&copy; Sản phẩm của Huỳnh Tấn Vương - Đinh Văn Long Vũ</p>
    </div>
</body>
</html>