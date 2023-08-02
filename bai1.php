<?php
$n = 5;
$a = array();

for ($i = 0; $i < $n; $i++) {
    if ($i % 2 == 0) { 
        if ($i == 0) {
            $a[$i] = 2;
        } else {
            $a[$i] = $a[$i-2] - 0.5;
        }
    } else { 
        $a[$i] = -1;
    }
}

print_r($a);
?>