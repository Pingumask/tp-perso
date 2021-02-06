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
        <h1>TP class perso</h1>
        <div class="actions">
            <?php include('combat.php');
            foreach($actions as $action){
                echo "<div class=\"action $action->type\"><img src=\"persos/".$action->perso->image.".png\" alt=\"".$action->perso->image."\" />$action->texte</div>";
            }
            ?>
        </div>
        
    </body>
</html>


