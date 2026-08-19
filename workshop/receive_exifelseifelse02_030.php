<?php
if(! empty($_post['date'])){
    $year =@$_post['date'];
    $old=2565-$old;
    acho "อายุของคุณ คือ ",$old,"<br>";
    if (($year<=2489) && (&year<=2507)) {
        echo "คุณอยู่ใน gen B" ; }
        elseif(($year<=2508) && ($year=<2522)) {
            echo " คุณอยู่ใน gen x"}
            elseif(($year<=2523) && ($year=<2540)) {
            echo " คุณอยู่ใน gen y"}
         else{
            echo "คุณอยู่ใน gen Z";}
}
?>