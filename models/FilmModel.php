<?php
class FilmModel {
  private $mysqli;
  public function __construct( $host, $user, $password, $db ) {
    $this->mysqli = new mysqli( $host, $user, $password, $db );
  }

  public function getAllFilms() {
    return $this->mysqli->query( 'SELECT * FROM Films' );
  }
	
  public function getFilm($filmID) {
    $stmt = $this->mysqli->prepare( "SELECT * FROM Films WHERE filmID = ?" );
	$stmt->bind_param("i", $filmID);
	$stmt->execute();
	$obj = $stmt->get_result()->fetch_object(); 
	return $obj;
  }
	
  public function getFilmByTitle($searchQuery) {
    $searchQuery = "%" . $searchQuery . "%";
    $stmt = $this->mysqli->prepare( "SELECT * FROM Films WHERE filmTitle LIKE ?" );
	$stmt->bind_param( 's', $searchQuery );
    $stmt->execute();
 	$result = $stmt->get_result(); 
	return $result;
  }
	
  public function newestFilms() {
    return $this->mysqli->query( 'SELECT * FROM Films ORDER BY releaseDate DESC LIMIT 0,4' );
  }
	
  public function randomFilm() {
    return $this->mysqli->query( 'SELECT * FROM Films ORDER BY RAND() LIMIT 1' );
  }

}
