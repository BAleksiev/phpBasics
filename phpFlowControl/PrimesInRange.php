<?php

if($_GET) {
    
    $start = (int)trim($_GET['start']);
    $end = (int)trim($_GET['end']);
    
    $numbers = array();
    
    if($start < $end) {
        
        for($i = $start; $i <= $end; $i++) {
            if(isPrime($i)) {
                $numbers[] = '<b>'.$i.'</b>';
            } else {
                $numbers[] = $i;
            }
        }
    }
}

function isPrime($num) {
    if($num == 1) {
        return false;
    }

    if($num == 2) {
        return true;
    }

    if($num % 2 == 0) {
        return false;
    }

    for($i = 3; $i <= ceil(sqrt($num)); $i = $i + 2) {
        if($num % $i == 0) {
            return false;
        }
    }

    return true;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Find Primes In Range</title>
    </head>
    <body>
        <form method="GET">
            <label for="star">Starting Index:</label>
            <input type="text" name="start" id="start" />
            
            <label for="end">End:</label>
            <input type="text" name="end" id="end" />
            
            <input type="submit" value="Submit" />
        </form>
        <?php
        if(isset($numbers)) {
            echo implode(', ', $numbers);
        }
        ?>
    </body>
</html>
