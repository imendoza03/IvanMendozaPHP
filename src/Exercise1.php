<?php

/*Array containing the indicated data*/
$arrayOfData = [
    'First name' => 'Ivan',
    'Last name' => 'Mendoza',
    'Address' => '151 rue de Luxembourg',
    'City' => 'Esch-sur-Alzette',
    'Email' => 'ivanmendoza@gmail.com',
    'Telephone' => '+352661841211',
    'Date of birth' => '1984-12-11'
];

/*Using the class DateTime in order to format the birthDate in the array*/
$fomattedDate = new DateTime($arrayOfData['Date of birth']);
$fomattedDate = $fomattedDate->format('d/m/Y');
/*Replacing of the birthdate by the formatted one*/
$arrayOfData['Date of birth'] = $fomattedDate;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Exercise1</title>
</head>
<body>
  <h3>Exercise 1</h3>
  <ul>
    <!-- Loop through the array of data in order to display the list in HTML -->
    <?php foreach ($arrayOfData as $key => $data)  {
      echo '<li>' . $key . ' : ' . $data . '</li>';
    }?>
  </ul>
</body>
</html>