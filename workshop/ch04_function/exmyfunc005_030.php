<?php
    //สร้างตัวแปรอาร์เรย์ 2 มิติ เก็บ รหัสนักเรียน ชื่อ-สกุล คะแนนช่องที่ 1 คะแนนช่องที่ 2 
    $std=[["id"=>"68319010030","name"=>"สุดา คงประเสริฐ","score1"=>20,"score"=>30],
    ["id"=>"68319010030","name"=>"จงสิริ เรืองทองเมือง","score2"=>20,"score"=>30],];
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $stdid=$_POST[' stdid'];
        $stdname=$_POST['stdname'];
        $stdscore1=$_POST['stdscore1']
        $stdscore2=$_POST['stdscore2']
        $std[]=["id"=>$stdid,"name"=>$stdname,"score1"=>$stdscore1,"score2"=>$stdscore2];
        //arr_push($std,"id"=>$stdid,"name"=>$stdname,"score1"=>$stdscore1,"score2"=>$stdscore2);
    }
    //สร้างฟังก์ชั่นแสดงผลข้อมูลใน $std
    function showArr($stddent){
    //echo $student[0]["id"], $stddent[1]["id"];
    foreach($stddent s $row){
           echo $row["id"],"<br>",$row["name"],"<br>",$row["score1"],"<br>",$row["score2"],"<br>";
    }
    echo "***************";
    }
?>