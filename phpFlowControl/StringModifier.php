<?php

if($_POST) {

    $str = trim($_POST['string']);
    $option = trim($_POST['option']);
    $result = '';

    switch($option) {
        case 'palindrome':
            $result .= $str .' ';
            $p = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $str));
            if($p == strrev($p)) {
                $result .= 'is a palindrome.';
            } else {
                $result .= 'is not a palindrome!';
            }
            break;
        case 'reverse':
            $result = strrev($str);
            break;
        case 'split':
            $splited = str_split($str);
            $result = implode(' ', $splited);
            break;
        case 'hash':
            $result = crypt($str);
            break;
        case 'shuffle':
            $result = str_shuffle($str);
            break;
        default:
            $result = 'Please select option !';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>String Modifier</title>
    </head>
    <body>
        <form method="POST">
            <input type="text" name="string" value="<?= $str ?>"/>

            <input type="radio" name="option" value="palindrome" id="palindrome" />
            <label for="palindrome">Check Palindrome</label>

            <input type="radio" name="option" value="reverse" id="reverse" />
            <label for="reverse">Reverse String</label>

            <input type="radio" name="option" value="split" id="split" />
            <label for="split">Split</label>

            <input type="radio" name="option" value="hash" id="hash" />
            <label for="hash">Hash String</label>

            <input type="radio" name="option" value="shuffle" id="shuffle" />
            <label for="shuffle">Shuffle String</label>

            <input type="submit" value="Submit" />
        </form>
<?php
if(isset($result)) {
    echo $result;
}
?>
    </body>
</html>
