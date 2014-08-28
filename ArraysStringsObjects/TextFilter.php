<?php

if($_POST) {
    
    $text = $_POST['text'];
    $bannedWords = explode(',', trim($_POST['words']));
    
    echo $text;
    
    echo '<br/><br/><br/><br/>';
    
    foreach($bannedWords as $word) {
        $text = str_replace(trim($word), str_repeat('*', strlen($word)), $text);
    }
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Text Filter</title>
    </head>
    <body>
        <form method="POST">
            <label for="text">Text:</label>
            <textarea name="text" id="text"></textarea>
            <br/>
            <label for="words">Banlist:</label>
            <input type="text" name="words" id="words" />
            <br/>
            <input type="submit" value="Ban words" />
        </form>
        <p><?= $text ?></p>
    </body>
</html>
