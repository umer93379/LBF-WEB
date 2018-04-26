<?php

/*$date = date_create('2018-12-25');
date_add($date, date_interval_create_from_date_string('12 days'));
echo date_format($date, 'Y-m-d');*/

$date = date_create('2011-02-11');
$Today=date('y:m:d');
$NewDate=Date('y:m:d', strtotime("+10 days"));
//echo $NewDate;

$today = date("Y-m-d H:i:s");
$date = "2018-03-01 00:00:00";

if ($today < $NewDate) {


echo "not fine";
}
else {
	echo " fine";

}


$now = time(); // or your date as well
$your_date = strtotime($NewDate);
$datediff = $now - $your_date;
echo $datediff;
//echo round($datediff / (60 * 60 * 24));

$datetime1 = date_create($today);
$datetime2 = date_create($NewDate);
$interval = date_diff($datetime1, $datetime2);
//echo $interval->format('%R%a days');

?>