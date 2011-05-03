<?php 
$string = "SELECT * FROM mail WHERE id_to = %me% or id_from = %me% ORDER BY id DESC LIMIT 10";
$pattern = "/%me%/";
$string = preg_replace($pattern, 1, $string);

echo $string;
 ?> 
