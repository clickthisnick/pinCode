<?php

header('Content-Type: application/json');

require_once 'connection.php';

$images = R::getAll( 'SELECT * FROM image');

echo json_encode($images);

?>
