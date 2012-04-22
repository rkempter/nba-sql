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
              <a href="file.html">Search for Keyword</a>
            </li>
            <li class="">
              <a href="insert_data.html">Insert elements</a>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Deliverable 2 <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="query_2_a.php">Query a</a></li>
                <li><a href="query_2_b.php">Query b</a></li>
                <li class="active"><a href="query_2_c.php">Query c</a></li>
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
  <header>
    <h1></h1>
  </header>
  <section class="container content">
    <header class="jumbotron subhead" id="overview">
      <h1>Query c, Deliverable 2</h1>
      <p class="lead">Print the name  of  the school  with  the highest number  of  players sent  to  the NBA.</p>
      <pre>
SELECT college
FROM Player
WHERE college IS NOT NULL
GROUP BY college
HAVING COUNT(*) >= (SELECT MAX(t1.cnt) FROM
                       (SELECT college, Count(college) AS cnt
                       FROM Player
                       GROUP BY college) AS t1)
      </pre>
    </header>
    <?php $connection = new DB_Class(); ?>
    <?php $connection->connect() ?>
    <?php $query = "
  SELECT college
  FROM Player
  WHERE college IS NOT NULL
  GROUP BY college
  HAVING COUNT(*) >= (SELECT MAX(t1.cnt) FROM
                       (SELECT college, Count(college) AS cnt
                       FROM Player
                       GROUP BY college) AS t1)";  ?>
    <?php $data = $connection->fetch($query); ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>College</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($data as $row): ?>
        <tr>
          <td><?php echo $row[0]; ?></td>
        </tr>
      <?php endforeach ?>
      </tbody>
    </table>
    <?php $connection->close_connection(); ?>
  </section>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>