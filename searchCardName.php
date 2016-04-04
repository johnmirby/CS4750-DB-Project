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
                        echo "<table class=\"table table-striped\"><thead><th>Card Name</th><th>Rules Text</th></thead><tbody>\n";
                        while($stmt->fetch()) {
                                echo "<tr><td>$Card_Name</td><td>$Rules_Text</td></tr>";
                        }
                        echo "</tbody></table>";

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
                        echo "<table class=\"table table-striped\"><thead><th>Card Name</th><th>Rules Text</th><th>Mana Cost</th><th>Power</th><th>Toughness</th><th>Subtype</th><th>Legendary</th></thead><tbody>\n";
                        while($stmt->fetch()) {
                                echo "<tr><td>$Card_Name</td><td>$Rules_Text</td><td>$Mana_Cost</td><td>$Power</td><td>$Toughness</td><td>$Subtype</td><td>$Legendary</td></tr>";
                        }
                        echo "</tbody></table>";

                        $stmt->close();
                }

        }
        elseif ($typeIndex == 2) {
                if($stmt->prepare("select * from Card natural join Artifact where Card_Name like ? and Rules_Text like ?") or die(mysqli_error($db))) {
                        $searchCardNameString = '%' . $_GET['searchCardName'] . '%';
                        $searchCardRulesTextString = '%' . $_GET['searchCardRulesText'] . '%';
                        $stmt->bind_param('ss', $searchCardNameString, $searchCardRulesTextString);
                        $stmt->execute();
                        $stmt->bind_result($Card_Name, $Rules_Text, $Mana_Cost, $Legendary, $Subtype);
                        echo "<table class=\"table table-striped\"><thead><th>Card Name</th><th>Rules Text</th><th>Mana Cost</th><th>Subtype</th><th>Legendary</th></thead><tbody>\n";
                        while($stmt->fetch()) {
                                echo "<tr><td>$Card_Name</td><td>$Rules_Text</td><td>$Mana_Cost</td><td>$Subtype</td><td>$Legendary</td></tr>";
                        }
                        echo "</tbody></table>";

                        $stmt->close();
                }

        }
        elseif ($typeIndex == 3) {
                if($stmt->prepare("select * from Card natural join Sorcery where Card_Name like ? and Rules_Text like ?") or die(mysqli_error($db))) {
                        $searchCardNameString = '%' . $_GET['searchCardName'] . '%';
                        $searchCardRulesTextString = '%' . $_GET['searchCardRulesText'] . '%';
                        $stmt->bind_param('ss', $searchCardNameString, $searchCardRulesTextString);
                        $stmt->execute();
                        $stmt->bind_result($Card_Name, $Rules_Text, $Mana_Cost);
                        echo "<table class=\"table table-striped\"><thead><th>Card Name</th><th>Rules Text</th><th>Mana Cost</th></thead><tbody>\n";
                        while($stmt->fetch()) {
                                echo "<tr><td>$Card_Name</td><td>$Rules_Text</td><td>$Mana_Cost</td></tr>";
                        }
                        echo "</tbody></table>";

                        $stmt->close();
                }

        }
        elseif ($typeIndex == 4) {
                if($stmt->prepare("select * from Card natural join Instant where Card_Name like ? and Rules_Text like ?") or die(mysqli_error($db))) {
                        $searchCardNameString = '%' . $_GET['searchCardName'] . '%';
                        $searchCardRulesTextString = '%' . $_GET['searchCardRulesText'] . '%';
                        $stmt->bind_param('ss', $searchCardNameString, $searchCardRulesTextString);
                        $stmt->execute();
                        $stmt->bind_result($Card_Name, $Rules_Text, $Mana_Cost);
                        echo "<table class=\"table table-striped\"><thead><th>Card Name</th><th>Rules Text</th><th>Mana Cost</th></thead><tbody>\n";
                        while($stmt->fetch()) {
                                echo "<tr><td>$Card_Name</td><td>$Rules_Text</td><td>$Mana_Cost</td></tr>";
                        }
                        echo "</tbody></table>";

                        $stmt->close();
                }

        }
        elseif ($typeIndex == 5) {
                if($stmt->prepare("select * from Card natural join Enchantment where Card_Name like ? and Rules_Text like ?") or die(mysqli_error($db))) {
                        $searchCardNameString = '%' . $_GET['searchCardName'] . '%';
                        $searchCardRulesTextString = '%' . $_GET['searchCardRulesText'] . '%';
                        $stmt->bind_param('ss', $searchCardNameString, $searchCardRulesTextString);
                        $stmt->execute();
                        $stmt->bind_result($Card_Name, $Rules_Text, $Mana_Cost, $Legendary, $Subtype);
                        echo "<table class=\"table table-striped\"><thead><th>Card Name</th><th>Rules Text</th><th>Mana Cost</th><th>Subtype</th><th>Legendary</th></thead><tbody>\n";
                        while($stmt->fetch()) {
                                echo "<tr><td>$Card_Name</td><td>$Rules_Text</td><td>$Mana_Cost</td><td>$Subtype</td><td>$Legendary</td></tr>";
                        }
                        echo "</tbody></table>";

                        $stmt->close();
                }

        }
        elseif ($typeIndex == 6) {
                if($stmt->prepare("select * from Card natural join Planeswalker where Card_Name like ? and Rules_Text like ?") or die(mysqli_error($db))) {
                        $searchCardNameString = '%' . $_GET['searchCardName'] . '%';
                        $searchCardRulesTextString = '%' . $_GET['searchCardRulesText'] . '%';
                        $stmt->bind_param('ss', $searchCardNameString, $searchCardRulesTextString);
                        $stmt->execute();
                        $stmt->bind_result($Card_Name, $Rules_Text, $Mana_Cost, $Loyalty, $Planeswalker_Name);
                        echo "<table class=\"table table-striped\"><thead><th>Card Name</th><th>Rules Text</th><th>Mana Cost</th><th>Planeswalker</th><th>Loyalty</th></thead><tbody>\n";
                        while($stmt->fetch()) {
                                echo "<tr><td>$Card_Name</td><td>$Rules_Text</td><td>$Mana_Cost</td><td>$Planeswalker_Name</td><td>$Loyalty</td></tr>";
                        }
                        echo "</tbody></table>";

                        $stmt->close();
                }

        }
        elseif ($typeIndex == 7) {
                if($stmt->prepare("select * from Card natural join Land where Card_Name like ? and Rules_Text like ?") or die(mysqli_error($db))) {
                        $searchCardNameString = '%' . $_GET['searchCardName'] . '%';
                        $searchCardRulesTextString = '%' . $_GET['searchCardRulesText'] . '%';
                        $stmt->bind_param('ss', $searchCardNameString, $searchCardRulesTextString);
                        $stmt->execute();
                        $stmt->bind_result($Card_Name, $Rules_Text, $Legendary, $Subtype);
                        echo "<table class=\"table table-striped\"><thead><th>Card Name</th><th>Rules Text</th><th>Subtype</th><th>Legendary</th></thead><tbody>\n";
                        while($stmt->fetch()) {
                                echo "<tr><td>$Card_Name</td><td>$Rules_Text</td><td>$Subtype</td><td>$Legendary</td></tr>";
                        }
                        echo "</tbody></table>";

                        $stmt->close();
                }

        }

        $db->close();


?>
