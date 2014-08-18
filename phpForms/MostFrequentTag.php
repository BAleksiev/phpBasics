<html>
    <head>
        <meta charset="UTF-8" />
        <title>Most Frequent Tag</title>
    </head>
    <body>
        <form method="POST">
            <input type="text" name="tags" />
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>


<?php
if ($_POST) {
    $tgs = split(',', trim($_POST['tags']));

    foreach($tgs as $key => $t) {
        $tgs[$key] = trim($t);
    }
    
    $tags = array();

    foreach ($tgs as $tag) {
        if(isset($tags[$tag])) {
            $tags[$tag]++;
        } else {
            $tags[$tag] = 1;
        }
    }

    arsort($tags);
    
    foreach($tags as $tag => $freq) {
        echo "$tag : $freq times<br/>";
    }
    
    reset($tags);
    echo '<br/>';
    echo 'Most Frequent Tag is: '.key($tags);
}
