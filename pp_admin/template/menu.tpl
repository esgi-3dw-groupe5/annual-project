<div class="left-block">
    <h2>Menu</h2>
    <ul>
        <a href="#" id="toggler_user"  clas="active"><li class="menu-box">Utilisateurs</li></a>
        <ul class="toggle_menu_user">
            <li>Tous les articles</li>
            <li>Utilisateur par role </ul>
        <a href="#" id="toggler_article"><li class="menu-box  toggler_click ">Articles</li></a> 
	    <ul class="toggle_menu_article" style="margin-bottom:20px;">
	    	<li>Tous les articles</li>
	    	<li>Article par catégories
                <ul class="article_by_cat  " >
                   <li style="margin-left:20px;color:grey;text-decoration:none"><?php  render_contents('menu'); ?></li>
                </ul>
            </li>
	    </ul>
        <a href="#" id="toggler_comment"><li class="menu-box  toggler_click ">Commentaires</li></a>
        <ul class="toggle_menu_comment">
	    	<li><a href="#" id="toggler_all_comment">Tous les commentaires</a></li>
	    	<li><a href="#" id="toggler_report_comment">Commentaires signalés</li>
	    </ul>
        <a href="#" id="toggler_menu_theme"><li class="menu-box  toggler_click">Thèmes</li>  </a>
    </ul>

    <img class="img-bottom-left" src="../images/logo-gris.gif">
</div>