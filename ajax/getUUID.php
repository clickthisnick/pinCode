<?php

require_once '../lib/rb.php';
require_once 'connection.php';

$uuid = R::getAll( 'Select UUID()' );
$theuuid = $uuid[0]['UUID()'];

echo $theuuid;

?>
