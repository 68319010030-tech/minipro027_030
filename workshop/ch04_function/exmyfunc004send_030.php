<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $stdname=$_POST['stdname'];
      $stdscore=$_POST['stdscore'];
      $ans=chkScore($stdname,$stdscore);
     //print_r($ans);
      foreach($ans as $keyrow){
        echo $keyrow["name"],"    ",$keyrow["score"],"    ",$keyrow["grade"],"<br>";
      }
}
//สร้างฟังก์ชั่นตรวจสอบคะแนนของนักเรียนแต่ละคน หาดมีคะแนนตั้งแต่ 50 คะแนนขึ้นไปไห้แสดงสอบผ่าน แต่ถ้าไม่ไช่แสดงว่าสอบไม่ผ่าน
function chkScore($name,$score){
    $arr=[];
    for($i=0;$i<count($name);$i++){
        if($score[$i]<50){
            $grade="ไม่ผ่าน";
        }
        else{
            $grade="ผ่าน";
        }
        $arr[]=["name"=>$name[$i],"score"=>$score[$i],"grade"=>$grade];    
    }
       return $arr;
}
?>