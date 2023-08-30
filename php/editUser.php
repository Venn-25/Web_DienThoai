<?php
require_once './connect.php'; // Nhúng file kết nối

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
    <title>Chỉnh sửa thông tin</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="register-container">
        <div class="register-box">
            <h2>CHỈNH SỬA THÔNG TIN</h2>
            <form action="updateUser.php" method="post">
                <input type="hidden" name="userid" 
                        value="<?php echo $userData['userid']; ?>">
                <div class="form-group">
                    <label for="fullname" class="form-label">Họ và Tên</label>
                    <input id="fullname" name="fullname" type="text" 
                           value="<?php echo $userData['username']; ?>">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" 
                            value="<?php echo $userData['useremail']; ?>">
                </div>
                <div class="form-group">
                    <label for="gender" class="form-label">Giới tính</label>
                    <div class="radio-box">
                        <input type="radio" id="male" name="gender" 
                               value="1" <?php echo ($userData['usergender'] == 1) ? 'checked' : ''; ?>>
                        <label for="male">Nam</label>
                        <input type="radio" id="female" name="gender" 
                               value="0" <?php echo ($userData['usergender'] == 0) ? 'checked' : ''; ?>>
                        <label for="female">Nữ</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="hobbies" class="form-label">Sở thích</label>
                    <div class="check-box">
                        <?php
                        $hobbies = explode(', ', $userData['userhobby']);
                        $allHobbies = [
                            'Đọc sách', 
                            'Du lịch', 
                            'Âm nhạc', 
                            'Ẩm thực', 
                            'Khác'
                        ];
                        foreach ($allHobbies as $hobby) {
                            echo '<input type="checkbox" id="' . strtolower($hobby) . 
                                '" name="hobbies[]" value="' . $hobby . 
                                '" ' . (in_array($hobby, $hobbies) ? 'checked' : '') . '>';
                            echo '<label for="' . strtolower($hobby) . '">' . $hobby . '</label>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="form-label">Quốc tịch</label>
                    <select name="country" id="country">
                        <option value="0">Chọn quốc tịch</option>
                        <?php
                        $countries = [
                            'Việt Nam', 
                            'Thái Lan', 
                            'Singapore', 
                            'Philippines', 
                            'Myanmar', 
                            'Malaysia', 
                            'Lào', 
                            'Indonesia', 
                            'Đông Timor', 
                            'Campuchia', 
                            'Brunei'
                        ];
                        foreach ($countries as $country) {
                            echo '<option value="' . $country . '" ' . 
                            ($userData['usercountry'] == $country ? 'selected' : '') . '>' . $country . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="register-submit">Lưu</button>
            </form>
        </div>
    </div>
</body>
</html>
