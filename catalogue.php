<?php
require('includes/config.php');
include 'models/FilmModel.php';
// Create an instance
$filmModel = new FilmModel($host, $user, $password, $db);
// Get the list of Films
$filmResults = $filmModel->getAllFilms();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SHU Films | Catalogue</title>
  <link rel="stylesheet" href="css/mobile.css" />
  <link rel="stylesheet" href="css/desktop.css" media="only screen and (min-width : 720px)" />
</head>

<body>
  <?php include("includes/header.php") ?>
  <div class="mainContainer">
    <main>
      <div class="banner">
        <h2>Catalogue</h2>
      </div>
      <section class="twoColumn">
        <div class="listing">
          <table>
            <tr>
              <th>Film</th>
              <th>Certificate</th>
              <th>Price</th>
            </tr>
            <?php
            while ($obj = $filmResults->fetch_object()) {
              echo "<tr>";
              echo "<td data-cell=\"Title\" role=\"cell\"><a href=\"film-details.php?filmID={$obj->filmID}\">{$obj->filmTitle}</a></td>";
              echo "<td data-cell=\"Certificate\" role=\"cell\">{$obj->filmCertificate}</td>";
              echo "<td data-cell=\"Price\" role=\"cell\">&pound; {$obj->filmPrice}</td>";
              echo "</tr>";
            }
            ?>
          </table>
        </div>
        <?php
        include("includes/sidebar.php");
        ?>
      </section>
    </main>
  </div>
  <?php include("includes/footer.php") ?>
  <script src="js/main.js"></script>
</body>

</html>