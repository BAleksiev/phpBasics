<?php

$now = getdate(strtotime('12-08-2014 11:08:47'));

$days = 365 - $now['yday'] - 1;
$hours = ($days * 24) + (24 - $now['hours'] - 1);
$minutes = (($hours + 1) * 60) - $now['minutes'] - 1;
$seconds = (($minutes + 1) * 60) - $now['seconds'] - 1;

$time = implode(':', array($days, 24 - $now['hours'] - 1, 60 - $now['minutes'] - 1, 60 - $now['seconds'] - 1));

echo 'Hours until new year : '.$hours.'<br/>
      Minutes until new year : '.number_format($minutes, 0, '.', ' ').'<br/>
      Seconds until new year : '.number_format($seconds, 0, '.', ' ').'<br/>
      Days:Hours:Minutes:Seconds '.$time;