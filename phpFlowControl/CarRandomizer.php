<?php

if($_POST) {
    
    $colors = array('red', 'green', 'blue', 'yellow', 'black', 'white', 'brown', 'orange');
    
    $input = explode(',', trim($_POST['cars']));
    
    $cars = '<table border="1">'
            . '    <thead>'
            . '        <tr>'
            . '            <td>Car</td>'
            . '            <td>Color</td>'
            . '            <td>Count</td>'
            . '        </tr>'
            . '    </thead>'
            . '    <tbody>';
    
    foreach($input as $c) {
        
        $rndColor = rand(0, sizeof($colors) - 1);
        $color = $colors[$rndColor];
        
        $count = rand(1, 5);
        
        $cars .= '<tr>'
                . '    <td>'.$c.'</td>'
                . '    <td>'.$color.'</td>'
                . '    <td>'.$count.'</td>'
                . '</tr>';
    }
    
    $cars .= '    </tbody>'
            . '</table>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Car Randomizer</title>
    </head>
    <body>
        <form method="POST">
            <label for="cars">Enter cars</label>
            <input type="text" name="cars" id="cars" />
            <input type="submit" value="Show cars" />
        </form>
        <?php
        if(isset($cars)) {
            echo $cars;
        } 
        ?>
    </body>
</html>