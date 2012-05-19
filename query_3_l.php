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
                <li class="active"><a href="query_2_a.php">Query a</a></li>
                <li><a href="query_2_b.php">Query b</a></li>
                <li><a href="query_2_c.php">Query c</a></li>
                <li><a href="query_2_d.php">Query d</a></li>
                <li><a href="query_2_e.php">Query e</a></li>
                <li><a href="query_2_f.php">Query f</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Deliverable 3 <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="active"><a href="query_2_a.php">Query a</a></li>
                <li><a href="query_2_b.php">Query b</a></li>
                <li><a href="query_2_c.php">Query c</a></li>
                <li><a href="query_2_d.php">Query d</a></li>
                <li><a href="query_2_e.php">Query e</a></li>
                <li><a href="query_2_f.php">Query f</a></li>
                <li><a href="query_2_g.php">Query g</a></li>
                <li><a href="query_2_h.php">Query h</a></li>
                <li><a href="query_2_h.php">Query h</a></li>
                <li><a href="query_2_i.php">Query i</a></li>
                <li><a href="query_2_j.php">Query j</a></li>
                <li><a href="query_2_k.php">Query k</a></li>
                <li><a href="query_2_l.php">Query l</a></li>
                <li><a href="query_2_m.php">Query m</a></li>
                <li><a href="query_2_n.php">Query n</a></li>
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
      <h1>Query a, Deliverable 2</h1>
      <p class="lead">Print  the last  and first name  of  players/coaches who participated  in  NBA both  as  a player  and as  a 
coach.</p>
      <pre>
SELECT Distinct p.firstname, p.lastname FROM Player p, RegSeason rs
WHERE p.pid = rs.pid AND
      rs.league = 'N' AND
      p.pid IN (SELECT cs.cid FROM CoachSeason cs, TeamStat ts
                WHERE cs.tid = ts.tid AND
                      cs.year = ts.year AND
                      ts.league = 'N')
      </pre>
    </header>
    <?php $connection = new DB_Class(); ?>
    <?php $connection->connect() ?>
    <?php $query = "
SELECT Distinct p.firstname, p.lastname FROM Player p, RegSeason rs
WHERE p.pid = rs.pid AND
      rs.league = 'N' AND
      p.pid IN (SELECT cs.cid FROM CoachSeason cs, TeamStat ts
                WHERE cs.tid = ts.tid AND
                      cs.year = ts.year AND
                      ts.league = 'N')";  ?>
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
      <?php foreach ($data as $row): ?>
        <tr>
          <td><?php echo $row[0]; ?></td>
          <td><?php echo $row[1]; ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php $connection->close_connection(); ?>
  </section>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>