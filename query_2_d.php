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
            <li class="">
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
                <li class="active"><a href="query_2_d.php">Query d</a></li>
                <li><a href="query_2_e.php">Query e</a></li>
                <li><a href="query_2_f.php">Query f</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <header>
    <h1></h1>
  </header>
  <section class="container content">
    <header class="jumbotron subhead" id="overview">
      <h1>Query d, Deliverable 2</h1>
      <p class="lead">Print the names of  coaches who participated  in  both  leagues (NBA  and ABA).</p>
      <pre>
SELECT firstName, c.lastName
FROM Coach c, TeamStat ts1, TeamStat ts2, CoachSeason cs
WHERE c.cid = cs.cid AND
cs.tid = ts1.tid AND
cs.year = ts1.year AND
cs.tid = ts2.tid AND
cs.year = ts2.year AND
ts1.league = 'A' AND
ts2.league = 'N'
      </pre>
    </header>
    <?php $connection = new DB_Class(); ?>
    <?php $connection->connect() ?>
    <?php $query = "
                    SELECT firstName, c.lastName
FROM Coach c, TeamStat ts1, TeamStat ts2, CoachSeason cs
WHERE c.cid = cs.cid AND
cs.tid = ts1.tid AND
cs.year = ts1.year AND
cs.tid = ts2.tid AND
cs.year = ts2.year AND
ts1.league = 'A' AND
ts2.league = 'N' ";  ?>
    <p><?php echo $connection->count_results($query); ?> results found.</p>
    <?php $data = $connection->fetch($query); ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
        </tr>
      </thead>
      <tbody>
      <?php if ($data): ?>
        <?php foreach ($data as $row): ?>
        <tr>
          <td><?php echo $row[0]; ?></td>
          <td><?php echo $row[1]; ?></td>
        </tr>
        <?php endforeach ?>
      <?php else: ?>
        <tr>
          <td>No results found</td>
          <td></td>
        </tr>
      <?php endif ?>
      </tbody>
    </table>
    <?php $connection->close_connection(); ?>
  </section>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>