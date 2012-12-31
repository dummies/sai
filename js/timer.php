<?php

$min = date('i');
$sec = date('s');

$res = ( $min *60 + $sec ) %180;
echo $res;

?>