<?php
include("includes/header.php");
if (is_logged()){
    redirect_to("index.php");
}
?>
<h2>Đăng nhập</h2>
<form method="post">
    <label for="email">Email</label>
    <input name="email" type="email" placeholder="Vui lòng nhập email của bạn" required />

    <label for="password">Mật khẩu</label>
    <input name="password" type="password" placeholder="Vui lòng nhập đúng mật khẩu của bạn" required />

    <br>
    <input type="submit" value="Đăng nhập" />
</form>
<?php
include("includes/footer.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // check null
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        echo "<script>alert('Chưa nhập email');</script>";
        die;
        redirect_to("login.php");
    }
    if (!isset($_POST['password']) || empty($_POST['password'])) {
        echo "<script>alert('Chưa nhập mật khẩu');</script>";
        die;
        redirect_to("login.php");
    }

    $email = $_POST['email'];
    $pw = $_POST['password'];
    $pwhash = md5($pw);
    $sql = "select `email`, `password` from `users` where `email`=?";
    $result = db_select($sql, [$email]);

    // check mail
    if ($result->num_rows > 0){
        $record = $result->fetch_assoc();
        // check mật khẩu
        if ($pwhash == $record['password']){
            $_SESSION["email"] = $record['email'];
            redirect_to("index.php");
        }else{
            echo "<script>alert('Sai mật khẩu');</script>";
        }
    }else{
        echo "<script>alert('Sai email');</script>";
    }
}
?>