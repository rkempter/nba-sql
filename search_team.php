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
    <div class="tab-content">
      <!-- Show Player Information -->
      <div class="tab-pane active" id="player">
        <?php $query = "SELECT Distinct t.tid, t.location, t.name, t.league
                        FROM Team t
                        WHERE t.tid = '".$id."' ";  ?>
        <?php // Fetch results of query ?>
        <?php $data = $connection->fetch_assoc($query); ?>
        <?php foreach ($data as $row): ?>
        <div class="page-header">
          <h1><?php echo $row['name']; ?> <small>League: <?php echo $row['league']; ?></small></h1>
        </div>
        <div class="row">
          <div class="span4">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td><strong>Location</strong></td>
                  <td><?php echo $row['location']; ?></td>
                </tr>
                <tr>
                  <td><strong>Shortening</strong></td>
                  <td><?php echo $row['tid']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <?php endforeach; ?>

        <!-- Get Season Statistics -->
        <section class="season">
          <header class="page-header">
            <h1>Team Statistics</h1>
          </header>
          <?php $query = "SELECT *
                        FROM TeamStat t
                        WHERE t.tid = '".$id."' ";  ?>
          <?php // Fetch results of query ?>
          <?php $data = $connection->fetch_assoc($query); ?>
          <?php foreach ($data as $row): ?>
          <div class="row">
            <h2>Year: <?php echo $row['year'] ?> / League: <?php echo $row['league'] ?></h2>
            <div class="span3">
              <table class="table table-striped">
                <tbody>
                  <tr><th>o_fg</th><td><?php echo $row['o_fgm'] ?></td></tr>
                  <tr><th>o_fga</th><td><?php echo $row['o_fga']; ?></td></tr>
                  <tr><th>o_ftm</th><td><?php echo $row['o_ftm']; ?></td></tr>
                  <tr><th>o_fta</th><td><?php echo $row['o_fta']; ?></td></tr>
                  <tr><th>o_oreb</th><td><?php echo $row['o_oreb']; ?></td></tr>
                  <tr><th>o_dreb</th><td><?php echo $row['o_dreb']; ?></td></tr>
                  <tr><th>o_reb</th><td><?php echo $row['o_reb']; ?></td></tr>
                  <tr><th>o_asts</th><td><?php echo $row['o_asts']; ?></td></tr>
                </tbody>
              </table>
            </div>
            <div class="span3">
              <table class="table table-striped">
                <tbody>
                  <tr><th>o_pf</th><td><?php echo $row['o_pf']; ?></td></tr>
                  <tr><th>o_stl</th><td><?php echo $row['o_stl']; ?></td></tr>
                  <tr><th>o_to</th><td><?php echo $row['o_to']; ?></td></tr>
                  <tr><th>o_blk</th><td><?php echo $row['o_blk']; ?></td></tr>
                  <tr><th>o_3pm</th><td><?php echo $row['o_3pm']; ?></td></tr>
                  <tr><th>o_3pa</th><td><?php echo $row['o_3pa']; ?></td></tr>
                  <tr><th>o_pts</th><td><?php echo $row['o_pts']; ?></td></tr>
                  <tr><th>d_fgm</th><td><?php echo $row['d_fgm']; ?></td></tr>
                </tbody>
              </table>
            </div>
            <div class="span3">
              <table class="table table-striped">
                <tbody>
                  <tr><th>d_fga</th><td><?php echo $row['d_fga']; ?></td></tr>
                  <tr><th>d_ftm</th><td><?php echo $row['d_ftm']; ?></td></tr>
                  <tr><th>d_fta</th><td><?php echo $row['d_fta']; ?></td></tr>
                  <tr><th>d_oreb</th><td><?php echo $row['d_oreb']; ?></td></tr>
                  <tr><th>d_dreb</th><td><?php echo $row['d_dreb']; ?></td></tr>
                  <tr><th>d_reb</th><td><?php echo $row['d_reb']; ?></td></tr>
                  <tr><th>d_asts</th><td><?php echo $row['d_asts']; ?></td></tr>
                  <tr><th>d_pf</th><td><?php echo $row['d_pf']; ?></td></tr>
                </tbody>
              </table>
            </div>
            <div class="span3">
              <table class="table table-striped">
                <tbody>
                  <tr><th>d_stl</th><td><?php echo $row['d_stl']; ?></td></tr>
                  <tr><th>d_to</th><td><?php echo $row['d_to']; ?></td></tr>
                  <tr><th>d_blk</th><td><?php echo $row['d_blk']; ?></td></tr>
                  <tr><th>d_3pm</th><td><?php echo $row['d_3pm']; ?></td></tr>
                  <tr><th>d_3pa</th><td><?php echo $row['d_3pa']; ?></td></tr>
                  <tr><th>d_pts</th><td><?php echo $row['d_pts']; ?></td></tr>
                  <tr><th>Pace</th><td><?php echo $row['pace']; ?></td></tr>
                  <tr><th>Won</th><td><?php echo $row['won']; ?></td></tr>
                  <tr><th>Lost</th><td><?php echo $row['lost']; ?></td></tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <?php endforeach ?>
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

