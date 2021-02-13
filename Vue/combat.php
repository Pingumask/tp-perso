<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/style.css">
        <title>Battle</title>
        <script src="./js/combat.js" defer></script>
    </head>
    <body>
        <h1>
        <form action="combat.php" method="get">
            <select name="perso1"><?php    
                foreach($liste_personnages as $perso){
                    $selected = ($perso['id']==$perso1) ? 'selected' : '';
                    printf('<option value="%d" %s>%s</option>',$perso['id'],$selected,$perso['nom']);
                }?>
            </select>
            VS
            <select name="perso2"><?php    
                foreach($liste_personnages as $perso){
                    $selected = ($perso['id']==$perso2) ? 'selected' : '';
                    printf('<option value="%d" %s>%s</option>',$perso['id'],$selected,$perso['nom']);
                }?>
            </select>
            <input type="submit" value="&gt;"/> 
        </form>
        </h1>
        <figure id="portrait1">
            <?php printf('<img src="%s" alt="portrait de %s" /><figcaption>%s</figcaption>',$persoGauche->portrait,$persoGauche->nom,$persoGauche->nom);?>
        </figure>
        <div class="actions">
            <?php 
            foreach($actions as $key=>$action){
                printf('<div id="action%d" class="action %s"><img src="%s" alt="%s" />%s</div>', $key, $action->type, $action->perso->miniature,$action->perso->nom,$action->texte);
            }
            ?>
        </div>
        <figure id="portrait2">
            <?php printf('<img src="%s" alt="portrait de %s" /><figcaption>%s</figcaption>',$persoDroite->portrait,$persoDroite->nom,$persoDroite->nom);?>
        </figure>
    </body>
</html>