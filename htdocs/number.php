<?php

$number = file_get_contents('/var/www/htdocs/number.txt');
$number += 1;
file_put_contents('number.txt', $number);
