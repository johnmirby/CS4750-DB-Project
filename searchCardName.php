<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();
        if($stmt->prepare("select Card_Name from Card where Card_Name like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchCardName'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($Card_Name);
                echo "<table class=\"table table-hover\"><thead><th>Card Name</th></thead><tbody>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$Card_Name</td></tr>";
                }
                echo "</tbody></table>";

                $stmt->close();
        }

        $db->close();


?>
