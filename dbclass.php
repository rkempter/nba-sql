<?php 

/**
* 
*/
class DB_Class
{
  
  VAR $db;

  /**
   * Connect to database and to selected table
   */
  function __construct($dbname)
  {
    $this->db = mysql_connect('localhost', 'web313', 'steve04');

    if (!$this->db) {
      die('Could not connect: ' . mysql_error());
    }

    mysql_select_db($dbname, $this->db) or die('Could not select database');
  }

  /**
   * Insert row into database
   */
  function insert($sql) {
    return mysql_query($sql, $this->db) or die("Invalid query: " . mysql_error()());
  }

  /**
   * Send query to the database
   */
  function query($sql) {
    $result = mysql_query($sql, $this->db) or die("Invalid query: " . mysql_error()());
    return $result;
  }

  /**
   * Returns array with rows of results
   */
  function fetch($sql) {
    $data = array();
    $result = $this->query($sql);

    while($row = mysql_fetch_array($result, MYSQL_NUM)) {
      $data[] = $row;
    }

    return $data;
  }

  /**
   * Close DB Connection
   */
  function close_connection() {
    mysql_close($this->db);
  }
}

?>