<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=mardi;charset=utf8','root','');

    echo "ok";
} catch (PDOException $e) {
    echo "Impossible de se connecter.";
    exit;
}
// Récupérer tous contacts de ma bdd
$req = $bdd->query('SELECT * FROM contacts ORDER BY co_name ASC, co_firstname ASC')
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <table>
            <?php while ($datas = $req->fetch()){ ?>
            <tr>
                <td><?php echo $datas['co_name']; ?></td>
                <td><?php echo $datas['co_firstname']; ?></td>
                <td><?php echo $datas['co_gender']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
