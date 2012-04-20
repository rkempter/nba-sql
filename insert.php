<?php 

include('dbclass.php');

/**
 * Get type and do switch 
 */

$type = $_REQUEST['type'];

switch ($type) {
  case 'coach':
    $dbconnection = new DB_Class('Coach');
    $query = "Insert Into Coach";
    $result = $dbconnection->insert($query);
    if(!$result)
      return false;
    $dbconnection->close_connection();
    return $result;
    break;
  case 'player':
      
    break;

  case 'team':
    # code...
    break;
  
  case 'draft':
    # code...
    break;

  case 'allstar':
    # code...
    break;

  case 'p_stat':
    # code...
    break;

  case 'c_stat':
    # code...
    break;

  case 't_stat':
    # code...
    break;

  default:
    # code...
    break;
}





 ?>