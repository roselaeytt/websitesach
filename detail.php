<?php
include("includes/header.php");

if (is_logged() == false || isset($_GET['id']) == false) {
    redirect_to("index.php");
}
$id = $_GET['id'];

$sql = "select * from `books` where `id`=?";
$result = db_select($sql, [$id]);
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
?>
    <img src="<?php echo ROOT_PATH . "/" . $data['photo']; ?>" width="500" height="400" style="object-fit: contain; display: block; margin: auto" />
    <h2><?php echo $data['title']; ?></h2>
    <p>Tác giả: <?php echo $data['author']; ?></p>
    <p>Giá bán: <?php echo number_format($data['price']); ?></p>
    <p>Nhà xuất bản: <?php echo $data['publisher']; ?></p>
    <br />
    <p><b>Giới thiệu</b></p>
    <p><?php echo nl2br($data['description']); ?></p>
<?php } else { ?>
    <h2>Liên kết không tồn tại</h2>
<?php } ?>

<?php
include("includes/footer.php");
?>


