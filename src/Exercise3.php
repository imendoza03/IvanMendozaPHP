<?php 

//production years to fill select for the movies
$years = [];
for($i = 1989; $i <= 2018; $i++){
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
    $language = $_POST['language'] ?? null;
    $category = $_POST['category'] ?? null;
    $yearOfProduction = $_POST['year_of_prod'] ?? null;
    
    $titleHasError = (is_string($title) && strlen($title) > 4);
    $directorNameHasError = (is_string($directorName) && strlen($directorName) > 4);
    $producerHasError = (is_string($producer) && strlen($producer) > 4);
    $sypnosisHasError = (is_string($synopsis) && strlen($synopsis) > 4);
    
    if($titleHasError && $directorNameHasError && $producerHasError && $sypnosisHasError){
        
        try {
            $connection = new PDO('mysql:host=localhost;dbname=movie', 'root');
        } catch (PDOException $e) {
            echo 'Error: connection to the db could not be established! - ' . $e->getMessage();
        }
        
        $query = "INSERT INTO movies(title, actors, director, producer, year_of_prod, language, category, storyline) VALUES(:title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline)";
        $statement = $connection->prepare($query);
        $statement->bindValue('title', $title);
        $statement->bindValue('director', $directorName);
        $statement->bindValue('actors', $actors);
        $statement->bindValue('producer', $producer);
        $statement->bindValue('year_of_prod', intval($yearOfProduction));
        $statement->bindValue('language', $language);
        $statement->bindValue('category', $category);
        $statement->bindValue('storyline', $synopsis);
    
        if(!$statement->execute()){
            echo 'INSERT FAILED';
            var_dump($statement->errorInfo());
        } else {
            echo 'Movie has been stored!';
        }
  
        return;
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
    .has-error{
        color: red;
    }
</style>
<body>
<h3>Exercise 3</h3>
<h3 class="title-color">Movie cretion form</h3>
<form action="index.php" method="POST">
	<label for="title">Title: </label>
	<input type="text" name="title"/>
	<?php if(!($titleHasError ?? true)){?>
        <div class="has-error">
			<p>Title is incorrect, must have at least 5 characters!</p>
		</div>
     <?php }?>
	<label for="actors">Actors: </label>
	<input type="text" name="actos"/>
	<label for="director">Director: </label>
	<input type="text" name="director"/>
	<?php if(!($directorNameHasError ?? true)){?>
        <div class="has-error">
			<p>Director name is incorrect, must have at least 5 characters!</p>
		</div>
     <?php }?>
	<label for="producer">Producer: </label>
	<input type="text" name="producer"/>
	<?php if(!($producerHasError ?? true)){?>
        <div class="has-error">
			<p>Producer name is incorrect, must have at least 5 characters!</p>
		</div>
     <?php }?>
	<label for="year_of_prod">Year of production: </label>
	<select name="year_of_prod">
    	<option value="">--</option>
    	<?php foreach($years as $year) {
    	    echo "<option value='" . $year . "'>" . $year . "</option>";
    	}?>
    </select>
	<label for="language">Language: </label>
	<select name="language">
	<option value="">--</option>
    	<?php foreach($languages as $language) {
    	    echo "<option value='" . $language . "'>" . $language . "</option>";
    	}?>
    </select>
	<label for="category">Category: </label>
	<select name="category">
	   <option value="">--</option>
    	<?php foreach($categories as $key => $category) {
    	    echo "<option value='" . $key . "'>" . $category . "</option>";
    	}?>
    </select>
	<label for="storyline">Storyline: </label>
	<input type="text" name="storyline"/>
	<?php if(!($sypnosisHasError ?? true)){?>
        <div class="has-error">
			<p>Synosis is incorrect, must have at least 5 characters!</p>
		</div>
     <?php }?>
	<button type="submit">submit</button>
</form>
</body>
</html>