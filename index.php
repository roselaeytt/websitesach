<?php
require_once "config.php";
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
include("includes/header.php");
?>

<table border="0" style="width: 100%; margin-top:15px;">
    
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
    
            <tr>
                <td style="width: 20%;">
                    <img src="<?php echo ROOT_PATH . "/" . $row['photo']; ?>" width="150" height="200" style="object-fit: contain;" />
                </td>
                <td>
                    <h2><?php echo $row['title']; ?></h2>
                    <p>Tác giả: <?php echo $row['author']; ?></p>
                    <p>Giá bán: <?php echo number_format($row['price']); ?></p>
                    <p>Nhà xuất bản: <?php echo $row['publisher']; ?></p>
                    <?php if (is_logged()) { ?>
                        <p><a href="<?php echo ROOT_PATH; ?>/detail.php?id=<?php echo $row['id']; ?>">Chi tiết</a></p>
                    <?php } else { ?>
                        <p><i>Đăng nhập để xem thông tin chi tiết</i></p>
                    <?php } ?>
                </td>
            </tr>
    <?php
        }
    }
    ?>
</table>


<?php
include("includes/footer.php");
?>
<?php
}
else {
echo "0 results";
}
mysqli_close($conn);
?>