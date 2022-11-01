<?php
include('common.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website bán sách</title>
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>/assets/style.css">
</head>

<body>
    <div class="container">
        <div class="menu">
            <ul>
                <li><a href="<?php echo ROOT_PATH; ?>">Trang chủ</a></li>
                <?php if (is_logged() == false) { ?>
                    <li><a href="login.php">Đăng nhập</a></li>
                    <li><a href="register.php">Đăng ký</a></li>
                <?php } else { ?>
                    <li><a>Xin chào <?php echo $_SESSION['email']; ?></a></li>
                    <li><a href="logout.php">Đăng xuất</a></li>
                <?php } ?>
            </ul>
        </div>