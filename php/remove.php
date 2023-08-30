<?php
require_once './connect.php'; // Đảm bảo rằng bạn đã bao gồm file kết nối

if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];

    // Truy vấn để lấy thông tin người dùng dựa trên userid
    $selectSql = "SELECT * FROM user WHERE userid = $userid";
    $userData = $conn->query($selectSql)->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận xóa người dùng</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="delete-user">
        <h2>Xác nhận xóa người dùng</h2>
        <p>Bạn có chắc chắn muốn xóa người dùng này? </p>
        <p><b>Mã: </b><?php echo $userData['userid']; ?></p>
        <p><b>Họ và Tên: </b><?php echo $userData['username']; ?></p>
        <p><b>Email: </b><?php echo $userData['useremail']; ?></p>
        <p><b>Giới tính: </b><?php echo ($userData['usergender'] == 1) ? "Nam" : "Nữ"; ?></p>
        <p><b>Sở thích: </b><?php echo $userData['userhobby']; ?></p>
        <p><b>Quốc tịch: </b><?php echo $userData['usercountry']; ?></p>
        
    
        <form action="deleteUser.php" method="post">
            <input type="hidden" name="userid" value="<?php echo $userData['userid']; ?>">
            <button class="register-btn" type="submit">Xác nhận xóa</button>
            <a href="userManagement.php">Quay lại</a>
        </form>
    </div>
</body>
</html>
