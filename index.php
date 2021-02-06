<?php include('combat.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
        <script src="combat.js" defer></script>
    </head>
    <body>
        <h1><?php printf('%s VS %s',$persoGauche->nom,$persoDroite->nom);?></h1>
        <figure id="portrait1">
            <?php printf('<img src="./persos/portrait/%s.png" alt="portrait de %s" /><figcaption>%s</figcaption>',$persoGauche->portrait,$persoGauche->nom,$persoGauche->nom);?>
        </figure>
        <div class="actions">
            <?php 
            foreach($actions as $key=>$action){
                printf('<div id="action%d" class="action %s"><img src="./persos/miniature/%s.png" alt="%s" />%s</div>', $key, $action->type, $action->perso->miniature,$action->perso->miniature,$action->texte) ;
            }
            ?>
        </div>
        <figure id="portrait2">
            <?php printf('<img src="./persos/portrait/%s.png" alt="portrait de %s" /><figcaption>%s</figcaption>',$persoDroite->portrait,$persoDroite->nom,$persoDroite->nom);?>
        </figure>
    </body>
</html>


