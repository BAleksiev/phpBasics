<?php
session_start();
if(isset($_SESSION['cv'])) {
    $cvEdit = $_SESSION['cv'];
    unset($_SESSION['cv']);
}

if(isset($_SESSION['error'])) {
    $err = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>CV Generator</title>
    </head>
    <body>
        <form method="POST">
            <fieldset>
                <legend>Personal Information</legend>

                <input type="text" name="first_name" placeholder="First Name" value="<?= $cvEdit['first_name'] ?>" /> <?= $err['first_name'] ?> <br/>
                <input type="text" name="last_name" placeholder="Last Name" value="<?= $cvEdit['last_name'] ?>" /> <?php if(isset($err['last_name'])) echo $err['last_name'] ?> <br/>
                <input type="email" name="email" placeholder="Email" /><br/>
                <input type="tel" name="phone" placeholder="Phone Number" /><br/>

                <label for="female">Female</label>
                <input type="radio" name="gender" value="female" id="female"/>
                <label for="male">Male</label>
                <input type="radio" name="gender" value="male" id="male"/><br/>

                <label for="birth_date">Birth Date</label>
                <input type="text" name="birth_date" placeholder="dd/mm/yyyy" id="birth_date" /><br/>

                <label for="nationality">Nationality</label>
                <select name="nationality" id="nationality">
                    <option value="Bulgarian">Bulgarian</option>
                    <option value="Russian">Russian</option>
                    <option value="American">American</option>
                </select>
            </fieldset>

            <fieldset>
                <legend>Last Work Position</legend>

                <label for="company">Company Name</label>
                <input type="text" name="company" id="company" /><br/>

                <label for="from">From</label>
                <input type="text" name="from" id="from" placeholder="dd/mm/yyyy" /><br/>

                <label for="to">To</label>
                <input type="text" name="to" id="to" placeholder="dd/mm/yyyy" /><br/>
            </fieldset>

            <fieldset>
                <legend>Computer Skills</legend>

                <label>Programming Languages</label><br/>
                <input type="text" name="comp_skills[]" />
                <select name="level[]">
                    <option value="Beginner">Beginner</option>
                    <option value="Programmer">Programmer</option>
                    <option value="Ninja">Ninja</option>
                </select>
                <br/>
                <button class="remove_skill" type="button">Remove Language</button>
                <button class="add_skill" type="button">Add Language</button>
            </fieldset>

            <fieldset>
                <legend>Other Skills</legend>

                <label>Languages</label><br/>
                <input type="text" name="languages[]" />
                <select name="comprehension[]">
                    <option>-Comperhension-</option>
                    <option value="beginner">Beginenr</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
                <select name="reading[]">
                    <option>-Reading-</option>
                    <option value="beginner">Beginenr</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
                <select name="writing[]">
                    <option>-Writing-</option>
                    <option value="beginner">Beginenr</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
                <br/>
                <button class="remove_lang" type="button">Remove Language</button>
                <button class="add_lang" type="button">Add Language</button>
                <br/>
                <label>Drivers License</label><br/>
                <label for="b">B</label>
                <input type="checkbox" name="driver_license[b]" value="1" id="b" />
                <label for="a">A</label>
                <input type="checkbox" name="driver_license[a]" value="1" id="a" />
                <label for="c">C</label>
                <input type="checkbox" name="driver_license[c]" value="1" id="c" />
            </fieldset>
            <input type="submit" value="Generate CV" />
        </form>
    </body>
</html>

<?php

if ($_POST) {

    $cv['first_name'] = trim($_POST['first_name']);
    $cv['last_name'] = trim($_POST['last_name']);
    $cv['email'] = trim($_POST['email']);
    $cv['phone'] = trim($_POST['phone']);
    $cv['gender'] = trim($_POST['gender']);
    $cv['birth_date'] = trim($_POST['birth_date']);
    $cv['nationality'] = trim($_POST['nationality']);
    $cv['company'] = trim($_POST['company']);
    $cv['company_from'] = trim($_POST['from']);
    $cv['company_to'] = trim($_POST['to']);
    $cv['comp_skills'] = array();
    $cv['languages'] = array();
    $cv['driver_license'] = $_POST['driver_license'];

    foreach ($_POST['comp_skills'] as $key => $cs) {
        $n = sizeof($cv['comp_skills']);
        $cv['comp_skills'][$n]['lang'] = $cs;
        $cv['comp_skills'][$n]['level'] = $_POST['level'][$key];
    }

    foreach ($_POST['languages'] as $key => $lang) {
        $n = sizeof($cv['languages']);
        $cv['languages'][$n]['lang'] = $lang;
        $cv['languages'][$n]['comprehension'] = $_POST['comprehension'][$key];
        $cv['languages'][$n]['reading'] = $_POST['reading'][$key];
        $cv['languages'][$n]['writing'] = $_POST['writing'][$key];
    }

    if (preg_match('/[^a-zA-Z]/', $cv['first_name']) == 1 && strlen($cv['first_name']) > 2 && strlen($cv['first_name']) < 20) {
        $error['first_name'] = 'Please enter valid First Name';
    }

    if (preg_match('/[^a-zA-Z]/', $cv['last_name']) == 1 && strlen($cv['last_name']) > 2 && strlen($cv['last_name']) < 20) {
        $error['last_name'] = 'Please enter valid Last Name';
    }

    if (preg_match('/[^a-zA-Z0-9]/', $cv['company']) == 1 && strlen($cv['company']) > 2 && strlen($cv['company']) < 20) {
        $error['company'] = 'Please enter valid Company Name';
    }

    if (preg_match('/^(\+{0,}[\d- ]+)$/', $cv['phone']) == 0) {
        $error['phone'] = 'Please enter valid Phone Number';
    }

    if (!filter_var($cv['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'Please enter valid Email Address';
    }
    
    foreach ($cv['languages'] as $key => $l) {
        if (preg_match('/[^a-zA-Z0-9]/', $l['lang']) == 1 && strlen($l['lang']) > 2 && strlen($l['lang']) < 20) {
            $error['languages'][$key] = 'Please enter valid Language';
        }
    }
    
    if(isset($error)) {
        echo '<pre>'.print_r($error, true).'</pre>';
        $_SESSION['cv'] = $cv;
        $_SESSION['error'] = $error;
    }
}