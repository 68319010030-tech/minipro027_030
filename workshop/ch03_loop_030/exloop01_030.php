<?php
if($_SERVER["request_method"]=="post"){
    $name=$_post['name'];
    $num=$_post['num'];
    echo "<table>
    <tr><td>ลำดับที่</td>
    <td>ชื่อ</td></tr>";
    for($i=1;$i<=$num;$i++){
        echo "$i .สวัสดีคุณ$name";
    }
    //แสดงตารางให้กับข้อมูลให้คอลัมน์แรกแสดงลำดับที่คอลัมน์ที่สองชื่อ
}
?>

