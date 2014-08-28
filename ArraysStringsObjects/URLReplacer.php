<?php
if($_POST['text']) {
    $text = ($_POST['text']);
    $text = str_replace('</a>', '[/URL]', $text);
    $text = preg_replace('/<a href="(.*?)">/', '[URL=\1]', $text);
    $result = htmlentities($text);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>URL Replacer</title>
    </head>
    <body>
        <form method="POST">
            <textarea name="text" placeholder="Text"></textarea>
            <input type="submit" value="Replace" />
        </form>
        <?= $result ?>
    </body>
</html>
