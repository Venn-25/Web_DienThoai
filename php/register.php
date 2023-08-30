<?php
    $msv = $_POST['msv'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : array();
    $hobbies = isset($_POST["hobbies"]) ? $_POST["hobbies"] : array();
    $country = $_POST['country'];
    $note = $_POST['note'];
?>

<?php
    $msv = trim(strip_tags($msv));
    $fullname = trim(strip_tags($fullname));
    $email = trim(strip_tags($email));
    $country = trim(strip_tags($country));
    $note = trim(strip_tags($note));
?>

<?php
    // Mảng để lưu trạng thái lỗi và thông báo lỗi
    $error = '';

    if(empty($msv)) {
        $error .= 'Bạn chưa nhập mã sinh viên<br>';
    }
    if(empty($fullname)) {
        $error .= 'Bạn chưa nhập họ tên<br>';
    }
    if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $error .= 'Email không hợp lệ<br>';
    }
    if($gender != 0 && $gender != 1) {
        $error .= 'Bạn chưa chọn giới tính<br>';
    }
    if(empty($hobbies)) {
        $error .= 'Bạn chưa chọn sở thích<br>';
    }
    if(empty($country)) {
        $error .= 'Bạn chưa chọn quốc tịch<br>';
    }
    if (strlen($note) > 200) {
        $error .= "Độ dài ghi chú không vượt quá 200 ký tự";
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
        require_once 'connect.php';

        // Kiểm tra xem mã sinh viên đã tồn tại hay chưa
        $checkQuery = "SELECT * FROM user WHERE userid = '$msv'";
        $checkResult = $conn->query($checkQuery);
        if ($checkResult->rowCount() > 0) {
            // Mã sinh viên đã tồn tại, thêm thông báo vào biến lỗi
            $error .= 'Mã sinh viên này đã tồn tại<br>';
            echo '<div class="error-message">';
            echo '<h2>ĐĂNG KÝ KHÔNG THÀNH CÔNG!</h2>';
            echo "<p>$error</p>";
            echo '<button class="register-btn" onclick="history.back()">Quay lại</button>';
            echo '</div>';
        } 
        else {
            if($error != '') {
                echo '<div class="error-message">';
                echo '<h2>ĐĂNG KÝ KHÔNG THÀNH CÔNG!</h2>';
                echo "<p>$error</p>";
                echo '<button class="register-btn" onclick="history.back()">Quay lại</button>';
                echo '</div>';
            } 
            else {
    
                // Chuyển mảng thành chuỗi để lưu vào cơ sở dữ liệu
                $hobby = implode(', ', $hobbies);
    
                $sql = "INSERT INTO user(userid, username, useremail, usergender, userhobby, usercountry, usernote)
                        VALUES ('$msv', '$fullname', '$email', '$gender', '$hobby', '$country', '$note')";
                $kq = $conn->exec($sql);
    
                if($kq == 1) {
                    echo '<div class="register-success">';
                    echo '<h2>Đăng ký thành công</h2>';
                    echo '<a class="register-btn" href="../index.html">Về trang chủ</a>';
                    echo '</div>';
                }
            } 
        }
    ?>
</body>
</html>