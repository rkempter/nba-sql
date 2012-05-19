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
                <li class="active"><a href="query_3_a.php">Query a</a></li>
                <li><a href="query_3_b.php">Query b</a></li>
                <li><a href="query_3_c.php">Query c</a></li>
                <li><a href="query_3_d.php">Query d</a></li>
                <li><a href="query_3_e.php">Query e</a></li>
                <li><a href="query_3_f.php">Query f</a></li>
                <li><a href="query_3_g.php">Query g</a></li>
                <li><a href="query_3_h.php">Query h</a></li>
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
      <h1>Execute a query</h1>
    </header>
    <form class="form-horizontal">
      <fieldset>
        <legend>Type in your query you would like to execute</legend>
        <div class="control-group">
          <label class="control-label" for="query">Query</label>
          <div class="controls">
            <textarea name="query" id="query" cols="30" rows="10"></textarea>
          </div>
        </div>
        <div class="form-actions">
          <button id="btn-query" type="submit" class="btn btn-primary">Execute query</button>
          <button class="btn">Cancel</button>
        </div>
      </fieldset>
    </form>
    <article id="data">
      
    </article>
  </section>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {

      /** Click on submit **/
      $('#btn-query').click(function(e) {
        console.log($('#query').val());
        if($('#query').val()) {
          $.ajax({
            type: 'POST',
            url: 'query_execute.php',
            data: { query: $('#query').val() },
            success: function(data) {
              $('#data').html(data);
              console.log('Data: '+data);
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