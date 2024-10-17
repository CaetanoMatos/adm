<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Cae - Administrativo</title>
    </head>
    <body>
        <?php 
            //usava esse require quando nao tinha o composer controlando as dependencias do sistema
            //require './core/ConfigController.php';

            require'./vendor/autoload.php';
            $home= new Core\ConfigController();
            $home->loadPage();
        ?>
    </body>
</html>