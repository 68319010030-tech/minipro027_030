<?php
//ตัวอย่างการใช้เงื่อนใช 1 เงื่อนใข
$age=30;
if($age>=30){
    echo "คุณเป็นน้า";
}
//ตัวอย่างการใช้เงื่อนใข 1 เงื่นใข
$gender="ชาย";
if($age>=35 && $gender==="หญิง"){
    echo "<br>คุณเป็นป้า";
}
//ตัวอย่างการใช้เงื่อนใข 2 เงื่อนใข
if($age<=30 && $age=20){
    echo "<br>คุณเป็นพี่";
}
elseif($age<20 && $age>=15){
    echo "<br>คุณเป็นน้อง";
}
elseif($age>1 && $age<15){
    echo "<br>คุณเป็นเด็ก";
}
else{
    echo "<br>คุณเป็นผู้สูงอายุ";
}
//ตัวอย่างการใช้ switch..case
$status=true;
switch($status){
    case(true):
    echo"<br>คุณกู้กยศ.";
    break;
    case(false):
        echo"<br>คุณไม่ได้ก้กยศ.";
        break;
        default:
        echo"<br>คุณระบุข้อมูลไม่ถูกต้อง";
}
?>