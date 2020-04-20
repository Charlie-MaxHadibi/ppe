<!doctype html>

    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>PPE #1</title>
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript" src="horloge.js"></script>
    </head>

    <body>
        <h1>PPE #1</h1>
        <?php
            session_start();
            include('pdo.php');
            if(isset($_SESSION['try']) && $_SESSION['try'] == 1 && isset($_POST['login'])){
                $sql = 'SELECT count(*) FROM eleve WHERE nom = \''.$_POST['login'].'\' AND prenom = \''.$_POST['password'].'\'';
                $sql2 = 'SELECT count(*) FROM prof WHERE nom = \''.$_POST['login'].'\' AND prenom = \''.$_POST['password'].'\'';
                $_SESSION['try'] = 0;
               
                    $req = $dbh->query($sql);
                    foreach($req as $row){
                        if($row['count(*)'] == 1){
                            $_SESSION['login'] = $_POST['login'];
                            $_SESSION['role'] = 'eleve';
                            $_SESSION['userstate'] = 1;
                            echo 'Vous etes conecter en tant que : '.$_SESSION['login'];
                            $sqlc = 'SELECT classe.classe FROM classe, eleve WHERE eleve.classe = classe.id AND eleve.nom = \''.$_SESSION['login'].'\'';
                            $ret = $dbh->query($sqlc);
                            foreach ($ret as $row){
                                echo '</br>Classe : '.$row['classe'];
                                $_SESSION['classe'] = $row['classe'];
                            }
                            echo '<form action=\'epreuve.php\'><input type=\'submit\' value=\'Acceder a son epreuve\'></form>';
                        }
                    }
                
               
                    $res = $dbh->query($sql2);
                    foreach($res as $rop){
                        if($rop['count(*)'] == 1){
                            $_SESSION['login'] = $_POST['login'];
                            $_SESSION['role'] = 'Professeur';
                            $_SESSION['userstate'] = 1;
                            echo 'Vosu etes conecter en tant que : '.$_SESSION['login'];
                            echo '</br>Vous pouver <a href=\'creeqcm.php\'>creez un qcm</a> ou <a href=\'addquestion.php\'> ajoutez une question a la base de données</a>';
                        }
                    }
                
            }
            else if(isset($_SESSION['userstate']) && $_SESSION['userstate'] != 1){
                echo 'mauvais identifiant/mot de passe';
            }
            else{
                    echo '<form class=\'conexion\' method =\'post\' action=\'index.php\'>Se connecter : <input placeholder=\'Identifiant\' type=\'text\' name=\'login\'><input placeholder=\'Mot de passe\' type=\'password\' name=\'password\'>';
                    echo '<input value=\'OK\' type=\'submit\'> </form>';
                    $_SESSION['try'] = 1;
            }
            echo '</br><form class=\'deco\' action=\'redeco.php\'> <input type=\'submit\' value=\'Se deconnecter\' >';
            
        ?>
    </body>

</html>