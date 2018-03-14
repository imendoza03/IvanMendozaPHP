<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>IvanMendozaPHP</title>
</head>
<body>
<?php

/*Include of the php files to display the results in the index page */
include 'src/Exercise1.php';
include 'src/Exercise2.php';
include 'src/Exercise3.php';

try {
    $connection = new PDO('mysql:host=localhost;dbname=movie', 'root');
} catch (PDOException $e) {
    echo 'Error: connection to the db could not be established! - ' . $e->getMessage();
}

?>


</body>
</html>