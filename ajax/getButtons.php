<?php

require_once '../lib/rb.php';
require_once 'connection.php';

$buttons = R::getAll( 'SELECT * FROM buttons');

echo json_encode($buttons);

?>
