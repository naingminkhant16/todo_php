<?php
require 'config.php';
$statement = $pdo->prepare('DELETE FROM todo WHERE id=' . $_GET['id']);
$result = $statement->execute();
if ($result) {
    header('location: index.php');
}
