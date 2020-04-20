<!doctype html>

    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>PPE #1</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include ('pdo.php');
            session_start();
            $sql='SELECT question FROM qcm';
            $req=$dbh->query($sql);
            echo '<form action = \'newqcm.php\' method=\'post\'>';
            $i=0;
            foreach($req as $row){
                echo '<input type=\'checkbox\' name=\'question'.$i.'\' value=\''.$i.'\'> '.$row['question'].' </br>';
                $i++;
            }
            echo 'Pour quelle classe le qcm est il ? <input name=\'classe\' type=\'number\' required></br>';
            echo '</br> Nom de l\'epreuve :  <input name=\'nom\' type=\'text\' required>';
            echo '<input type =\'reset\' value=\'reset\'><input type=\'submit\' value=\'OK\'></form>';
            echo '</br><form class=\'deco\' action=\'redeco.php\'> <input type=\'submit\' value=\'Se deconnecter\' >';
        ?>
    </body>

</html>