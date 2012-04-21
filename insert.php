<?php 

include('dbclass.php');

/**
 * Get type and do switch 
 */

$type = $_REQUEST['type'];

switch ($type) {
  case 'coach':
    $table = 'Coach';
    $query = "Insert Into Coach";
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
    return 'Error!'
    break;
}

if($table && $query) {
  $connection = new DB_Class($table);
  $result = $connection->insert($query);
  if (!$result) {
    return false;
  }
  $connection->close_connection();
}


 ?>