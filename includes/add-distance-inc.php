<?php
    // Start session
    session_start();

    // Define 'errors' associative array, where a string will be associated with the 'team' error or 'distance' error.
    $errors = array('team' => '', 'distance' => '', 'unit' => '');

    // Define 'success' variable as an integer (0 = unassigned, 1 = successful)
    $success = 0;

    // Define 'username' and 'password' variables. Initialise as empty strings.
    $team = "";
    $distance = "";
    $unit = "";

    // When login.php is called (either through clicking button on form, or by loading page), checks to see if the button (with name of 'submit') has been posted to the server, and if so, will run code inside if statement.
    if (isset($_POST['submit'])) {
        // Validation routines

        // TEAM
        // Presence check
        if (empty($_POST['team'])) {
            $errors['team'] = 'Please ensure you enter a team.';
        } else {
            $team = $_POST['team'];
        }

        // DISTANCE
        // Presence check
        if (empty($_POST['distance'])) {
            $errors['distance'] = 'Please ensure you enter a distance. ';
        } else {
            if (!is_numeric($_POST['distance'])) {
                $errors['distance'] = 'Please ensure your input is numerical. ';
            } else {
                if ($_POST['distance'] <= 0) {
                    $errors['distance'] = 'Please ensure you enter a distance greater than 0. ';
                } else {
                    $distance = $_POST['distance'];
                }
            }
        }

        // UNIT
        // Presence check
        if (empty($_POST['unit'])) {
            $errors['unit'] = 'Please ensure you enter a unit.';
        } else {
            $unit = $_POST['unit'];
        }

        // Do nothing with errors since they are already being handled, if 'errors' array is empty then it is safe to create new user.
        if (array_filter($errors)) {
            // Echo for debug purposes
            //echo "Errors";
        } else {
            // Echo for debug purposes
            //echo "No errors";
            $team = mysqli_real_escape_string($connection, $_POST['team']);
            $distance = mysqli_real_escape_string($connection, $_POST['distance']);

            // Convert distance to miles
            if ($unit == 'kilometers') {
                $distance = $distance / 1.6;
            } elseif ($unit == 'steps') {
                $distance = $distance / 2500;
            }

            $teamName = '';
            $sqlGetTeamNameFromId = "SELECT team_name FROM tbl_teams WHERE team_id='$team'";
            if (mysqli_query($connection, $sqlGetTeamNameFromId)) {
                $selectedTeamName = mysqli_query($connection, $sqlGetTeamNameFromId);
                $row = mysqli_fetch_assoc($selectedTeamName);
                if (!is_null($row)) {
                    $teamName = $row['team_name'];
                }
            }

            $sqlInsertTeamDistance = "INSERT INTO tbl_distance_travelled (team_id, distance_walked_miles, log_date) VALUES ('$team', '$distance', NOW())";
            if (mysqli_query($connection, $sqlInsertTeamDistance)) {
                $success = 1;
                $log = fopen("data.log", "a");
                $dataToWrite = "[" . date("d/m/y h:i:sa") . "] " . $distance . " more miles walked by " . $teamName . ".\n"; 
                fwrite($log, $dataToWrite);
                fclose($log);
            } else {
                echo "ERROR: Unable to access database: " . mysqli_error($connection);
            }

        }
    }
?>