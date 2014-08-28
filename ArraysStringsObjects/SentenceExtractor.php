<?php

if($_POST) {
    
    $sents = preg_split("/(?<=[.?!])\s*/", trim($_POST['text']), -1, PREG_SPLIT_NO_EMPTY);
    $word = trim($_POST['word']);
    
    $sentences = array();
    
    foreach($sents as $sentance) {
        if(strpos($sentance, ' '.$word) != false) {
            $sentences[] = $sentance;
        }
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Sentence Extractor</title>
    </head>
    <body>
        <form method="POST">
            <textarea name="text" placeholder="Text"></textarea>
            <input type="text" name="word" placeholder="Word" />
            <input type="submit" value="Extract" />
        </form>
        <?= implode('<br/>', $sentences) ?>
    </body>
</html>
