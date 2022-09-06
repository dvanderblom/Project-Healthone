<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            Sportcenter
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php
        require '../Modules/Database.php';
        session_start();

        if(isset($_SESSION['loggedin'])) {
            $path = '/../logout';
        } else $path = '/../login';
                                
        ?>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/home">home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categories">sportapparaat</a>
                </li>
                <li class="nav-item">
                    <?php if(!isset($_SESSION['loggedin'])) { ?>
                    <a class="nav-link" href="/../register">registreren</a>
                    <?php }?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/../contact">contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if(isset($_SESSION['loggedin'])) { ?>
                <li class="nav-item"><a class="nav-link" href="/profiel">profiel</a></li>
                <?php }?>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $path;?>">
                        <?php 
                        if(isset($_SESSION['loggedin'])) {
                            echo 'uitloggen';
                        }   else echo 'inloggen';
                        ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
