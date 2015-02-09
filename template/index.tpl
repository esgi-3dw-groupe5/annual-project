<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pinnackl</title>
        <meta name="description" content="description de ma page">


        <script type="text/javascript" src="<?php print($config['source']); ?>/assets/js/libs/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="<?php print($config['source']); ?>/assets/js/coreAjax.js"></script>
        <script type="text/javascript" src="<?php print($config['source']); ?>/assets/js/datepicker.js"></script>
        <script type="text/javascript" src="<?php print($config['source']); ?>/assets/js/clock.js"></script>
        <script type="text/javascript" src="<?php print($config['source']); ?>/assets/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
        tinymce.init({
            selector: "textarea#at_content",
            elements : "at_content",
            width : 1000,
            height : 500,
            plugins: "textcolor media preview image",
            toolbar: [
            "undo redo | styleselect | bold italic | link image | forecolor | backcolor | preview",
            "alignleft aligncenter alignright"
            ]
        });

        tinymce.init({
            selector: "textarea#co_content",
            elements : "at_content",
            width : 500,
            height : 150,
            menubar : false,
            toolbar: [
            "undo redo | bold italic | alignleft aligncenter alignright "
            ]
        });
        
        </script>
    </head>
    <body>
        <?php 
        include("header.tpl"); 
        ?>

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
                    <?php render_contents('connection') ?>
                    <?php render_contents('inscription') ?>
                     <?php if( $_SESSION['user']['connected'] ){include_once("formArticle.tpl");} ?>
                </div>

            </section>

            <section class="">
                <div id="clock">
                </div>
                <div class="core-article">