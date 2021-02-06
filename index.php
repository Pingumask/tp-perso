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
        <h1><?php printf('%s VS %s',$gentil->nom,$mechant->nom);?></h1>
        <figure id="portrait1">
            <?php printf('<img src="./persos/portrait/%s.png" alt="portrait de %s" /><figcaption>%s</figcaption>',$gentil->portrait,$gentil->nom,$gentil->nom);?>
        </figure>
        <div class="actions">
            <?php 
            foreach($actions as $key=>$action){
                printf('<div id="action%d" class="action %s"><img src="./persos/miniature/%s.png" alt="%s" />%s</div>', $key, $action->type, $action->perso->miniature,$action->perso->miniature,$action->texte) ;
            }
            ?>
        </div>
        <figure id="portrait2">
            <?php printf('<img src="./persos/portrait/%s.png" alt="portrait de %s" /><figcaption>%s</figcaption>',$mechant->portrait,$mechant->nom,$mechant->nom);?>
        </figure>
    </body>
</html>


