<?php
require( 'includes/config.php' );
include 'models/FilmModel.php';
// Create an instance
$filmModel = new FilmModel( $host, $user, $password, $db );
//check for search value
$searchQuery = $_GET[ 'q' ] ?? null;
if ( is_null( $searchQuery ) || empty( $searchQuery ) ) {
  $validSearch = false;
} else {
  $validSearch = true;
  // query to get film by film Name
  $searchResults = $filmModel->getFilmByTitle($searchQuery);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>SHU Films | Search</title>
<link rel="stylesheet" href="css/mobile.css" />
<link
      rel="stylesheet"
      href="css/desktop.css"
      media="only screen and (min-width : 720px)"
    />
</head>
<body>
<?php include("includes/header.php")?>
<div class="mainContainer">
  <main>
    <div class="banner">
      <h2>Search Films</h2>
    </div>
    <section class="twoColumn">
      <div>
        <div class="searchForm">
          <form>
            <div>
              <label for="q">Search:</label>
              <input type="text" name="q">
            </div>
            <div>
              <input type="submit" value="Search for a Film">
            </div>
          </form>
        </div>
        <?php
        if ( $validSearch ) {
          echo "<p>Your search found {$searchResults->num_rows} result(s)";
          while ( $obj = $searchResults->fetch_object() ) {
            echo "<h3>{$obj->filmTitle}</h3>";
            echo "<p><a href=\"film-details.php?filmID={$obj->filmID}\">More Details</a></p>";
          }
        } else {
          echo "<p>Search for a film.</p>";
        }
        ?>
      </div>
		<?php
	    include("includes/sidebar.php");
		?>
    </section>
  </main>
</div>
<?php include("includes/footer.php")?>
<script src="js/main.js"></script>
</body>
</html>
