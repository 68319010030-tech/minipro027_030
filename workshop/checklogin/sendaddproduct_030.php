<?php
session_start();
if (isset($_POST['add'])) {
    $_SESSION['products'][] = array($_POST['pname'], $_POST['pprice']);
}
if (isset($_POST['pop'])) {
    array_pop($_SESSION['products']);
}
?>
<table border="1">
    <tr><th>ลำดับ</th><th>ชื่อสินค้า</th><th>ราคา</th></tr>
    <?php 
    $i = 1;
    foreach ($_SESSION['products'] as $p) { 
    ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $p[0]; ?></td>
            <td><?php echo $p[1]; ?></td>
        </tr>
    <?php } ?>
</table>
<br>
<form method="post">
    <input type="submit" name="pop" value="ลบรายการล่าสุด (array_pop)">
</form>
<a href="exaddproduct_030.php">เพิ่มสินค้าอีก</a>