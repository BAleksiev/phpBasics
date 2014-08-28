<?php

if($_POST) {
    
    $cats = explode(',', trim($_POST['categories']));
    $tgs = explode(',', trim($_POST['tags']));
    $mnts = explode(',', trim($_POST['months']));
    
    $categories = '<div class="panel">'
                . '    <h2>Categories</h2>'
                . '    <ul>';
    
    foreach($cats as $c) {
        $categories .= '<li>'.trim($c).'</li>';
    }
    
    $categories .= '   </ul>'
                . '</div>';
    
    $tags = '<div class="panel">'
                . '    <h2>Tags</h2>'
                . '    <ul>';
    
    foreach($tgs as $t) {
        $tags .= '<li>'.trim($t).'</li>';
    }
    
    $tags .= '   </ul>'
                . '</div>';
    
    $months = '<div class="panel">'
                . '    <h2>Months</h2>'
                . '    <ul>';
    
    foreach($mnts as $m) {
        $months .= '<li>'.trim($m).'</li>';
    }
    
    $months .= '   </ul>'
                . '</div>';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Sidebar builder</title>
        <style type="text/css">
            .panel {width: 200px; background-color: #a9cff6; padding: 20px 10px; border-radius: 15px; margin-top: 20px;}
            .panel h2 {width: 100%; font-weight: bold; font-size: 20px; border-bottom: 1px solid #000; margin: 0 0 10px 0;}
            .panel ul {list-style-type: circle; margin: 0;}
        </style>
    </head>
    <body>
        <form method="POST">
            <label for="categories">Categories:</label>
            <input type="text" name="categories" id="categories" />
            <br/>
            <label for="tags">Tags:</label>
            <input type="text" name="tags" id="tags" />
            <br/>
            <label for="categories">Months:</label>
            <input type="text" name="months" id="months" />
            <br/>
            <input type="submit" value="Gnerate" />
        </form>
        <?= $categories ?>
        <?= $tags ?>
        <?= $months ?>
    </body>
</html>
