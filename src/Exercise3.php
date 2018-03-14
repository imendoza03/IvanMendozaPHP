<?php 

//production years to fill select for the movies
$years = [];
for($i = 1890; $i <= 2018; $i++){
    $years[] = $i;
}

//Movies languages
$languages = ['English', 'French', 'Spanish', 'German', 'Portuguese', 'Luxembourgish'];

//Movies categories
$categories = ['Action', 'Drama', 'Thriller', 'Horror', 'Comedy'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $title = $_POST['title'] ?? null;
    $directorName = $_POST['director'] ?? null;
    $actors = $_POST['actors'] ?? null;
    $producer = $_POST['producer'] ?? null;
    $synopsis = $_POST['storyline'] ?? null;
    
    $titleHasError = !(is_string($var) && strlen($title) < 5);
    $directorNameHasError = !(is_string($var) && strlen($title) < 5);
    $producerHasError = !(is_string($var) && strlen($title) < 5);
    $sypnosisHasError = !(is_string($var) && strlen($title) < 5);
    
    if($titleHasError && $directorNameHasError && $producerHasError && $sypnosisHasError){
        
        try {
            $connection = new PDO('mysql:host=localhost;dbname=movie', 'root');
        } catch (PDOException $e) {
            echo 'Error: connection to the db could not be established! - ' . $e->getMessage();
        }
        
//         $query = 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Exercise3</title>
</head>
<style>
    input, select{
        display: block;
    }
    [type="submit"] {
        margin-top: 10px;
    }
    .title-color{
        color: green;
    }
</style>
<body>
<h3>Exercise 3</h3>
<h3 class="title-color">Movie cretion form</h3>
<form action="Exercise3.php" method="POST">
	<label for="title">Title: </label>
	<input type="text" name="title"/>
	<label for="actors">Actors: </label>
	<input type="text" name="actos"/>
	<label for="director">Director: </label>
	<input type="text" name="director"/>
	<label for="producer">Producer: </label>
	<input type="text" name="producer"/>
	<label for="year_of_prod">Year of production: </label>
	<select>
    	<option value="">--</option>
    	<?php foreach($years as $key => $year) {
    	   echo "<option value='" . $key . "'>" . $year . "</option>";
    	}?>
    </select>
	<label for="language">Language: </label>
	<select>
	<option value="">--</option>
    	<?php foreach($languages as $key => $language) {
    	    echo "<option value='" . $key . "'>" . $language . "</option>";
    	}?>
    </select>
	<label for="category">Category: </label>
	<select>
	   <option value="">--</option>
    	<?php foreach($categories as $key => $category) {
    	    echo "<option value='" . $key . "'>" . $category . "</option>";
    	}?>
    </select>
	<label for="storyline">Storyline: </label>
	<input type="text" name="storyline"/>
	<button type="submit">submit</button>
</form>
</body>
</html>