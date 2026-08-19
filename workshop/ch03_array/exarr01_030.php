<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {border: 1px solid black;}
        table{border-collapse: collapse;}
        tr:nth-child(odd){background-color: violet;}
        tr:nth-child(even){background-color: violet; }
        </style>
</head>
<body>
    <?php
 //ตัวแปรอาร์เรย์ 1 มิติ ตัวชืี้เป็น index
 $std=["สุนิสา","ตะวัน","ภัทรดน"];
 $salary=[2000,3000,10000];
 echo print_r($std),"<br>";
 $salary[0]=$salary[0]+5000;
 echo $salary[0];
 //ตัวแปลอาร์เรย์แบบ 1 มิติ ตัวชี้เป็น index แบบใช้ฟังก์ชั้นอาร์เรย์
 $product=array("แพนทีน","ซัลซิล","โดฟ");
 echo "ชื่อสินค้า$product[0],$product[1],$product[2]";
 //ใช้ลูปอ่านค่าอาร์เรย์
 foreach($std as $item){
    echo $item,"<br>";
 }
 //$count=count($salary);
 for($i=0;$i<count($salary);$i++){ 
    $salary[$i]+=500;
}
 echo "เพิ่มเงินเดือนพนักงานคนละ 500 บาท<br>";
 foreach($salary as $item){
   // $salary[]=+500;
    echo $item,"<br>";
 }
echo "แสดงเงินเดือนพนักงานคนละ 500 บาท<br>";
 foreach($salary as $item){
    echo $item,"<br>";
 }
 //ตัวแปลอาร์เรย์แบบ 1 มิติ ตัวชี้เป็น key แบบใช้ฟังก์ชั้นอาร์เรย์
 $book=["a01"=>"phpที่รัก","a02"=>"คณิตศาสตร์รักมาก","a03"=>"กลัวหมอจอมซน"];
 echo print_r($book),"<br>";
 echo $book["a01"],"<br>";
 foreach($book as $item){
 echo $item,"<br>";
}
 $p_com=[[
    "name"=>"ram",
    "price"=>20000,
    "amount"=>2],
    ["name"=>"keyboard",
    "price"=>300,
    "amount"=>20]];
    echo "ข้อมูลแถวที่1",$p_com[0]["name"],"<br>";
    echo "ข้อมูลแถวที่2",$p_com[1]["name"],"<br>";
    echo "<table><tr><td>ชื่อสินค้า</-td>
    <td>ราคา</td>
    <td>จำนวน</td><tr>";
    foreach($p_com as $key=>$item){
        echo "<tr><td>",$item["name"],"</td>";
        echo "<td>",$item["price"],"</td>";
        echo "<td>",$item["amount"],"</td></tr>";
    }
    echo "</table>";
 ?>
</body>
</html>
