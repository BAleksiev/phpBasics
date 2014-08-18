<html>
    <head>
        <meta charset="UTF-8" />
        <title>HTML Tags Counter</title>
    </head>
    <body>
        <form method="POST">
            <label for="tags">Enter HTML tags:</label><br/>
            <input type="text" name="tags" id="tags" />
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>


<?php
session_start();

if(!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

if ($_POST) {
    
    $validTags = array("a", "abbr", "address", "area", "article", "aside", "audio", "b", "base", "bdi", "bdo", "blockquote", "body", "br", "button", "canvas", "caption",
        "cite", "code", "col", "colgroup", "command", "datalist", "dd", "del", "details", "dfn", "div", "dl", "dt", "em", "embed", "fieldset", "figcaption", "figure",
        "footer", "form", "h1", "h2", "h3", "h4", "h5", "h6", "head", "header", "hgroup", "hr", "html", "i", "iframe", "img", "input", "ins", "kbd", "keygen", "label",
        "legend", "li", "link", "map", "mark", "menu", "meta", "meter", "nav", "noscript", "object", "ol", "optgroup", "option", "output", "p", "param", "pre", "progress",
        "q", "rp", "rt", "ruby", "s", "samp", "script", "section", "select", "small", "source", "span", "strong", "style", "sub", "summary", "sup", "table", "tbody", "td",
        "textarea", "tfoot", "th", "thead", "time", "title", "tr", "track", "u", "ul", "var", "video", "wbr");
    
    $tgs = split(',', trim($_POST['tags']));
    
    foreach($tgs as $t) {
        $tag = trim($t);
        
        $valid = false;
        
        foreach($validTags as $vt) {
            if($tag == $vt) {
                $valid = true;
                break;
            }
        }
        
        if($valid === true) {
            echo 'Valid HTML Tag!';
            $_SESSION['score']++;
        } else {
            echo 'Invalid HTML Tag!';
            $_SESSION['score']--;
        }
        echo '<br/>';
    }
}

echo '<br/>';
echo 'Score: '.$_SESSION['score'];