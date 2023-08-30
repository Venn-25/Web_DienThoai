<?php
require_once './connect.php'; // Nhúng file kết nối

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
    $username = $_POST['fullname'];
    $useremail = $_POST['email'];
    $usergender = $_POST['gender'];
    $userhobbies = implode(', ', $_POST['hobbies']); // Chuyển mảng sở thích thành chuỗi
    $usercountry = $_POST['country'];

    // Truy vấn để cập nhật thông tin người dùng dựa trên userid
    $updateSql = "UPDATE user SET 
                username = '$username', 
                useremail = '$useremail', 
                usergender = '$usergender', 
                userhobby = '$userhobbies', 
                usercountry = '$usercountry'
                WHERE userid = $userid";
    
    $conn->exec($updateSql);

    // Chuyển hướng trở lại trang quản lý người dùng hoặc trang khác tùy theo yêu cầu
    header("Location: userManagement.php");
    exit();
}
?>
