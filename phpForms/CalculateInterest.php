<html>
    <head>
        <meta charset="UTF-8" />
        <title>Calculate Interest</title>
    </head>
    <body>
        <form method="POST">
            <label for="amount">Enter amount</label>
            <input type="text" name="amount" id="amount"/>
            <br/>
            
            <input type="radio" name="currency" value="usd" id="usd" />
            <label for="usd">USD</label>
            
            <input type="radio" name="currency" value="eur" id="eur" />
            <label for="eur">EUR</label>
            
            <input type="radio" name="currency" value="bgn" id="bgn" />
            <label for="bgn">BGN</label>
            <br/>
            
            <label for="cia">Compound Interest Amount</label>
            <input type="text" name="cia" id="cia" />
            <br/>
            
            <select name="months">
                <option value="6">6 months</option>
                <option value="12">1 year</option>
                <option value="24">2 year</option>
                <option value="60">5 year</option>
            </select>
            
            <input type="submit" value="Calculate" />
        </form>
    </body>
</html>

<?php
if($_POST) {
    
    $amount = (int)trim($_POST['amount']);
    $currency = trim($_POST['currency']);
    $cia = (int)trim($_POST['cia']);
    $months = (int)trim($_POST['months']);
    
    $interest = 100 + ($cia / 12);
    
    for($i = 1; $i <= $months; $i++) {
        $amount *= $interest / 100;
    }
    
    $result = number_format($amount, 2, '.', '');
    
    switch($currency) {
        case 'usd':
            $result = '$ '.$result;
            break;
        case 'eur':
            $result = '€ '.$result;
            break;
        case 'bgn':
            $result .= ' lv.';
            break;
    }
    
    echo $result;
    
}