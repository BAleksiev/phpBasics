<?php

$person['name'] = 'Gosho';
$person['phone'] = '0882-321-423';
$person['age'] = 24;
$person['address'] = 'Hadji Dimitar';

?>

<html>
    <head>
        <meta charset="UTF-8" />
        <title>HTML Table</title>
        <style>
            form {width: 400px;}
            label {background-color: #ff9c00; padding: 3px 5px; font-weight: bold; width: 150px; margin-bottom: 5px; display: inline-block;}
            input {width: 148px; height: 27px;}
        </style>
    </head>
    <body>
        <form>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= $person['name'] ?>"/>
            
            <label for="phone">Phone number</label>
            <input type="tel" name="phone" id="phone" value="<?= $person['phone'] ?>"/>
            
            <label for="age">Age</label>
            <input type="text" name="age" id="age" value="<?= $person['age'] ?>"/>
            
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="<?= $person['address'] ?>"/>
        </form>
    </body>
</html>
