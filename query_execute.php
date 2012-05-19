<?php 

include('dbclass.php');

/**
 * Get type and do switch 
 */

$query = $_REQUEST['query'];
$table = "usr_web313_4";

/* IF Query starts with select */

$query_fields_start = strpos($query, 'SELECT');

if($query) {
  $connection = new DB_Class($table);
  $connection->connect();

  if ($query_fields_start == 0) {
    $query_fields_end = strpos($query, 'FROM');
    $subfields = substr($query, $query_fields_start+6, $query_fields_end-6);
    $fields = split('[,]', $subfields);
    $result = $connection->fetch($query);
  ?>
    <table class="table table-striped">
      <thead>
        <?php for($i = 0; $i < count($fields); $i++): ?>
          <th><?php echo $fields[$i] ?></th>
        <?php endfor; ?>
      </thead>
      <tbody>
        <?php foreach ($result as $row): ?>
          <tr>
          <?php for($i = 0; $i < count($fields); $i++): ?>
            <td><?php echo $row[$i]; ?></td>
          <?php endfor; ?>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  
<?php  }

  $connection->close_connection();
}

 ?>