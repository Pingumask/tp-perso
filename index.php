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
        <h1>VS</h1>
        <div class="actions">
            <?php include('combat.php');
            foreach($actions as $key=>$action){
                printf('<div id="action%d" class="action %s"><img src="persos/%s.png" alt="%s" />%s</div>', $key, $action->type, $action->perso->image,$action->perso->image,$action->texte) ;
            }
            ?>
        </div>
        
    </body>
</html>


