<?php
    // Makes database connection.
    include_once 'includes/config.php';

    include 'includes/progress-inc.php';

    $title = 'Progress';

    include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
    <div class="content">
        <div class="section">
            <h1>So far we have walked 
                <?php
                    $sqlGetTotalDistance = "SELECT distance_walked_miles FROM tbl_distance_travelled";
                    $total = 0;
                    if (mysqli_query($connection, $sqlGetTotalDistance)) {
                        $allDistanceRows = mysqli_query($connection, $sqlGetTotalDistance);
                        foreach ($allDistanceRows as $row) {
                            $total += $row['distance_walked_miles'];
                        }
                    }
                    echo "<span class=\"total-walked\">" . $total . "</span>";
                ?>
                 miles!
            </h1>
            <br><br>
            <div class="chart-container">
                <canvas class="chart" id="myChart" width="400" height="400"></canvas>
            </div>

    <script>
        var labelValues = [
        ];
        
        var dataValues = [
        ];

        var oReq = new XMLHttpRequest(); // New request object
        var responseData;
        oReq.onload = function() {
            responseData = JSON.parse(this.responseText);
            for (var key of Object.keys(responseData)) {
                labelValues.push(key);
                dataValues.push(responseData[key]);
            }   
        };
        oReq.open("get", "get-data.php", false);
        oReq.send();

        var myChart = new Chart(document.getElementById('myChart'), {
            type: 'bar',
            data: {
                labels: labelValues,
                datasets: [{
                    label: 'Distance walked by each team',
                    data: dataValues,
                    backgroundColor: 'rgba(200, 79, 79, 0.45)',
                    borderColor: 'rgba(200, 79, 79, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        }
        );
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.0/dist/chart.min.js"></script>

</body>
</html>