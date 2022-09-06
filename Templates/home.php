<!DOCTYPE html>
    <html>
    <?php
    include_once('defaults/head.php');
    ?>
    <body>
        <div class="container">
            <?php
            include_once ('defaults/header.php');
            include_once ('defaults/menu.php');
            include_once ('defaults/pictures.php');

            if(isset($_SESSION['loggedin']) && isset($_SESSION['fullname'])) {
                $loggedIn = $_SESSION['loggedin'];
                $fullName = $_SESSION['fullname'];
            }

            if(isset($_SESSION['loggedin'])) {
                echo "<div class='wrapper'>";
                    echo('<h3>Welkom '.$fullName.'</h3><br><br>'); 
                    echo('<div class="row" style="margin-top: -20px">');
                        echo('<div class="col-md-6">');
                            echo('<p>Fit en gezond zijn is geen vanzelfsprekendheid. We moeten er zelf wat voor doen.<br><br> Goede, gezonde voeding is hiervoor de basis.
                            Bewegen hoort hier ook bij. Regelmatig bewegen zorgt voor een goede doorbloeding en draagt bij aan ontspanning van lichaam en geest.
                            Sporten is goed voor sterkere spieren en voor de conditie.<br><br> Sportcenter HealthOne heeft verschillende sportapparaten om mee te kunnen werken aan je conditie. Onder andere: roeitrainers, loopbanden, crosstrainers, en meer. Klik <a href="/categories">hier</a> om de verschillende sport-apparaten te bekijken.</p>');
                        echo('</div>');
                        echo('<div class="col-md-6">');
                            echo('<img style="margin-top: -40px" class="img-fluid" src="../img/loopbanden.jpeg">');
                        echo('</div>');
                    echo('<div>');
                echo "<div class='container'>";
            } else {
                echo('<h4>Sportcenter HealthOne</h4>');
                echo('Fit en gezond zijn is geen vanzelfsprekendheid. We moeten er zelf wat voor doen. Goede, gezonde voeding is hiervoor de basis.
                Bewegen hoort hier ook bij. Regelmatig bewegen zorgt voor een goede doorbloeding en draagt bij aan ontspanning van lichaam en geest.
                Sporten is goed voor sterkere spieren en voor de conditie. Sportcenter HealthOne heeft verschillende sportapparaten om mee te kunnen werken aan je conditie.');
            }
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
