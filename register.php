<?php
include("includes/header.php");
if (is_logged()){
    redirect_to("index.php");
}
?>
<form method="post" id="fRegister">
    <label for="email">Email</label>
    <input name="email" id="email" placeholder="Nhập email của bạn" required type="email" />

    <label for="phone">Số điện thoại</label>
    <input type="text" maxlength="20" placeholder="Nhập số điện thoại của bạn" required name="phone" id="phone" />

    <label for="dob">Ngày sinh</label>
    <input type="date" name="dob" required id="dob" />

    <label for="password">Mật khẩu</label>
    <input name="password" id="password" placeholder="Nhập mật khẩu trên 5 ký tự" required type="password" />

    <label for="cfpassword">Xác nhận mật khẩu</label>
    <input id="cfpassword" type="password" />

    <br>
    <input type="submit" value="Đăng ký" />
</form>
<?php
include("includes/footer.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $key_err = [
        "email" => "Email",
        "phone" => "Số điện thoại",
        "dob" => "Ngày sinh",
        "password" => "Mật khẩu"
    ];
    // kiểm tra null
    foreach ($key_err as $k => $err) {
        if (!isset($_POST[$k]) || empty($_POST[$k])) {
            echo "<script>alert('$err Không được để trống');</script>";
            die;
            redirect_to("register.php");
        }
    }

    $email = $_POST["email"];
    $pass = $_POST["password"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];

    // Độ dài mật khẩu
    if (strlen($_POST["password"]) < 5) {
        echo "<script>alert('Mật khẩu không được ít hơn 5 ký tự');</script>";
        die;
        redirect_to("register.php");
    }

    // Kiểm tra email không trùng nhau
    $query_select = "select email from users where email=?";
    $result = db_select($query_select, [$email]);
    if ($result->num_rows > 0) {
        echo "<script>alert('Email đã tồn tại, hãy sử dụng địa chỉ mail khác'); </script>";
    } else {
        $hashpwd = md5($_POST["password"]);
        $query = "insert into users(email, password, phone, dob) values(?, ?, ?, ?)";
        $data = [$email, $hashpwd, $phone, $dob];
        db_insert($query, $data, "login.php");
    }
}
?>