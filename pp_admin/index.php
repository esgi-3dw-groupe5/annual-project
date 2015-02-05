<?php
if(!defined('__ROOT__'))define('__ROOT__', $_SERVER['DOCUMENT_ROOT']."/annual-project");
require_once(__ROOT__."/pp_admin/controller/adminController.php");


$page = get_param('p', '');
echo 'Admin';
debug($_GET);
debug($_SERVER['REQUEST_URI']);
die();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Admin </title>
        <meta name="description" content="">
        <link rel="stylesheet" href="main.css">
        <script type="text/javascript" src="../assets/js/libs/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="main.js"></script>
    </head>
    <body>
        <header>
            <nav>
                <img class="img-top-left" src="../images/logo-gris.gif">
                <h1>Pinnackl Press Admin</h1>
            </nav>      
        </header>

        <section  class="left-block">
            <h2>Menu</h2>
            <ul>
                <li><a href="#" id="toggler_user">Utilisateurs</a></li>
                <li><a href="#" id="toggler_article">Articles</a></li>
                <li><a href="#" id="toggler_commentaire">Commentaires</a></li>
                <li><a href="#" id="toggler_theme">Catégories</a></li>  
            </ul>
        </section>


        <section  class="right-block" id="toggle_user">
            <h2>Utilisateurs</h2>
            <ul>
                <li><h3>Pseudo</h3><h3 class="email">Email</h3><h3>Role</h3></li>
                <?php  render_contents('users'); ?>
            </ul>
        </section>

        <section  class="right-block" id="toggle_article">
            <h2>Articles</h2>
            <ul>
                <li><h3>Nom</h3></li>
                <?php  render_contents('articles'); ?>
            </ul>
        </section>

         <section  class="right-block" id="toggle_commentaire">
            <h2>Commentaires</h2>
            <ul>
                <li><h3>Nom</h3><h3>Auteur</h3><h3>Status</h3></li>
                <?php  render_contents('commentaires'); ?>
            </ul>
        </section>

        <section  class="right-block" id="toggle_theme">
            <h2>Thèmes</h2>
            <ul>
                <li><a href="">thème1</a></li>
                <li><a href="">thème2</a></li>

            </ul>
        </section>

       
        <aside>
        </aside>
        <footer>
        </footer>
    </body>
</html>