<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        $searchIndex = $_GET['searchIndex'];

        if ($searchIndex == 0) {
                if($stmt->prepare("select * from Expansion where Expansion_Name like ?") or die(mysqli_error($db))) {
                        $searchExpansionNameString = '%' . $_GET['searchExpansionName'] . '%';
                        $stmt->bind_param('s', $searchExpansionNameString);
                        $stmt->execute();
                        $stmt->bind_result($Expansion_Code, $Expansion_Name, $Release_Date, $Block, $Border);
                        echo "<table border=1><th>Expansion Name</th><th>Expansion Code</th><th>Release Date</th><th>Block</th><th>Card Border</th>\n";
                        while($stmt->fetch()) {
                                echo "<tr><td>$Expansion_Name</td><td>$Expansion_Code</td><td>$Release_Date</td><td>$Block</td><td>$Border</td></tr>";
                        }
                        echo "</table>";

                        $stmt->close();
                }
        }
        elseif ($searchIndex == 1) {
                if($stmt->prepare("select * from Printed_In natural join Expansion where Expansion_Name like ? and Card_Name like ?") or die(mysqli_error($db))) {
                        $searchExpansionNameString = '%' . $_GET['searchExpansionName'] . '%';
                        $searchCardNameString = '%' . $_GET['searchCardNameText'] . '%';
                        $stmt->bind_param('ss', $searchExpansionNameString, $searchCardNameString);
                        $stmt->execute();
                        $stmt->bind_result($Expansion_Code, $Card_Name, $Expansion_Name, $Release_Date, $Block, $Border);
                        echo "<table border=1><th>Card Name</th><th>Expansion Name</th><th>Expansion Code</th><th>Release Date</th><th>Block</th><th>Card Border</th>\n";
                        while($stmt->fetch()) {
                                echo "<tr><td>$Card_Name</td><td>$Expansion_Name</td><td>$Expansion_Code</td><td>$Release_Date</td><td>$Block</td><td>$Border</td></tr>";
                        }
                        echo "</table>";

                        $stmt->close();
                }
        }

        $db->close();


?>
