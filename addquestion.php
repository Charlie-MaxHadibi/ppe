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
            echo '<h1> Ajouter une question</h1>';
            echo '</br></br> Une question peux avoir maximum 4 reponses.</br></br> <form method=\'post\' action=\'newquestion.php\'>Intitule de la question :<input type =\'text\' name=\'nomquestion\'>';
            echo '</br> Reponse 1 :<input type=\'text\' name=\'rep0\'>';
            echo '</br> Reponse 2 :<input type=\'text\' name=\'rep1\'>';
            echo '</br> Reponse 3 :<input type=\'text\' name=\'rep2\'>';
            echo '</br> Reponse 4 :<input type=\'text\' name=\'rep3\'>';
            echo '</br> <input type=\'submit\' value=\'OK\'> </form>';
            echo '</br><form class=\'deco\' action=\'redeco.php\'> <input type=\'submit\' value=\'Se deconnecter\' >';
        ?>

    </body>

</html>