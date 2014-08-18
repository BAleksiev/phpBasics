<html>
    <head>
        <meta charset="UTF-8" />
        <title>Print Tags</title>
    </head>
    <body>
        <form method="POST">
            <input type="text" name="tags" />
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>

<?php
if($_POST) {
    $tags = split(',', trim($_POST['tags']));
    
    foreach($tags as $key => $tag) {
        
        echo "$key : $tag</br>";
    }
}
