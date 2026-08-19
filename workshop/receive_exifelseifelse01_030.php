<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .td-line {
            border : 1px black solid;
            width: 100xp;     }
            table{border-collapse: collapse;}
            tr:nth-child(odd){background-color: pink;}
         </style>
</head>
<body>
    <?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name =@$_POST['name'];
    $num=$_POST['num'];
    echo "<tabie>
    <tr><td class=td=line>ลำดับที่</td>
    <td class=td-line>ชื่อ</td></tr>";
    for($i=1;$i<=num;$i++){
        echo "<tr><td>$i.</td><td>สวัสดีคุณ$name</td></tr>";
    }
    echo "</table>";
    }
    ?>
</body>
</html>
