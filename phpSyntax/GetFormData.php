<html>
    <head>
        <meta charset="UTF-8" />
        <title>Form Data</title>
    </head>
    <body>
        <form action="GetFormData.php" method="POST">
            <input type="text" name="name" placeholder="Name" /><br/>
            <input type="text" name="age" placeholder="Age" /><br/>
            <input type="radio" name="gender" value="male" id="male"/> <label for="male">Male</label><br/>
            <input type="radio" name="gender" value="female" id="female"/> <label for="female">Female</label><br/>
            <input type="submit" value="Sent" />
        </form>
    </body>
</html>

<?php

if($_POST) {
    
    $name = trim($_POST['name']);
    $age = (int)trim($_POST['age']);
    $gender = trim($_POST['gender']);
    
    echo "My name is $name. I am $age years old. I am $gender";
}