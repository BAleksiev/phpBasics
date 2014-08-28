<?php

if($_POST['text']) {
    
    $text = trim($_POST['text']);
    
    $splited = str_split($text);
    $result = '';
    
    foreach($splited as $char) {
        if($char != ' ') {
            $num = ord($char);
            
            if($num % 2 == 1) {
                $result .= '<span style="color: blue;">'.$char.'</span> ';
            } else {
                $result .= '<span style="color: red;">'.$char.'</span> ';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Coloring Texts</title>
    </head>
    <body>
        <form method="POST">
            <textarea name="text"></textarea>
            <input type="submit" value="Color text" />
        </form>
        <?= $result ?>
    </body>
</html>
