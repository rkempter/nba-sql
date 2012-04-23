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
    <header class="jumbotron subhead" id="overview">
      <h1>Search for keyword</h1>
      <form class="form-horizontal">
        <fieldset>
          <legend>Type whatever you're looking for</legend>
          <div class="control-group">
            <label class="control-label" for="keyword">Keyword</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="keyword">
              <p class="help-block">Mandatory</p>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" id="btn-search" class="btn btn-primary">Search</button>
            <button class="btn">Cancel</button>
          </div>
        </fieldset>
      </form>
    </header>
    <div id="data">
      
    </div>
  </section>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      /** When coming back from other page **/
      var hash = window.location.hash.slice(1);

      console.log(hash);
      $.ajax({
        type: 'POST',
        url: 'search_keyword.php',
        data: { keyword: hash },
        success: function(data) {
          $('#data').html(data);
          console.log('Load was performed.');
        }
      });

      /** Click on submit **/
      $('#btn-search').click(function(e) {
        if($('#keyword').val()) {
          window.location.hash = $('#keyword').val();
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