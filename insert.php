<?php 

include('dbclass.php');

/**
 * Get type and do switch 
 */

$type = $_REQUEST['type'];

switch ($type) {
  case 'Coach':
    $table = $type;
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $query = 'INSERT INTO Coach (firstName, lastName) VALUES ('.$firstname.', '.$lastname.')';
    break;
  case 'player':
    $table = 'Player';
    // Put insert query here
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

if($table && $query) {
  echo $query;
  $connection = new DB_Class($table);
  $result = $connection->insert($query);
  if (!$result) {
    return false;
  }
  $connection->close_connection();
}


 ?>