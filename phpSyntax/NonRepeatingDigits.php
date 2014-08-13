<?php

$n = 1234;
$result = '';

if($n > 100) {
    for($i = 100; $i <= $n; $i++) {
        $str = (string)$i;
        
        if($str[0] != $str[1] && $str[1] != $str[2] && $str[0] != $str[2]) {
            $result .= $str.', ';
        }
    }
}

if($result != '') {
    $result = substr($result, 0, -2);
    echo $result;
} else {
    echo 'no';
}