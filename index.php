  <?php
  
  //Function to create the PDO connection to the DB
  function createDbConnection(){
      try {
          $connection = new PDO('mysql:host=localhost;dbname=movie', 'root');
      } catch (PDOException $e) {
          echo 'Error: connection to the db could not be established! - ' . $e->getMessage();
      }
      
      return $connection;
  }
  
  //function to get the movies from the database
  function getMovies(){
      $connection = createDbConnection();
      
      $query = 'SELECT * FROM movies';
      $statement = $connection->prepare($query);
      
      if(!$statement->execute()){
          echo 'INSERT FAILED';
          var_dump($statement->errorInfo());
          return;
      }
      
      $movies = $statement->fetchAll();
      
      return $movies;
  }
  
  //array to store the movies
  $movies = [];
  
  //array to store the movie that's selected
  $movieToShow = [];
  
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $selectedMovie = $_POST['movies'] ?? null;
      
      if(isset($selectedMovie)) {
          $connection = createDbConnection();
          
          $query = "SELECT * FROM movies WHERE title = '$selectedMovie'";
          $statement = $connection->prepare($query);
          
          if(!$statement->execute()){
              echo 'INSERT FAILED';
              var_dump($statement->errorInfo());
              return;
          }
          
      } else {
          echo 'Please select a movie!';
      }
      
      $movies = getMovies();
  }

  if($_SERVER['REQUEST_METHOD'] == 'GET') {
      $movies = getMovies();
  }

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IvanMendozaPHP</title>
   	<style>
   	    .movie-title{
   	        color: green;
   	    }
   	</style>
  </head>
  <body>
  <?php

  /*Include of the php files to display the results in the index page */
  include 'src/Exercise1.php';
  include 'src/Exercise2.php';
  include 'src/Exercise3.php';

  ?>
   <h3 class="movie-title">List of movies</h3>
   <ul>
      <!-- Loop through the array of movies in order to display the list in HTML -->
      <?php 
      if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($movies)) {
          foreach ($movies as $movie)  {
              echo '<li>Title: ' . $movie['title'] . ' Director:' .  $movie['director'] . '<a href="https://www.imdb.com/"> see more info</a>' . '</li>';
          }
      }
      ?>
    </ul>
    
    <h3 class="movie-title">Movie details</h3>
    <form action="index.php" method="POST">
        <label for="movies">Please select a movie: </label>
    	<select name="movies">
    	<option value="">--</option>
        	<?php foreach($movies as $movie) {
        	    echo "<option value='" . $movie['title'] . "'>" . $movie['title'] . "</option>";
        	}?>
        </select>
        <?php foreach($movieToShow as $movieToDisplay) {
            '<p>' . $movieToDisplay . '</p>';
        }?>
        <button type="submit">Search</button>
    </form>
  </body>
  </html>