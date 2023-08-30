<?php
require_once './connect.php'; // Đảm bảo rằng bạn đã bao gồm file kết nối

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];

    // Truy vấn để xóa người dùng dựa trên userid
    $deleteSql = "DELETE FROM user WHERE userid = $userid";
    $conn->exec($deleteSql);

    // Chuyển hướng trở lại trang quản lý người dùng hoặc trang khác tùy theo yêu cầu
    header("Location: userManagement.php");
    exit();
}
?>
