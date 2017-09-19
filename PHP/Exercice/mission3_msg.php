<style>
    ul, li{
        margin : 20px;
        font-size: 25px;
    }
</style>

<h1>Mission 3 - Message</h1>

    <ul>
        <li><a href="mission3_msg.php?pays=Francais">France</a></li>
        <li><a href="mission3_msg.php?pays=Italien">Italie</a></li>
        <li><a href="mission3_msg.php?pays=Espagnole">Espagne</a></li>
        <li><a href="mission3_msg.php?pays=Anglais">Angleterre</a></li>
    </ul>

    <?php
    echo "<hr>";

    if (!empty($_GET)) {
        echo 'Vous êtes  ' . $_GET['pays'] . ' ?';
    }
    ?>
