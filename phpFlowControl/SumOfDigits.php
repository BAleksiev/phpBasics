<?php
if($_POST['digits']) {

    $digits = explode(',', trim($_POST['digits']));
    
    $result = '<table border="1">';

    foreach($digits as $d) {

        $d = trim($d);
        $sum = 0;
        
        for($i = 0; $i < strlen($d); $i++) {
            $sum += (int)$d[$i];
        }
        
        $result .= '<tr>'
                . '    <td>'.$d.'</td>';
        
        if(is_numeric($d)) {
            $result .= '    <td>'.$sum.'</td>';
        } else {
            $result .= '    <td>I cannot sum that</td>';
        }
        
        $result .= '</tr>';
    }

    $result .= '</table>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Sum Of Digits</title>
    </head>
    <body>
        <form method="POST">
            <label for="digits">Input string:</label>
            <input type="text" name="digits" id="digits" />
            <input type="submit" value="Submit" />
        </form>
<?php
if(isset($result)) {
    echo $result;
}
?>
    </body>
</html>
