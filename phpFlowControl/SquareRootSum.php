<?php

$rows = '';
$total = 0;

for($i = 0; $i <= 100; $i++) {
    if($i % 2 == 0) {
        $rows .= '<tr><td>'.$i.'</td><td>'.number_format(sqrt($i), 2).'</td></tr>';
        $total += sqrt($i);
    }
}

?>

<table border="1">
    <thead>
        <tr>
            <td>Number</td>
            <td>Square</td>
        </tr>
    </thead>
    <tbody>
        <?= $rows ?>
    </tbody>
    <tfoot>
        <tr>
            <td>Total:</td>
            <td><?= number_format($total, 2) ?></td>
        </tr>
    </tfoot>
</table>