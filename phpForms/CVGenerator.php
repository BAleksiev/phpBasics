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
    $cv['driver_license'] = array();
    if(!empty($_POST['driver_license'])) {
        $cv['driver_license'] = $_POST['driver_license'];
    }

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

    if (preg_match('/[^a-zA-Z]/', $cv['first_name']) == 1 || strlen($cv['first_name']) < 2 || strlen($cv['first_name']) > 20) {
        $error['first_name'] = 'Please enter valid First Name';
    }

    if (preg_match('/[^a-zA-Z]/', $cv['last_name']) == 1 || strlen($cv['last_name']) < 2 || strlen($cv['last_name']) > 20) {
        $error['last_name'] = 'Please enter valid Last Name';
    }

    if (preg_match('/[^a-zA-Z0-9]/', $cv['company']) == 1 || strlen($cv['company']) < 2 || strlen($cv['company']) > 20) {
        $error['company'] = 'Please enter valid Company Name';
    }

    if (preg_match('/^(\+{0,}[\d- ]+)$/', $cv['phone']) == 0) {
        $error['phone'] = 'Please enter valid Phone Number';
    }

    if (!filter_var($cv['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'Please enter valid Email Address';
    }
    
    if(empty($cv['gender'])) {
        $error['gender'] = 'Please select gender';
    }
    
    foreach ($cv['languages'] as $key => $l) {
        if (preg_match('/[^a-zA-Z0-9]/', $l['lang']) == 1 || strlen($l['lang']) < 2 || strlen($l['lang']) > 20) {
            $error['languages'][$key] = 'Please enter valid Language';
        }
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8" />
        <title>CV Generator</title>
        <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="js/CV-gen-script.js" type="text/javascript"></script>
    </head>
    <body>
        <form method="POST">
            <fieldset>
                <legend>Personal Information</legend>

                <input type="text" name="first_name" placeholder="First Name" value="<?php if(isset($cv['first_name'])) echo $cv['first_name']; ?>" /> <?php if(isset($error['first_name'])) echo $error['first_name']; ?> <br/>
                <input type="text" name="last_name" placeholder="Last Name" value="<?php if(isset($cv['last_name'])) echo $cv['last_name']; ?>" /> <?php if(isset($error['last_name'])) echo $error['last_name']; ?> <br/>
                <input type="email" name="email" placeholder="Email" value="<?php if(isset($cv['email'])) echo $cv['email']; ?>" /><?php if(isset($error['email'])) echo $error['email']; ?><br/>
                <input type="tel" name="phone" placeholder="Phone Number" value="<?php if(isset($cv['phone'])) echo $cv['phone']; ?>" /><?php if(isset($error['phone'])) echo $error['phone']; ?><br/>

                <label for="female">Female</label>
                <input type="radio" name="gender" value="female" id="female" <?php if(isset($cv)) if($cv['gender'] == 'female') echo 'checked'; ?>/>
                <label for="male">Male</label>
                <input type="radio" name="gender" value="male" id="male" <?php if(isset($cv)) if($cv['gender'] == 'male') echo 'checked'; ?>/>
                <?php if(isset($error['gender'])) echo $error['gender']; ?>
                <br/>
                
                <label for="birth_date">Birth Date</label>
                <input type="text" name="birth_date" placeholder="dd/mm/yyyy" id="birth_date" value="<?php if(isset($cv['birth_date'])) echo $cv['birth_date']; ?>" /><br/>

                <label for="nationality">Nationality</label>
                <select name="nationality" id="nationality">
                    <option value="Bulgarian" <?php if(isset($cv['nationality']) && $cv['nationality'] == 'Bulgarian') echo 'selected'; ?>>Bulgarian</option>
                    <option value="Russian" <?php if(isset($cv['nationality']) && $cv['nationality'] == 'Russian') echo 'selected'; ?>>Russian</option>
                    <option value="American" <?php if(isset($cv['nationality']) && $cv['nationality'] == 'American') echo 'selected'; ?>>American</option>
                </select>
            </fieldset>

            <fieldset>
                <legend>Last Work Position</legend>

                <label for="company">Company Name</label>
                <input type="text" name="company" id="company" value="<?php if(isset($cv['company'])) echo $cv['company']; ?>"/>
                <?php if(isset($error['company'])) echo $error['company']; ?>
                <br/>

                <label for="from">From</label>
                <input type="text" name="from" id="from" placeholder="dd/mm/yyyy" value="<?php if(isset($cv['company_from'])) echo $cv['company_from']; ?>" /><br/>

                <label for="to">To</label>
                <input type="text" name="to" id="to" placeholder="dd/mm/yyyy" value="<?php if(isset($cv['company_to'])) echo $cv['company_to']; ?>" /><br/>
            </fieldset>

            <fieldset>
                <legend>Computer Skills</legend>

                <label>Programming Languages</label><br/>
                <div class="comp_skills">
                    <?php
                    if(isset($cv['comp_skills'])) {
                        foreach($cv['comp_skills'] as $key => $skill) {
                    ?>
                    <div <?php if($key == 0) echo 'class="first"'; ?>>
                        <input type="text" name="comp_skills[]" value="<?php echo $skill['lang']; ?>" />
                        <select name="level[]">
                            <option value="Beginner" <?php if($skill['level'] == 'Beginner') echo 'selected'; ?>>Beginner</option>
                            <option value="Programmer" <?php if($skill['level'] == 'Programmer') echo 'selected'; ?>>Programmer</option>
                            <option value="Ninja" <?php if($skill['level'] == 'Ninja') echo 'selected'; ?>>Ninja</option>
                        </select>
                        <br/>
                    </div>
                    <?php
                        }
                    } else {
                    ?>
                    <div class="first">
                        <input type="text" name="comp_skills[]" />
                        <select name="level[]">
                            <option value="Beginner">Beginner</option>
                            <option value="Programmer">Programmer</option>
                            <option value="Ninja">Ninja</option>
                        </select>
                        <br/>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <button class="remove_skill" type="button">Remove Language</button>
                <button class="add_skill" type="button">Add Language</button>
            </fieldset>

            <fieldset>
                <legend>Other Skills</legend>

                <label>Languages</label><br/>
                <div class="languages">
                    <?php
                    if(isset($cv['languages'])) {
                        foreach($cv['languages'] as $key => $lang) {
                    ?>
                    <div <?php if($key == 0) echo 'class="first"'; ?>>
                        <input type="text" name="languages[]" value="<?php echo $lang['lang']; ?>"/>
                        <select name="comprehension[]">
                            <option>-Comperhension-</option>
                            <option value="beginner" <?php if($lang['comprehension'] == 'beginner') echo 'selected'; ?>>Beginner</option>
                            <option value="intermediate" <?php if($lang['comprehension'] == 'intermediate') echo 'selected'; ?>>Intermediate</option>
                            <option value="advanced" <?php if($lang['comprehension'] == 'advanced') echo 'selected'; ?>>Advanced</option>
                        </select>
                        <select name="reading[]">
                            <option>-Reading-</option>
                            <option value="beginner" <?php if($lang['reading'] == 'beginner') echo 'selected'; ?>>Beginner</option>
                            <option value="intermediate" <?php if($lang['reading'] == 'intermediate') echo 'selected'; ?>>Intermediate</option>
                            <option value="advanced" <?php if($lang['reading'] == 'advanced') echo 'selected'; ?>>Advanced</option>
                        </select>
                        <select name="writing[]">
                            <option>-Writing-</option>
                            <option value="beginner" <?php if($lang['writing'] == 'beginner') echo 'selected'; ?>>Beginner</option>
                            <option value="intermediate" <?php if($lang['writing'] == 'intermediate') echo 'selected'; ?>>Intermediate</option>
                            <option value="advanced" <?php if($lang['writing'] == 'advanced') echo 'selected'; ?>>Advanced</option>
                        </select>
                        <?php if(isset($error['languages'][$key])) echo $error['languages'][$key]; ?>
                        <br/>
                    </div>
                    <?php
                        }
                    } else {
                    ?>
                    <div class="first">
                        <input type="text" name="languages[]" />
                        <select name="comprehension[]">
                            <option>-Comprehension-</option>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        </select>
                        <select name="reading[]">
                            <option>-Reading-</option>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        </select>
                        <select name="writing[]">
                            <option>-Writing-</option>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        </select>
                        <br/>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <button class="remove_lang" type="button">Remove Language</button>
                <button class="add_lang" type="button">Add Language</button>
                <br/>
                <label>Drivers License</label><br/>
                <label for="b">B</label>
                <input type="checkbox" name="driver_license[b]" value="1" id="b" <?php if(isset($cv['driver_license']['b'])) echo 'checked'; ?> />
                <label for="a">A</label>
                <input type="checkbox" name="driver_license[a]" value="1" id="a" <?php if(isset($cv['driver_license']['a'])) echo 'checked'; ?> />
                <label for="c">C</label>
                <input type="checkbox" name="driver_license[c]" value="1" id="c" <?php if(isset($cv['driver_license']['c'])) echo 'checked'; ?> />
            </fieldset>
            <input type="submit" value="Generate CV" />
        </form>
<?php

if(!isset($error) && isset($cv)) {
    
    $result = '<h1>CV</h1>'
            . '<table border="1">'
            . '    <thead>'
            . '        <tr>'
            . '            <td colspan="2" align="center">Personal Information</td>'
            . '        </tr>'
            . '    </thead>'
            . '    <tbody>'
            . '        <tr>'
            . '            <td>First Name</td>'
            . '            <td>'.$cv['first_name'].'</td>'
            . '        </tr>'
            . '        <tr>'
            . '            <td>Last Name</td>'
            . '            <td>'.$cv['last_name'].'</td>'
            . '        </tr>'
            . '        <tr>'
            . '            <td>Email</td>'
            . '            <td>'.$cv['email'].'</td>'
            . '        </tr>'
            . '        <tr>'
            . '            <td>Phone Number</td>'
            . '            <td>'.$cv['phone'].'</td>'
            . '        </tr>'
            . '        <tr>'
            . '            <td>Gender</td>'
            . '            <td>'.$cv['gender'].'</td>'
            . '        </tr>'
            . '        <tr>'
            . '            <td>Birth Date</td>'
            . '            <td>'.$cv['birth_date'].'</td>'
            . '        </tr>'
            . '        <tr>'
            . '            <td>Nationality</td>'
            . '            <td>'.$cv['nationality'].'</td>'
            . '        </tr>'
            . '    </tbody>'
            . '</table>'
            . '<br/><br/>'
            . '<table border="1">'
            . '    <thead>'
            . '        <tr>'
            . '            <td colspan="2" align="center">Last Work Position</td>'
            . '        </tr>'
            . '    </thead>'
            . '    <tbody>'
            . '        <tr>'
            . '            <td>Company Name</td>'
            . '            <td>'.$cv['company'].'</td>'
            . '        </tr>'
            . '        <tr>'
            . '            <td>From</td>'
            . '            <td>'.$cv['company_from'].'</td>'
            . '        </tr>'
            . '        <tr>'
            . '            <td>To</td>'
            . '            <td>'.$cv['company_to'].'</td>'
            . '        </tr>'
            . '    </tbody>'
            . '</table>'
            . '<br/><br/>'
            . '<table border="1">'
            . '    <thead>'
            . '        <tr>'
            . '            <td colspan="2" align="center">Computer Skills</td>'
            . '        </tr>'
            . '    </thead>'
            . '    <tbody>'
            . '        <tr>'
            . '            <td>Programming Languages</td>'
            . '            <td>'
            . '                <table border="1">'
            . '                    <tr>'
            . '                        <td>Language</td>'
            . '                        <td>Skill Level</td>'
            . '                    </tr>';
            
    foreach($cv['comp_skills'] as $cs) {
        $result .= ''
            . '                    <tr>'
            . '                        <td>'.$cs['lang'].'</td>'
            . '                        <td>'.$cs['level'].'</td>'
            . '                    </tr>';
    }
    
    $result .= ''
            . '                </table>'
            . '            </td>'
            . '        </tr>'
            . '    </tbody>'
            . '</table>'
            . '<br/><br/>'
            . '<table border="1">'
            . '    <thead>'
            . '        <tr>'
            . '            <td colspan="2" align="center">Other Skills</td>'
            . '        </tr>'
            . '    </thead>'
            . '    <tbody>'
            . '        <tr>'
            . '            <td>Languages</td>'
            . '            <td>'
            . '                <table border="1">'
            . '                    <tr>'
            . '                        <td>Language</td>'
            . '                        <td>Comprehension</td>'
            . '                        <td>Reading</td>'
            . '                        <td>Writing</td>'
            . '                    </tr>';           
    foreach($cv['languages'] as $lang) {
        $result .= ''
            . '                    <tr>'
            . '                        <td>'.$lang['lang'].'</td>'
            . '                        <td>'.$lang['comprehension'].'</td>'
            . '                        <td>'.$lang['reading'].'</td>'
            . '                        <td>'.$lang['writing'].'</td>'
            . '                    </tr>';
    }
    
    $result .= ''
            . '                </table>'
            . '            </td>'
            . '        </tr>'
            . '        <tr>'
            . '            <td>Driver\'s License</td>'
            . '            <td style="text-transform: uppercase;">'.implode(', ', array_keys($cv['driver_license'])).'</td>'
            . '        </tr>'
            . '    </tbody>'
            . '</table>';
    
    
    echo $result;
}

?>
    </body>
</html>