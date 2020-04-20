<!doctype html>

    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>PPE #1</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <?php
            session_start();
            include('pdo.php');
            if ($_SESSION['role'] == 'eleve'){
                echo '<h1>QCM classe '.$_SESSION['classe'].'</h1>';
                $nom = 'SELECT Nom FROM nomepreuve WHERE IDC = (SELECT classe.ID FROM classe, eleve WHERE eleve.classe = classe.ID AND eleve.nom = \''.$_SESSION['login'].'\')';
                $res = $dbh->query($nom);
                foreach ($res as $nom){
                    echo '<table><thead><td>'.$nom['Nom'].'</td></thead>';
                } 
                $sql = 'SELECT qcm.question, qcm.ID FROM qcm, epreuve, nomepreuve WHERE nomepreuve.IDC = (SELECT classe.ID FROM classe, eleve WHERE eleve.classe = classe.ID AND eleve.nom = \''.$_SESSION['login'].'\') AND epreuve.IDE = nomepreuve.IDE AND qcm.ID = epreuve.IDQ';
                $ref = $dbh->query($sql);
                $compte = 0;
                $ligne = 0;     //compteur pour les ligne en blanc/beige
                foreach ($ref as $row){
                    if($ligne%2 == 0){
                        echo '<tr bgcolor=\'aqua\'><td>'.$row['question'].'</td>';
                            $reponse = 'SELECT reponse FROM reponses WHERE IDQ = \''.$row['ID'].'\'';
                            //echo $reponse;
                            $ret = $dbh->query($reponse);
                            foreach ($ret as $row){
                                echo '<td><input type=\'radio\' name=\'rep'.$compte.'\'>'.$row['reponse'].'</td>';
                            }
                            $compte++;  
                    echo '</tr>';
                    $ligne++;
                    }
                    else if ($ligne%2 == 1){
                        echo '<tr bgcolor=\'beige\'><td>'.$row['question'].'</td>';
                            $reponse = 'SELECT reponse FROM reponses WHERE IDQ = \''.$row['ID'].'\'';
                            //echo $reponse;
                            $ret = $dbh->query($reponse);
                            foreach ($ret as $row){
                                echo '<td><input type=\'radio\' name=\'rep'.$compte.'\'>'.$row['reponse'].'</td>';
                            }
                            $compte++;  
                            $ligne++;
                    echo '</tr>';
                    }
                }            
                echo '</table>';    

            }
            else if ($_SESSION['role'] == 'prof'){
                echo 'Cette page est reservée au élève';
            }
            else {
                echo 'Vous n\'etes pas connecté : <a href=\'index.php\'> Se connecter </a>';
            }
            echo '</br><form class=\'deco\' action=\'redeco.php\'> <input type=\'submit\' value=\'Se deconnecter\' >';
        ?>
    </body>

</html>