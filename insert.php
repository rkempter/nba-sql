<?php 

include('dbclass.php');

/**
 * Get type and do switch 
 */

$type = $_REQUEST['type'];
$table = "usr_web313_4";

switch ($type) {
  case 'Coach':
    $cid = $_POST['cid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $query = "INSERT INTO Coach (firstname,lastname) VALUES('Renato','kempter')";
    //$query = 'INSERT INTO Coach(firstName, lastName) VALUES ('.$firstname.', '.$lastname.')';
    break;
  case 'player':
    $table = 'Player';
    $pid = $_POST['pid'];
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $college = $_POST['college'];
    $birthdate = $_POST['birthdate'];
    $weight = $_POST['weight'];
    $heightInches = $_POST['heightInches'];
    $heightFeet = $_POST['heightFeet'];
    $position = $_POST['position'];
    $firstSeason = $_POST['firstSeason'];
    $lastSeason = $_POST['lastSeason'];
    $query = "INSERT INTO Player 
              (pid, firstName, lastName, college, birthdata, position, firstSeason, lastSeason, heightFeet, heightInches, weight)
              VALUES (".$pid.", ".$firstName.", ".$lastName.", ".$position.", ".$firstSeason.", ".$lastSeason.", ".$heightFeet.", ".$heightInches.", ".$weight.")";
    break;

  case 'team':
    $table = 'Team';
    // Put insert query here
    break;
  
  case 'draft':
    $table = 'Draft';
    // Put insert query here
    break;

  case 'allstar':
    $table = 'Allstar';
    // Put insert query here
    break;

  case 'p_stat':
    $table = 'P_Stat';
    // Put insert query here
    break;

  case 'c_stat':
    $table = 'C_Stat';
    // Put insert query here
    break;

  case 't_stat':
    $table = 'T_Stat';
    // Put insert query here
    break;

  default:
    return 'Error!';
    break;
}

if($query) {
  $connection = new DB_Class($table);
  $connection->connect();
  $result = $connection->insert($query);
  if (!$result) {
    return false;
  }
  $connection->close_connection();
}

 ?>