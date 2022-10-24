<?php
    // Makes database connection.
    include_once 'includes/config.php';

    include 'includes/admin-inc.php';

    $title = 'Admin';

    include 'includes/header.php';

    if (isset($_SESSION['userId'])) {
        ?>

<!DOCTYPE html>
<html lang="en">
    <div class="center-form">
        <form class="login-form" action="admin.php" method="POST">
                <input type="text" id="team" name="team" placeholder="TEAM NAME" value="<?php echo htmlspecialchars($team, ENT_QUOTES, 'UTF-8');?>">
            <p></p>
            <?php
                if ($success == 0) {
                    echo "<p>" . $errors['team'] . "</p>";
                } elseif ($success == 1) {
                    echo "<p>Adding team now!</p>";
                }
            ?>
            <button type="submit" id="login" name="submit" value="submit">ADD TEAM</button>
        </form>
    </div>
    <?php
    } else {
        echo 'This page is only viewable to a logged in user.';
    }
?>

</body>
</html>