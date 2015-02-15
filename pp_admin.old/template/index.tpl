<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Admin </title>
        <meta name="description" content="">
        <link rel="stylesheet" href="<?php print($config['source']); ?>/pp_admin/main.css">
        <link rel="stylesheet" href="<?php print($config['source']); ?>/pp_admin/form.css">
        
        <script type="text/javascript" src="<?php print($config['source']); ?>/assets/js/libs/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="<?php print($config['source']); ?>/pp_admin/main.js"></script>
        <script type="text/javascript" src="<?php print($config['source']); ?>/assets/js/coreAjax.js"></script>
        <script type="text/javascript" src="<?php print($config['source']); ?>/assets/js/datepicker.js"></script>
        <script type="text/javascript" src="<?php print($config['source']); ?>/assets/js/clock.js"></script>
        <script type="text/javascript" src="<?php print($config['source']); ?>/assets/js/tinymce/tinymce.min.js"></script>

    </head>
    <body>
        <header>
            <nav>
                
                <h1>Pinnackl Press Administration</h1>
            </nav>      
        </header>

        <img class="img-top-left" src="../images/titre.gif">
        
        <?php 
        include("menu.tpl"); 
        ?>

    </body>
</html>