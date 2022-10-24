<?php
    include_once 'includes/config.php';
    
    // Start session if the session hasn't already been started by another PHP file
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
  <link rel="stylesheet" href="resources/styles/style.css">
  <style type="text/javascript" src="resources/scripts/colors.js"></style>
    <?php
    if ($title == 'Progress') {
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js"></script>
    <?php
    }
    ?>
</head>

<body>
    <div class="menu">
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="add-distance.php">ADD DISTANCE</a></li>
            <li><a href="progress.php">PROGRESS</a></li>
            <?php
            if (isset($_SESSION['userId'])) {
            ?>
                <div class="right"><li><a href="./logout.php">LOGOUT</a></li></div>
                <div class="right"><li><a href="./admin.php">ADMIN</a></li></div>
            <?php
            } else {
            ?>
                <div class="right"><li><a href="./login.php">LOGIN</a></li></div>
            <?php
            }
            ?>
        </ul>
    </div>