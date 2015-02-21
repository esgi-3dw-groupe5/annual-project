<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pinnackl</title>
        <meta name="description" content="description de ma page">

        <link rel="stylesheet" href="<?php print($uri); ?>/assets/css/main.css">
        <link rel="stylesheet" href="<?php print($uri); ?>/assets/css/nav.css">
        <link rel="stylesheet" href="<?php print($uri); ?>/assets/css/sidebar.css">
        <link rel="stylesheet" href="<?php print($uri); ?>/assets/css/form.css">

        <script type="text/javascript" src="<?php print($uri); ?>/assets/js/libs/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="<?php print($uri); ?>/assets/js/coreAjax.js"></script>
        <script type="text/javascript" src="<?php print($uri); ?>/assets/js/datepicker.js"></script>
        <script type="text/javascript" src="<?php print($uri); ?>/assets/js/clock.js"></script>
        <script type="text/javascript" src="<?php print($uri); ?>/assets/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="<?php print($uri); ?>/assets/js/articleRead.js"></script>
        <script type="text/javascript" src="<?php print($uri); ?>/assets/js/cookie.js"></script>
        <script type="text/javascript" src="<?php print($uri); ?>/assets/js/initTinymce.js"></script>
        <script type="text/javascript">
            initTinymce();
        </script>
        <?php set_page_color($color); ?>
    </head>
    <body>
        <header>
            <nav role='navigation' class="main-nav" id="main-nav">
                <ul id="main-nav-list">
                    <li style="align-self:flex-end;">
                      <a class="h-logo" href="/annual-project/">
                        <img src="<?php print($uri); ?>/img/logo-gris-01.png">
                      </a>
                    </li>
                    <?php render_contents('menu') ?>
                </ul>
            </nav>
        </header>
        <aside>
            <?php render_contents('deconnection') ?>
            <?php render_contents('connection') ?>
            <h2>Fréquences des actus</h2>
            <?php  render_contents('facet_range') ?>
        </aside>
        <section class="content">