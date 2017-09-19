<style>
    label, select, input{
        float : left;
        margin: 5px;
        padding: 2px;
    }

</style>
<h1>Mission 2 - Date de naissance</h1>

<form action="" method="post">

    <label>Jour  </label>
    <select name="jour">
        <?php
        for($i = 1; $i <= 31; $i++){
            echo '<option>' . substr('0'.$i, -2) . '</option>';
        }
        ?>
    </select>


    <label>Mois  </label>
    <select name="mois">
        <?php
        $arrayMois = array(1=>'Janvier', 2=>'Février', 3=>'Mars', 4=>'Avril', 5=>'Mai', 6=>'Juin', 7=>'Juillet', 8=>'Aout', 9=>'Septembre', 10=>'Octobre', 11=>'Novembre', 12=>'Decembre');
        foreach($arrayMois as $numero => $nom) {

            echo '<option value="' . $numero . '">'.$nom.'</option>';
        }

        ?>
    </select>


    <label>Année  </label>
    <select name="annee">
        <?php
            $i = date('Y');
            while($i >= 1900 ){
                echo '<option>' . $i . '</option>';
                $i --;
            }
        ?>
    </select>


    <input type="submit" value="Envoi">
</form>
