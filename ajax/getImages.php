<?php

require_once '../lib/rb.php';
require_once 'connection.php';

$images = R::getAll( 'SELECT * FROM image');

echo json_encode($images);

?>
