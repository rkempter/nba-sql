<?php include('dbclass.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>NBA Statistics</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="./index.html">NBA Project</a>
        <div class="nav-collapse">
          <ul class="nav">
            <li>
              <a href="./index.php">Home</a>
            </li>
            <li class="active">
              <a href="search.php">Search for Keyword</a>
            </li>
            <li class="">
              <a href="insert_data.html">Insert elements</a>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Deliverable 2 <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="query_2_a.php">Query a</a></li>
                <li><a href="query_2_b.php">Query b</a></li>
                <li><a href="query_2_c.php">Query c</a></li>
                <li><a href="query_2_d.php">Query d</a></li>
                <li><a href="query_2_e.php">Query e</a></li>
                <li><a href="query_2_f.php">Query f</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <section class="container content">

    <?php $id = $_GET['id']; ?>
    <?php $connection = new DB_Class(); ?>
    <?php $connection->connect() ?>

    <ul class="nav nav-tabs">
      <li class="active"><a href="#coach" data-toggle="tab">About</a></li>
      <li><a href="#season" data-toggle="tab">Seasons</a></li>
    </ul>
    <div class="tab-content">
      <!-- Show Player Information -->
      <div class="tab-pane active" id="coach">
        <?php $query = "SELECT c.cid, c.firstName, c.lastName
                        FROM Coach c
                        WHERE c.cid = '".$id."' ";  ?>
        <?php // Fetch results of query ?>
        <?php $data = $connection->fetch_assoc($query); ?>
        <?php foreach ($data as $row): ?>
        <div class="page-header">
          <h1><?php echo $row['firstName']." ".$row['lastName']; ?></h1>
        </div>
        <?php endforeach; ?>

        <!-- Get Season Statistics -->
        <section class="season">
          <header class="page-header">
            <h1>Career Statistics</h1>
          </header>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Playoff Wins</th>
                <th>Playoff Losses</th>
                <th>Season Wins</th>
                <th>Season Losses</th>
              </tr>
            </thead>
            <tbody>
              <?php $query = "SELECT *
                        FROM CoachCareer
                        WHERE cid = '".$id."' ";  ?>
              <?php // Fetch results of query ?>
              <?php $data = $connection->fetch_assoc($query); ?>
              <?php foreach ($data as $row): ?>
              <tr>
                <td><?php echo $row['playoffWins'] ?></td>
                <td><?php echo $row['playoffLosses'] ?></td>
                <td><?php echo $row['seasonWins'] ?></td>
                <td><?php echo $row['seasonLosses'] ?></td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </section>
      </div>
      <div class="tab-pane" id="season">
        <header class="page-header">
          <h1>Coach Regular Seasons</h1>
        </header>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Year</th>
              <th>Team</th>
              <th>Season Wins</th>
              <th>Season Losses</th>
              <th>Playoff Wins</th>
              <th>Playoff Losses</th>
            </tr>
          </thead>
          <tbody>
            <?php $query = "SELECT *
                      FROM CoachSeason
                      WHERE cid = '".$id."' 
                      GROUP BY year DESC";  ?>
            <?php // Fetch results of query ?>
            <?php $data = $connection->fetch_assoc($query); ?>
            <?php foreach ($data as $row): ?>
            <tr>
              <td><?php echo $row['year'] ?></td>
              <td><?php echo $row['tid'] ?></td>
              <td><?php echo $row['seasonWins'] ?></td>
              <td><?php echo $row['seasonLosses'] ?></td>
              <td><?php echo $row['playoffWins'] ?></td>
              <td><?php echo $row['playoffLosses'] ?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php $connection->close_connection(); ?>
  </section>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#btn-search').click(function(e) {
        console.log('Klick');
        if($('#keyword').val()) {
          console.log('Keyword: '+$('#keyword').val());
          $.ajax({
            type: 'POST',
            url: 'search_keyword.php',
            data: { keyword: $('#keyword').val() },
            success: function(data) {
              $('#data').html(data);
              console.log('Load was performed.');
            }
          });
        }
        e.preventDefault();
      });
    });
  </script>
</body>
</html>

