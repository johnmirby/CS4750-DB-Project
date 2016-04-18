<?php
	require "dbutilAdmin.php";
    session_start();
    if(isset($_SESSION["login"])) {
        $db = DbUtil::loginConnection();
        $stmt = $db->stmt_init();
        if($stmt->prepare("DELETE FROM Card WHERE Card_Name = ?") or die(mysqli_error($db))) {
            $cardNameString =  $_GET['cardName'];
            $stmt->bind_param('s', $cardNameString);
            $stmt->execute();
            $stmt->close();
        }
        $db->close();
    }
?>