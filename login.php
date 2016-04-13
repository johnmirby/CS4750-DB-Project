<?php
require("dbutil.php");
$db = DbUtil::loginConnection();

$stmt = $db->stmt_init();

$un = $_GET["username"];
$pwd = md5($_GET["password"]);
$found = 0;
if ($stmt->prepare("select * from User where Username = ? and Password = ?")) {
  mysqli_stmt_bind_param($stmt, "ss", $un, $pwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $result);

  if (mysqli_stmt_fetch($stmt)) {
      $found = 5;
  }
  $stmt->close();
}
echo $found;
$db->close();
 ?>