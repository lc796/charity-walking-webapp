<?php
    // Makes database connection.
    include_once 'includes/config.php';

    // Uses login-inc.
    include 'includes/login-inc.php';

    $title = 'Login';

    include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
    <?php 
    if (isset($_SESSION['userId'])) {
        header('Refresh:0; url=index.php');
    } else {
    ?>
    <div class="center-form">
        <form class="login-form" action="login.php" method="POST">
            <input type="text" id="username" name="username" placeholder="USERNAME" value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8');?>">
            <input type="password" id="password" name="password" placeholder="PASSWORD" value="<?php echo htmlspecialchars($password, ENT_QUOTES, 'UTF-8');?>">
            <p></p>
            <?php
                if ($success == 0) {
                    echo "<p>" . $errors['username'] . "</p>";
                    echo "<p>" . $errors['password'] . "</p>";
                } elseif ($success == 1) {
                    echo "<p>Logging you in now!</p>";
                } elseif ($success == 2) {
                    echo "<p>Incorrect username and/or password!</p>";
                }
            ?>
            <button type="submit" id="login" name="submit" value="submit">LOGIN</button>
        </form>
    </div>
    <?php
    }
    ?>
</body>
</html>