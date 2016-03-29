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
        <p>For competitive use!</p>
      </div>
      <ul class="nav nav-tabs nav-justified">
        <li role="presentation" class="active"><a href="#">Home</a></li>
        <li role="presentation"><a href="admin.html">Admin</a></li>
      </ul>
      <div class="col-md-4">
        <ul class="nav nav-pills nav-stacked">
          <li role="presentation"><a href="index.html">Card Search</a></li>
          <li role="presentation"><a href="expansionSearch.html">Expansion Search</a></li>
          <li role="presentation" class="active"><a href="">Banned List</a></li>
        </ul>
      </div>
      <div class="col-md-8">
        <div class="table">
        <?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select Card_Name, Format_Name from Card natural join Banned_In natural join Format") or die(mysqli_error($db))) {
                        $stmt->execute();
                        $stmt->bind_result($Card_Name, $Rules_Text);
                        echo "<table border=1><th>Card Name</th><th>Rules Text</th>\n";
                        while($stmt->fetch()) {
                                echo "<tr><td>$Card_Name</td><td>$Rules_Text</td></tr>";
                        }
                        echo "</table>";

                        $stmt->close();
                }
        ?>
        </div>
      </div>
    </div>
  </body>
<style>
body {
    padding-top: 50px;
}
.dropdown.dropdown-lg .dropdown-menu {
    margin-top: -1px;
    padding: 6px 20px;
}
.input-group-btn .btn-group {
    display: flex !important;
}
.btn-group .btn {
    border-radius: 0;
    margin-left: -1px;
}
.btn-group .btn:last-child {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}
.btn-group .form-horizontal .btn[type="submit"] {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.form-horizontal .form-group {
    margin-left: 0;
    margin-right: 0;
}
.form-group .form-control:last-child {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}
</style>
</html>
