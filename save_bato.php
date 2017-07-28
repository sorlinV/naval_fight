<?php

$data = /*json_decode(*/file_get_contents('php://input')/*, true)*/;
$fd = fopen('test.txr', 'w+');
fwrite($fd, $data);
fclose($fd);