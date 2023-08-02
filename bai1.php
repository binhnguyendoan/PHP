<?php
$n =4 ;
$arr = array();

for($i  = 0 ; $i< $n ; $i++){
    if($i % 2 == 0 ){
        $arr[$i] = 2 - 0.5*$i;
        
    }else{
        $arr[$i]= -1; 
    }
}
print_r($arr);