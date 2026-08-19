<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  session_start(); ?>
    <form action="" method="post">
    <?php
     session_start();
     foreach($_SESSION['product'] as $value){
        echo "คุณเลือกรายการ   $value<br>";
     }
     //session_destroy();
?>
<button type="submit" name="clear" value="del">ลบข้อมูล</button>
      <?php
       if($_SERVER['REQUEST_METHOD']=="POST"){
        if($_POST['clear']=="del"){
            session_destroy();
            foreach($_SESSION['product'] as $value){
            echo "คุณเลือกรายการ   $value<br>";
            header("Location:exsession01_030.php");
            exit();
        }
           }
       }
       ?>
</from>
</body>
</html>