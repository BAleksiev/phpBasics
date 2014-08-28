<?php

if($_POST) {
    
    $splited = preg_split('/\W+/', strtolower(trim($_POST['str'])), -1, PREG_SPLIT_NO_EMPTY);
    $words = array();
    
    foreach($splited as $w) {
        if(isset($words[$w])) {
            $words[$w]++;
        } else {
            $words[$w] = 1;
        }
    }
    
    $result = '<table border="1">';
    
    foreach($words as $word => $count) {
        $result .= '    <tr>'
                . '        <td>'.$word.'</td>'
                . '        <td>'.$count.'</td>'
                . '    </tr>';
    }
    
    $result .= '</table>';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Word Mapper</title>
    </head>
    <body>
        <form method="POST">
            <textarea name="str"></textarea>
            <input type="submit" value="Count words" />
        </form>
        <?= $result ?>
    </body>
</html>
