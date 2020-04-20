<!doctype html>

    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>PPE #1</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php
            require_once('pdo.php');
            session_start();
            $sql2='SELECT IDE from epreuve ORDER BY IDE DESC LIMIT 1';
            $req=$dbh->query($sql2);
            $last=0;
            foreach ($req as $row){
                $last=(int) $row['IDE'] + 1;
            }
            echo 'Vous avez choisi les requette sql </br>';
            for ($i=0; $i<20; $i++){
                if (isset($_POST['question'.$i]))
                    $sql[$i]='INSERT INTO epreuve (IDQ, IDE) VALUE ('.$_POST['question'.$i].', '.$last.')';
                    if (isset($sql[$i])){
                        echo $sql[$i].'</br>';
                        $res=$dbh->query($sql[$i]);
                    }
            }
            echo '</br>Pour la classe : '.$_POST['classe'];
            $sqlclasse='INSERT INTO nomepreuve (nom, IDC) VALUE ('.$_POST['nom'].', '.$_POST['classe'].')';
            $rep=$dbh->exec($sqlclasse);
            echo '</br><form class=\'deco\' action=\'redeco.php\'> <input type=\'submit\' value=\'Se deconnecter\' >';
        ?>
    </body>
</html>