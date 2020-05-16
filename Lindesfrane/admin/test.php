
<div class="wrapper">
    <div class="container">

<?php
require_once("../includes.php");
require_once("../setup/dbCon.php");
$t=date('d-m-Y');
echo date("D",strtotime($t));
$total_days =cal_days_in_month(CAL_GREGORIAN, date('m', strtotime('-1 month')), date("Y"));
$count = 1;
$arrDays = Array("Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
echo("<div class='row'>");
for($j=0; $j<7; $j++){
    echo("<div class='col-sm-2'>".$count."</div>");
}
$dayCounter = 0;
echo("</div>");
for($i=0; $i<5; $i++){
    echo("<div class='row'>");
    for($j=0; $j<7; $j++){
        if(++$dayCounter<$count){
            continue;
        }else{
            echo("<div class='col-sm-2'>".$count."</div>");
            if($count++==31){
                break;
                break;
            }

        }

    }
    echo("</div>");
}
?>
    </div>
</div>
