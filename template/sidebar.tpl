<p>Recherche <input></p>
<?php 
    if( !$_SESSION['user']['connected'] ){include_once("formLogin.tpl");
    } else {
        print("<p>".$_SESSION['user']['pseudo']."</p>");
        printf("<a class='logout' href='%s?act=logout'>logout</a>",$config['source']);
    }
?>
<div class="range">
    <h1>Fréquences des actus</h1>
    <h3>Cinéma/Série</h3><input type="range" id="cine" min="0" max="10">
</br></br>
    <h3>Technologies</h3><input type="range" id="techno" min="0" max="10">
</br></br>
    <h3>E-Sport</h3><input type="range" id="esport" min="0" max="10">
</br></br>
    <h3>Musique</h3><input type="range" id="musique" min="0" max="10">
</br></br>
    <h3>Sport</h3><input type="range" id="sport" min="0" max="10">
</div>   