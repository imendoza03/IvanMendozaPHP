  <?php

  if($_SERVER['REQUEST_METHOD'] == 'GET') {
      
      try {
          $connection = new PDO('mysql:host=localhost;dbname=movie', 'root');
      } catch (PDOException $e) {
          echo 'Error: connection to the db could not be established! - ' . $e->getMessage();
      }
      
      $query = 'SELECT * FROM movies';
      $statement = $connection->prepare($query);

      if(!$statement->execute()){
          echo 'INSERT FAILED';
          var_dump($statement->errorInfo());
          return;
      } 
      
      $movies = $statement->fetchAll();
      
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

  </body>
  </html>