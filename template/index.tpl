<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pinnackl</title>
        <meta name="description" content="description de ma page">

        <link href="<?php print($config['source']); ?>/assets/css/header.css" rel="stylesheet" media="all"/>
        <link href="<?php print($config['source']); ?>/assets/css/footer.css" rel="stylesheet" media="all"/>
        <link href="<?php print($config['source']); ?>/assets/css/form.css" rel="stylesheet" media="all"/>
        <link href="<?php print($config['source']); ?>/assets/css/main.css" rel="stylesheet" media="all"/>
        <link href="<?php print($config['source']); ?>/assets/css/formSignin.css" rel="stylesheet" media="all"/>

        <script type="text/javascript" src="<?php print($config['source']); ?>/assets/js/libs/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="<?php print($config['source']); ?>/assets/js/coreAjax.js"></script>
        <script type="text/javascript" src="<?php print($config['source']); ?>/assets/js/datepicker.js"></script>
        <script type="text/javascript" src="<?php print($config['source']); ?>/assets/js/clock.js"></script>
        <script type="text/javascript" src="<?php print($config['source']); ?>/assets/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            width : 1000,
            height : 500,
            plugins: "textcolor media preview image",
            toolbar: [
            "undo redo | styleselect | bold italic | link image | forecolor | backcolor | preview",
            "alignleft aligncenter alignright"
            ]
        });
        </script>
    </head>
    <body>
        <?php include("header.tpl"); ?>

        <div  class="content">
            <section >
                <h1>
                    <?php
                        if( $_SESSION['user']['connected'] ){
                            print($_SESSION['user']['pseudo']);
                            printf("<a href='%s?act=logout'>logout</a>",$config['source']);
                        }
                    ?>
                </h1>
                <div>

                <?php if( !$_SESSION['user']['connected'] ){include_once("formLogin.tpl");} ?>
                <?php if( !$_SESSION['user']['connected'] ){include_once("formSignin.tpl");} ?>
                <?php if(  $_SESSION['user']['connected'] ){include_once("formArticle.tpl");} ?>

                </div>

            </section>

            <section class="">
                <div id="clock">
                </div>