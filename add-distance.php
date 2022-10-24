<?php
    // Makes database connection.
    include_once 'includes/config.php';

    include 'includes/add-distance-inc.php';

    $title = 'Add distance';

    include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
    <div class="center-form">
        <form class="login-form" action="add-distance.php" method="POST">
            <select name="team" id="team">
                <?php
                    $sqlGetTeams = "SELECT team_id,team_name FROM tbl_teams";
                    if (mysqli_query($connection, $sqlGetTeams)) {
                        $selectedTeams = mysqli_query($connection, $sqlGetTeams);
                        foreach ($selectedTeams as $selectedTeam) {
                            $teamId = $selectedTeam['team_id'];
                            $teamName = $selectedTeam['team_name'];
                            echo "<option value=\"" . $teamId . "\">" . $teamName . "</option>";  
                        }
                    }        
                ?>
            </select>
            <div class="distance-unit-selection-row">
                <div class="distance-block">
                    <input type="text" id="distance" name="distance" placeholder="DISTANCE" value="<?php echo htmlspecialchars($distance, ENT_QUOTES, 'UTF-8');?>">
                </div>
                <div class="unit-block">
                    <select name="unit" id="unit">
                        <option value="miles">Miles</option>
                        <option value="kilometers">Kilometers</option>
                        <option value="steps">Steps</option>
                    </select>
                </div>
            </div>
            <p></p>
            <?php
                if ($success == 0) {
                    echo "<p>" . $errors['team'] . "</p>";
                    echo "<p>" . $errors['distance'] . "</p>";
                } elseif ($success == 1) {
                    echo "<p>Adding your distance walked now!</p>";
                }
            ?>
            <button type="submit" id="login" name="submit" value="submit">SUBMIT</button>
        </form>
    </div>
</body>
</html>