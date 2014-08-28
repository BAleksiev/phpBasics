<?php

if($_GET['years']) {
    
    $years = (int)trim($_GET['years']);
    
    if($years > 0) {
        
        $currentYear = date('Y', time());
        
        $result = '<table border="1">'
                . '    <thead>'
                . '        <tr>'
                . '            <td>Year</td>'
                . '            <td>January</td>'
                . '            <td>February</td>'
                . '            <td>March</td>'
                . '            <td>April</td>'
                . '            <td>May</td>'
                . '            <td>June</td>'
                . '            <td>July</td>'
                . '            <td>August</td>'
                . '            <td>September</td>'
                . '            <td>October</td>'
                . '            <td>November</td>'
                . '            <td>December</td>'
                . '            <td>Total:</td>'
                . '        </tr>'
                . '    </thead>'
                . '    <tbody>';
        
        for($y = $currentYear; $y > $currentYear - $years; $y--) {
            
            $totalCosts = 0;
            
            $currentMonth = date('m', time()) - 1;
            
            $result .= '<tr>'
                    . '    <td>'.$y.'</td>';
            
            for($m = 1; $m <= 12; $m++) {
                $costs = rand(0, 999);
                
                if($y == $currentYear && $m > $currentMonth) {
                    $result .= '<td></td>';
                } else {
                    $result .= '<td>'.$costs.'</td>';
                    $totalCosts += $costs;
                }
            }
            
            $result .= '   <td>'.$totalCosts.'</td>'
                    . '</tr>';
        }
        
        $result .= '    </tbody>'
                . '</table>';
        
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Annual Expenses</title>
    </head>
    <body>
        <form method="GET">
            <label for="years">Enter number of years: </label>
            <input type="text" name="years" id="years" />
            <input type="submit" value="Show costs" />
        </form>
        <?php
        if(isset($result)) {
            echo $result;
        }
        ?>
    </body>
</html>
