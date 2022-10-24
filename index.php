<?php
    // Other includes and such
    $title = 'We Would Walk 500 Miles!';
?>

<!DOCTYPE html>
<html lang="en">
<?php 
    include_once './includes/header.php';
?>
    <div class="content">
        <div class="section">
            <h1>WE WOULD WALK 500 MILES!</h1>
            <hr>
            <h3>So far we have walked 
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
            </h3>
            <hr>
            <p>We are taking on this hefty challenge of walking 500 miles each, to raise money for The Markfield Project, a wonderful Tottenham based charity who you can find out more about below. We're walking in honour of a very special woman: Margaret Collishaw, who loved the charity and the work they do.</p> 

            <p>Margaret sadly passed away, quite unexpectedly, while in Australia. Though she had family by her side, there were many members of her family (including her daughter) who were not able to be there with her to say goodbye. In honour of that we are each taking a step (or 500) to metaphorically close that gap between Margaret and the family that couldn't be by her side as they'd hoped.</p> 

            <p>With enough of us walking 500 miles each, we aim to collectively cover enough mileage to reach Australia!</p> 

            <p>Please help to make our steps count by donating whatever you can spare, in her honour, to a charity that does such important work.</p>
            
            <br>
            <a class="support" href="https://justgiving.com/fundraising/andre-dais"><div class="support-button">SUPPORT</div></a>
            <br>
            <div class="photos">
                <img class="about-image" src="resources/images/1.jpg" alt="">
                <img class="about-image" src="resources/images/2.jpg" alt="">
                <img class="about-image" src="resources/images/3.jpg" alt="">
                <img class="about-image" src="resources/images/4.jpg" alt="">
                <img class="about-image" src="resources/images/5.jpg" alt="">
                <img class="about-image" src="resources/images/6.jpg" alt="">
                <img class="about-image" src="resources/images/7.jpg" alt="">
                <img class="about-image" src="resources/images/8.jpg" alt="">
                <img class="about-image" src="resources/images/9.jpg" alt="">
                <img class="about-image" src="resources/images/10.jpg" alt="">
                <img class="about-image" src="resources/images/11.jpg" alt="">
                <img class="about-image" src="resources/images/12.jpg" alt="">
                <img class="about-image" src="resources/images/13.jpg" alt="">
                <img class="about-image" src="resources/images/14.jpg" alt="">
                <img class="about-image" src="resources/images/15.jpg" alt="">
                <img class="about-image" src="resources/images/16.jpg" alt="">
                <img class="about-image" src="resources/images/17.jpg" alt="">
                <img class="about-image" src="resources/images/18.jpg" alt="">
                <img class="about-image" src="resources/images/19.jpg" alt="">
                <img class="about-image" src="resources/images/20.jpg" alt="">
                <img class="about-image" src="resources/images/21.jpg" alt="">
                <img class="about-image" src="resources/images/22.jpg" alt="">
                <img class="about-image" src="resources/images/23.jpg" alt="">
                <img class="about-image" src="resources/images/24.jpg" alt="">
                <img class="about-image" src="resources/images/25.jpg" alt="">
                <img class="about-image" src="resources/images/26.jpg" alt="">
                <img class="about-image" src="resources/images/27.jpg" alt="">
                <img class="about-image" src="resources/images/28.jpg" alt="">
                <img class="about-image" src="resources/images/29.jpg" alt="">
                <img class="about-image" src="resources/images/30.jpg" alt="">
                <img class="about-image" src="resources/images/31.jpg" alt="">
                <img class="about-image" src="resources/images/32.jpg" alt="">
                <img class="about-image" src="resources/images/33.jpg" alt="">
                <img class="about-image" src="resources/images/34.jpg" alt="">
                <img class="about-image" src="resources/images/35.jpg" alt="">
                <img class="about-image" src="resources/images/36.jpg" alt="">
                <img class="about-image" src="resources/images/37.jpg" alt="">
                <img class="about-image" src="resources/images/38.jpg" alt="">
                <img class="about-image" src="resources/images/39.jpg" alt="">
                <img class="about-image" src="resources/images/40.jpg" alt="">
                <img class="about-image" src="resources/images/41.jpg" alt="">

            </div>
        </div>
        <div class="section">
            <h1>MORE ABOUT THE MARKFIELD PROJECT</h1>
            <hr>
            <p>"Markfield was established in 1979 by parents of disabled children, whose vision was to create an inclusive place for disabled and non-disabled children to play. Markfield became a charity and limited company in 1983. A Victorian pump house in Tottenham was refurbished to create a unique community centre, opened by Diana Princess of Wales in 1986."</p>

            <p>Visit their page for more information <a href="https://markfield.org.uk/about-markfield/">here!</a></p>
        </div>
    </div>
</body>
<footer>
    <script type="text/javascript" src="./resources/scripts/colors.js"></script>
</footer>
</html>