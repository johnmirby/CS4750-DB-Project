<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        $typeIndex = $_GET['typeIndex'];

        if ($typeIndex == 0) {
                if($stmt->prepare("select * from Card where Card_Name like ? and Rules_Text like ?") or die(mysqli_error($db))) {
                        $searchCardNameString = '%' . $_GET['searchCardName'] . '%';
                        $searchCardRulesTextString = '%' . $_GET['searchCardRulesText'] . '%';
                        $stmt->bind_param('ss', $searchCardNameString, $searchCardRulesTextString);
                        $stmt->execute();
                        $stmt->bind_result($Card_Name, $Rules_Text);
                        echo "<table border=1><th>Card Name</th><th>Rules Text</th>\n";
                        while($stmt->fetch()) {
                                echo "<tr><td>$Card_Name</td><td>$Rules_Text</td></tr>";
                        }
                        echo "</table>";

                        $stmt->close();
                }
        }
        elseif ($typeIndex == 1) {
                if($stmt->prepare("select * from Card natural join Creature where Card_Name like ? and Rules_Text like ?") or die(mysqli_error($db))) {
                        $searchCardNameString = '%' . $_GET['searchCardName'] . '%';
                        $searchCardRulesTextString = '%' . $_GET['searchCardRulesText'] . '%';
                        $stmt->bind_param('ss', $searchCardNameString, $searchCardRulesTextString);
                        $stmt->execute();
                        $stmt->bind_result($Card_Name, $Rules_Text, $Mana_Cost, $Power, $Subtype, $Toughness, $Legendary);
                        echo "<table border=1><th>Card Name</th><th>Rules Text</th><th>Mana Cost</th><th>Power</th><th>Toughness</th><th>Subtype</th><th>Legendary</th>\n";
                        while($stmt->fetch()) {
                                echo "<tr><td>$Card_Name</td><td>$Rules_Text</td><td>$Mana_Cost</td><td>$Power</td><td>$Toughness</td><td>$Subtype</td><td>$Legendary</td></tr>";
                        }
                        echo "</table>";

                        $stmt->close();
                }
        }

        $db->close();


?>