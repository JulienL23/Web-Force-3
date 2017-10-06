<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="description" content="Site CV">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC|Sedgwick+Ave+Display|Lobster" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/site_cv.css">
    <link rel="icon" href="img/logo_J.png">
    <title>Site CV Julien <?= $page ?></title>
</head>
<body>
    <main>
        <header>
            <div class="photo">
                <img src="img/logo_J.png" alt="">
            </div>
            <div class="slogan">
                <h1>Julien Ledoux<hr><hr></h1>
                <h2>Intégrateur / Développeur Web Junior</h2>
            </div>
            <div class="social">
                <a href="https://www.instagram.com" target="_blank">
                <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="https://www.facebook.com/julien.ledoux.16503" target="_blank">
                <i class="fa fa-facebook-square" aria-hidden="true" "insta"></i>
                </a>
                <a href="https://www.linkedin.com/in/julien-ledoux-932585145/" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
            </div>
            <div class="clear"></div>
        </header>
        <nav>
            <div class="coordo">
                <ul>
                    <li><i class="fa fa-bolt" aria-hidden="true"></i> Julien Ledoux</li>
                    <li><i class="fa fa-bolt" aria-hidden="true"></i> 24 ans</li>
                </ul>
            </div>
            <div class="menu">

                <a href="site_cv.php" class="<?=( $page == 'site_cv') ? 'activ' : '' ?>">Accueil</a>
                <a href="experience.php" class="<?=( $page == 'Expériences & Formations') ? 'activ' : '' ?>">Expériences & Formations</a>
                <a href="bonus.php" class="<?=( $page == 'Bonus') ? 'activ' : '' ?>">Bonus</a>

                <div class="clear"></div>
            </div>
        </nav>
