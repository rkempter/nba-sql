<?php 

/**
* 
*/
class DB_Class
{
  
  VAR $db;

  function __construct()
  {
  }

  /**
   * Build connection to mysql-Server and select database
   */
  function connect() {
    $this->db = mysql_connect('localhost', 'web313', 'steve04');

    if (!$this->db) {
      die('Could not connect: ' . mysql_error());
    }

    mysql_select_db('usr_web313_4', $this->db) or die('Could not select database');
  }

  /**
   * Insert row into database
   */
  function insert($sql) {
    return mysql_query($sql, $this->db) or die("Invalid query: " . mysql_error());
  }

  /**
   * Send query to the database
   */
  function query($sql) {
    $result = mysql_query($sql, $this->db) or die("Invalid query: " . mysql_error());
    return $result;
  }

  function count_results($sql) {
    $result = $this->query($sql);
    return mysql_num_rows($result);
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
  * Fetch results in associative form
  */
  function fetch_assoc($sql) {
    $data = array();
    $result = $this->query($sql);

    while($row = mysql_fetch_assoc($result)) {
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