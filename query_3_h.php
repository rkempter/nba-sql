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
                <li><a href="query_3_a.php">Query a</a></li>
                <li><a href="query_3_b.php">Query b</a></li>
                <li><a href="query_3_c.php">Query c</a></li>
                <li><a href="query_3_d.php">Query d</a></li>
                <li><a href="query_3_e.php">Query e</a></li>
                <li><a href="query_3_f.php">Query f</a></li>
                <li><a href="query_3_g.php">Query g</a></li>
                <li class="active"><a href="query_3_h.php">Query h</a></li>
                <li><a href="query_3_h.php">Query h</a></li>
                <li><a href="query_3_i.php">Query i</a></li>
                <li><a href="query_3_j.php">Query j</a></li>
                <li><a href="query_3_k.php">Query k</a></li>
                <li><a href="query_3_l.php">Query l</a></li>
                <li><a href="query_3_m.php">Query m</a></li>
                <li><a href="query_3_n.php">Query n</a></li>
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
      <h1>Query h, Deliverable 3</h1>
      <p class="lead">List the last and first names of the top 30 TENDEX players, ordered by descending TENDEX value (Use
season stats). (TENDEX=(points+reb+ass+st+blk-missedFT-missedFG-TO)/minutes)</p>
      <pre>
SELECT p.lastname, p.firstname
FROM Player p, RegCareer rc
WHERE p.pid = rc.pid
ORDER BY ((rc.pts+rc.reb+rc.asts+rc.stl+rc.blk-rc.ftm-rc.fgm-rc.turnover)/ rc.minutes) DESC
LIMIT 30
      </pre>
    </header>
    <?php $connection = new DB_Class(); ?>
    <?php $connection->connect() ?>
    <?php $query = "
SELECT p.firstname, p.lastname
FROM Player p, RegCareer rc
WHERE p.pid = rc.pid
ORDER BY ((rc.pts+rc.reb+rc.asts+rc.stl+rc.blk-rc.ftm-rc.fgm-rc.turnover)/ rc.minutes) DESC
LIMIT 30";  ?>
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