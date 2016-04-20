<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Magic the Gathering Card Tool</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/pages.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  </head>
  <body>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <div class="container" id="ParentDiv">
      <div class="jumbotron">
        <h1>MTG Card Tool</h1>
      </div>
      <ul class="nav nav-tabs nav-justified">
        <li role="presentation" class="active"><a href="#">Home</a></li>
        <li role="presentation"><a href="admin-login.html">Admin</a></li>
      </ul>
      <div>
        <br>
      </div>
      <div class="col-md-4">
        <ul class="nav nav-pills nav-stacked">
          <li role="presentation"><a href="index.html">Card Search</a></li>
          <li role="presentation"><a href="expansionSearch.html">Expansion Search</a></li>
          <li role="presentation" class="active"><a href="">Banned List</a></li>
        </ul>
      </div>
      <div class="col-md-8">
        <div class="table" id="query-table">
        <?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select * from Banned_List") or die(mysqli_error($db))) {
                        $stmt->execute();
                        $stmt->bind_result($Card_Name, $Format_Name);
                        echo "<table class=\"table table-striped\"><thead><th>Card Name</th><th>Format Name</th></thead><tbody>\n";
                        while($stmt->fetch()) {
                                echo "<tr><td>$Card_Name</td><td>$Format_Name</td></tr>";
                        }
                        echo "</tbody></table>";

                        $stmt->close();
                }
        ?>
        </div>
      </div>
    </div>
  </body>
</html>
