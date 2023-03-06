<?php
require( 'includes/config.php' );
include 'models/FilmModel.php';
//check for querystring
$getFilmID = $_GET[ 'filmID' ] ?? null;
$filmModel = new FilmModel( $host, $user, $password, $db );
// Get the Films
$obj = $filmModel->getFilm($getFilmID );

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo $obj->filmTitle; ?></title>
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
      <?php
      echo "<h2>{$obj->filmTitle}</h2>";
      ?>
    </div>
    <section class="twoColumn">
      <div>
        <?php
        echo "<div class=\"filmDetails\">";
        echo "<div>";
        echo "<img src=\"images/{$obj->filmImage}\" alt=\"{$obj->filmTitle}\">";
        echo "</div>";
        echo "<div>";
        echo "<p>{$obj->filmDescription}</p>";
        echo "<p>{$obj->filmCertificate}</p>";
        echo "</div>";
        echo "</div>";
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
