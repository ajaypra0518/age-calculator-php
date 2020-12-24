<?php
date_default_timezone_set("Asia/Calcutta");
$bdate= $_POST['bdate'];
$time= $_POST['time'];


if($bdate>Date('Y-n-j')){
    echo "**Invalid DOB";

}
else if(($bdate!=""))
{
$bdate="$bdate $time";
$cdate=Date('Y-n-j H:i:s'); 
$date1=date_create($bdate);
$date2=date_create($cdate);
$diff=date_diff($date1,$date2);
echo $diff->format("%y Year %m Month %d Day <br>%h Hours %i Minute %s Seconds");
}

else{
    echo "**Feild Is Blank";
}
?>