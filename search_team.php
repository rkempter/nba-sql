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
        <?php $query = "SELECT t.tshort, t.location, t.name, t.league
                        FROM Team t
                        WHERE t.tshort = '".$id."' ";  ?>
        <?php // Fetch results of query ?>
        <?php $data = $connection->fetch_assoc($query); ?>
        <?php foreach ($data as $row): ?>
        <div class="page-header">
          <h1><?php echo $row['name']; ?></h1>
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
                  <td><?php echo $row['tshort']; ?></td>
                </tr>
                <tr>
                  <td><strong>League</strong></td>
                  <td><?php echo $row['league']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <?php endforeach; ?>

        <!-- Get Season Statistics -->
        <section class="season">
          <header class="page-header">
            <h1>Career Season Statistics</h1>
          </header>
          <?php $query = "SELECT *
                        FROM TeamStat t
                        WHERE t.tid = '".$id."' ";  ?>
          <?php // Fetch results of query ?>
          <?php $data = $connection->fetch_assoc($query); ?>
          <?php foreach ($data as $row): ?>
          <div class="row">
            <h2>Year: / League</h2>
            <div class="span3">
              <table class="table table-striped">
                <thead>
                  <th>o_fg</th>
                  <th>o_fga</th>
                  <th>o_ftm</th>
                  <th>o_fta</th>
                  <th>o_oreb</th>
                  <th>o_dreb</th>
                  <th>o_reb</th>
                  <th>o_asts</th>
                </thead>
                <tbody>
                  <td><?php echo $row['o_fgm'] ?></td>
                  <td><?php echo $row['o_fga']; ?></td>
                  <td><?php echo $row['o_ftm']; ?></td>
                  <td><?php echo $row['o_fta']; ?></td>
                  <td><?php echo $row['o_oreb']; ?></td>
                  <td><?php echo $row['o_dreb']; ?></td>
                  <td><?php echo $row['o_reb']; ?></td>
                  <td><?php echo $row['o_asts']; ?></td>
                </tbody>
              </table>
            </div>
            <div class="span3">
              <table class="table table-striped">
                <thead>
                  <th>o_pf</th>
                  <th>o_stl</th>
                  <th>o_to</th>
                  <th>o_blk</th>
                  <th>o_3pm</th>
                  <th>o_3pa</th>
                  <th>o_pts</th>
                  <th>d_fgm</th>
                </thead>
                <tbody>
                  <td><?php echo $row['o_pf']; ?></td>
                  <td><?php echo $row['o_stl']; ?></td>
                  <td><?php echo $row['o_to']; ?></td>
                  <td><?php echo $row['o_blk']; ?></td>
                  <td><?php echo $row['o_3pm']; ?></td>
                  <td><?php echo $row['o_3pa']; ?></td>
                  <td><?php echo $row['o_pts']; ?></td>
                  <td><?php echo $row['d_fgm']; ?></td>
                </tbody>
              </table>
            </div>
            <div class="span3">
              <table class="table table-striped">
                <thead>
                  <th>d_fga</th>
                  <th>d_ftm</th>
                  <th>d_fta</th>
                  <th>d_oreb</th>
                  <th>d_dreb</th>
                  <th>d_reb</th>
                  <th>d_asts</th>
                  <th>d_pf</th>
                </thead>
                <tbody>
                  <td><?php echo $row['d_fga']; ?></td>
                  <td><?php echo $row['d_ftm']; ?></td>
                  <td><?php echo $row['d_fta']; ?></td>
                  <td><?php echo $row['d_oreb']; ?></td>
                  <td><?php echo $row['d_dreb']; ?></td>
                  <td><?php echo $row['d_reb']; ?></td>
                  <td><?php echo $row['d_asts']; ?></td>
                  <td><?php echo $row['d_pf']; ?></td>
                </tbody>
              </table>
            </div>
            <div class="span3">
              <table class="table table-striped">
                <thead>
                  <th>d_stl</th>
                  <th>d_to</th>
                  <th>d_blk</th>
                  <th>d_3pm</th>
                  <th>d_3pa</th>
                  <th>d_pts</th>
                  <th>Pace</th>
                  <th>Won</th>
                  <th>Lost</th>
                </thead>
                <tbody>
                  <td><?php echo $row['d_stl']; ?></td>
                  <td><?php echo $row['d_to']; ?></td>
                  <td><?php echo $row['d_blk']; ?></td>
                  <td><?php echo $row['d_3pm']; ?></td>
                  <td><?php echo $row['d_3pa']; ?></td>
                  <td><?php echo $row['d_pts']; ?></td>
                  <td><?php echo $row['Pace']; ?></td>
                  <td><?php echo $row['Won']; ?></td>
                  <td><?php echo $row['Lost']; ?></td>
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

