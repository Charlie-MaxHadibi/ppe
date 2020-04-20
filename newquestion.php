<!doctype html>

    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>PPE #1</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <?php
            include('pdo.php');
            session_start();

            $lastid = 'SELECT MAX(id) FROM qcm';
            $res = $dbh->query($lastid);
            foreach($res as $id){
                $idmax = $id['0'] + 1;
            }
            $sqln = 'INSERT INTO qcm (id, question, commentaire) VALUES (\''.$idmax.'\', \''.$_POST['nomquestion'].'\', \'Ajouter par '.$_SESSION['login'].'\')';
            echo $sqln;
            $dbh->exec($sqln);
            if(isset($_POST['rep3']) && isset($_POST['rep2']) && isset($_POST['rep1']) && isset($_POST['rep0']) ) {
                $i=0;
                while ($i <=3){
                    $sql[$i] = 'INSERT INTO reponses (idq, reponse) VALUES (\''.$idmax.'\', \''.$_POST['rep'.$i].'\')';
                    $dbh->exec($sql[$i]);
                    $i++;
                }
            }
            else if(isset($_POST['rep2']) && isset($_POST['rep1']) && isset($_POST['rep0']) ) {
                $i=0;
                while ($i <=2){
                    $sql[$i] = 'INSERT INTO reponses (idq, reponse) VALUES (\''.$idmax.'\', \''.$_POST['rep'.$i].'\')';
                    $dbh->exec($sql[$i]);
                    $i++;
                }
            }
            else if(isset($_POST['rep1']) && isset($_POST['rep0']) ) {
                $i=0;
                while ($i <=1){
                    $sql[$i] = 'INSERT INTO reponses (idq, reponse) VALUES (\''.$idmax.'\', \''.$_POST['rep'.$i].'\')';
                    $dbh->exec($sql[$i]);
                    $i++;
                }
            }
            else if(isset($_POST['rep0']) ) {
                $sql['0'] = 'INSERT INTO reponses (idq, reponse) VALUES (\''.$idmax.'\', \''.$_POST['rep'.$i].'\')';
                $dbh->exec($sql['0']);
            }
            var_dump($sql);
            echo '</br><form class=\'deco\' action=\'redeco.php\'> <input type=\'submit\' value=\'Se deconnecter\' >';

        ?>

    </body>

</html>