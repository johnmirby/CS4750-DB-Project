<?php
	require "dbutilAdmin.php";
    session_start();
    if(isset($_SESSION["login"])) {
        $db = DbUtil::loginConnection();
        $stmt = $db->stmt_init();
        if($stmt->prepare("INSERT INTO Card (Card_Name, Rules_Text) VALUES (?, ?)") or die(mysqli_error($db))) {
            $cardNameString =  $_GET['cardName'];
            $rulesTextString =  $_GET['cardRulesText'];
            $stmt->bind_param('ss', $cardNameString, $rulesTextString);
            $stmt->execute();
            $stmt->close();
        }
        $db->close();
    }
?>