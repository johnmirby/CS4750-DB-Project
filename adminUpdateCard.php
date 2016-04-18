<?php
	require "dbutilAdmin.php";
    session_start();
    if(isset($_SESSION["login"])) {
        $db = DbUtil::loginConnection();
        $stmt = $db->stmt_init();
        if($stmt->prepare("UPDATE Card SET Rules_Text=? WHERE Card_Name=?") or die(mysqli_error($db))) {
            $cardNameString =  $_GET['cardName'];
            $rulesTextString =  $_GET['cardRulesText'];
            $stmt->bind_param('ss', $rulesTextString, $cardNameString);
            $stmt->execute();
            $stmt->close();
        }
        $db->close();
    }
?>