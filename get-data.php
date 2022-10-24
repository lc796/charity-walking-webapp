<?php
    include_once 'includes/config.php';

    $sqlGetTeams = "SELECT team_id,team_name FROM tbl_teams";
    $teamDistances = array();
    if (mysqli_query($connection, $sqlGetTeams)) {
        $selectedTeams = mysqli_query($connection, $sqlGetTeams);
        foreach ($selectedTeams as $selectedTeam) {
            $teamId = $selectedTeam['team_id'];
            $teamName = $selectedTeam['team_name'];
            $sqlGetDistanceTravelledByTeam = "SELECT distance_walked_miles FROM tbl_distance_travelled WHERE team_id='$teamId'";
            if (mysqli_query($connection, $sqlGetDistanceTravelledByTeam)) {
                $distancesWalked = mysqli_query($connection, $sqlGetDistanceTravelledByTeam);
                $cumulativeDistanceWalked = 0;
                foreach ($distancesWalked as $distanceWalked) {
                    $cumulativeDistanceWalked += intval($distanceWalked['distance_walked_miles']);
                }
                $teamDistances[$teamName] = $cumulativeDistanceWalked;
            }

        }
    }

    echo json_encode($teamDistances);
?>