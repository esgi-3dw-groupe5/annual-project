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
        <header>
            <nav role='navigation' class="main-nav" id="main-nav">
                <ul id="main-nav-list">
                    <li>
                      <a class="" href="/annual-project/pp_admin">
                        <div>
                            <span>Pinnackl Press</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="" href="/annual-project/page">
                        <div>
                            <span>page</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="" href="/annual-project/menu">
                        <div>
                            <span>menu</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="" href="/annual-project/article">
                        <div>
                            <span>article</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="" href="/annual-project/utilisateur">
                        <div>
                            <span>utilisateur</span>
                        </div>
                      </a>
                    </li>

                </ul>
            </nav>
        </header>
        <aside>
        </aside>
        <section class="content">