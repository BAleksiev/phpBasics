<?php

$year = date('Y', time());
$month = date('m', time());

$sundays = array();

$firstSunday = strtotime("first Sunday 01-$month-$year");
$lastSunday = strtotime("last Sunday 01-".($month+1)."-$year");

while($firstSunday <= $lastSunday) {
    $sundays[] = $firstSunday;
    $firstSunday = strtotime("next Sunday", $firstSunday);
}

foreach($sundays as $s) {
    echo date('jS F, Y', $s).'<br/>';
}