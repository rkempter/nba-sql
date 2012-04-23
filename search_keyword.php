<?php include('dbclass.php'); ?>
<?php $keyword = $_POST['keyword']; ?>
<?php $connection = new DB_Class(); ?>
<?php $connection->connect() ?>

<ul class="nav nav-tabs">
  <li class="active"><a href="#player" data-toggle="tab">Players</a></li>
  <li><a href="#coach" data-toggle="tab">Coaches</a></li>
  <li><a href="#team" data-toggle="tab">Teams</a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="player">
    <!-- Search for Player info -->
    <?php $query = "SELECT p.pid, p.firstName, p.lastName, p.college, p.birthdata
                    FROM Player p
                    WHERE p.firstName LIKE '%".$keyword."%'
                    OR p.lastName Like '%".$keyword."%' 
                    OR p.college Like '%".$keyword."%'
                    OR p.pid LIKE  '%".$keyword."%' ";  ?>
    <?php // Fetch results of query ?>
    <?php $data = $connection->fetch($query); ?>
    <div class="page-header">
      <h1>Player <small><?php echo $connection->count_results($query)." Results"; ?></small></h1>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>College</th>
          <th>Birthdata</th>
          <th>Remove</th>
          <th>Show more</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($data as $row): ?>
        <tr>
          <td><a href="search_player.php?id=<?php echo $row[0]; ?>" class="player-link" data-id="<?php echo $row[0]; ?>" data-task="more"><?php echo $row[0]; ?></a></td>
          <td><?php echo $row[1]; ?></td>
          <td><?php echo $row[2]; ?></td>
          <td><a href="#" class="player-link" data-id="<?php echo $row[3]; ?>" data-task="more"><?php echo $row[3]; ?></a></td>
          <td><?php echo $row[4]; ?></td>
          <td><a href="#" class="player-link" data-id="<?php echo $row[0]; ?>" data-task="remove"><i class="icon-remove"></i></a></td>
          <td><a href="search_player.php?id=<?php echo $row[0]; ?>" class="player-link" data-id="<?php echo $row[0]; ?>" data-task="more"><i class="icon-plus"></i></a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- Search for Coach info -->
  <div class="tab-pane" id="coach">
    
    <?php $query = "SELECT c.cid, c.firstName, c.lastName
                    FROM Coach c
                    WHERE c.firstName LIKE '%".$keyword."%'
                    OR c.lastName LIKE '%".$keyword."%' 
                    OR c.cid LIKE '%".$keyword."%' ";  ?>
    <?php $data = $connection->fetch($query); ?>
    <div class="page-header">
      <h1>Coach <small><?php echo $connection->count_results($query)." Results"; ?></small></h1>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Remove</th>
          <th>Show more</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($data as $row): ?>
        <tr>
          <td><a href="#" class="player-link" data-id="<?php echo $row[0]; ?>" data-task="more"><?php echo $row[0]; ?></a></td>
          <td><?php echo $row[1]; ?></td>
          <td><?php echo $row[2]; ?></td>
          <td><a href="#" class="player-link" data-id="<?php echo $row[0]; ?>" data-task="remove"><i class="icon-remove"></i></a></td>
          <td><a href="#" class="player-link" data-id="<?php echo $row[0]; ?>" data-task="more"><i class="icon-plus"></i></a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Search for Team info -->
  <div class="tab-pane" id="team">
    
    <?php $query = "SELECT t.tshort, t.location, t.name, t.league
                    FROM Team t
                    WHERE t.tshort LIKE '%".$keyword."%'
                    OR t.location LIKE '%".$keyword."%' 
                    OR t.name LIKE  '%".$keyword."%' ";  ?>
    <?php $data = $connection->fetch($query); ?>
    <div class="page-header">
      <h1>Team <small><?php echo $connection->count_results($query)." Results"; ?></small></h1>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Location</th>
          <th>Name</th>
          <th>League</th>
          <th>Show more</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($data as $row): ?>
        <tr>
          <td><a href="#" class="player-link" data-id="<?php echo $row[0]; ?>" data-task="more"><?php echo $row[0]; ?></a></td>
          <td><?php echo $row[1]; ?></td>
          <td><?php echo $row[2]; ?></td>
          <td><?php echo $row[3]; ?></td>
          <td><a href="#" class="player-link" data-id="<?php echo $row[0]; ?>" data-task="more"><i class="icon-plus"></i></a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>

<?php $connection->close_connection(); ?>