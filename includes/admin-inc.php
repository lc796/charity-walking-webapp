<?php
    // Start session
    session_start();

    // Define 'errors' associative array, where a string will be associated with the 'team' error or 'distance' error.
    $errors = array('team' => '');

    // Define 'success' variable as an integer (0 = unassigned, 1 = successful)
    $success = 0;

    // Define 'username' and 'password' variables. Initialise as empty strings.
    $team = "";

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

        // Do nothing with errors since they are already being handled, if 'errors' array is empty then it is safe to create new user.
        if (array_filter($errors)) {
            // Echo for debug purposes
            //echo "Errors";
        } else {
            // Echo for debug purposes
            //echo "No errors";
            $team = mysqli_real_escape_string($connection, $_POST['team']);

            $sqlInsertTeam = "INSERT INTO tbl_teams (team_name) VALUES ('$team')";
            if (mysqli_query($connection, $sqlInsertTeam)) {
                $success = 1;
            } else {
                echo "ERROR: Unable to access database: " . mysqli_error($connection);
            }

        }
    }
?>