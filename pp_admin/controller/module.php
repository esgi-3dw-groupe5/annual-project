<?php
require_once($source."pp_admin/controller/accessControl.php");
require_once($source."pp_admin/model/dbconnect.php");
require_once($source."pp_admin/model/dbusers.php");
require_once($source."pp_admin/model/dbcontent.php");
    /*********************************************************************************/
    /********************************* Call display method****************************/
    /*********************************************************************************/
	function page_controller($mode, $page){
		switch ($mode) {
			case 'article':
				render_contents($page);
				render_article($page);
				break;
			case 'gallery':
				echo '<div class="content"><h1>gallery mode Page</h1></div>';
				break;
			case 'administrator':
				render_contents($page);
				render_edit($page);
				break;
			
			default:
				# code...
				break;
		}
	}

	function render_contents($content){
		global $uri;
		global $source;
		$link = db_connect();
		switch ($content) {
            /***************************/
            /******admin page content***/
            /***************************/
            case 'page':
            		echo '<div class="content"><h1>List of page</h1></div>';
            		render_contents("list_page");
            	break;
        	case 'menu':
            	echo '<div class="content"><h1>List of menu</h1></div>';
            		render_contents("list_menu");
            	break;
        	case 'article':
        			echo '<div class="content"><h1>List of articles</h1></div>';
        			render_article("");
            	break;
        	case 'utilisateur':
            	echo '<div class="content"><h1>List of utilisateur</h1></div>';
            	break;

            /***************************/
            /********page content*******/
            /***************************/
			case 'connection':
				global $li_msgErr_login;
				global $li_msgErr_psw;
				global $li_msgErr;
				if( !$_SESSION['user']['connected'] ){include_once($source."template/formLogin.tpl");} 
				break;
			case 'deconnection':
			    if( $_SESSION['user']['connected'] ){
			        print("<div class='logout'><span>Bienvenue ".$_SESSION['user']['pseudo']."| </span>");
			        printf("<a href='%s?act=logout'>Déconnection</a></div>",$uri);
			    }
				break;
			case 'inscription':	
				if( !$_SESSION['user']['connected'] ){
					include_once($source."template/formSignin.tpl");
				}
				break;
			case 'activation':
				if( !$_SESSION['user']['connected'] ){
					include_once($source."template/formSignin.tpl");
				}
				echo '<div class="content"><h1>Activation Page</h1></div>';
				break;
			case 'home':
                $result = db_get_actif_user($link);
                while ($data = $result -> fetch()) {
                    if(isset($_SESSION['user']['actif'])){
                        $_SESSION['user']['actif'] = $data['actif'];
                    }
                }
            
                if($_SESSION['user']['actif']==1)
                {
                    display_user_article();
                    echo '<div class="content"><h1>Home Page</h1></div>';
                    if(permissions($_SESSION['user']['role'],'editor')){
                        render_contents('form_article');
                    }
                }
                else
                {
                    echo '<div class="content"><h1>Activer votre compte pour accéder à votre Home Page</h1></div>
                     <form method="POST" action="'.$_SESSION['url'].'" class="" id="mail_form" name="mail_form">
                     <input type="submit" name="mail_submit" value="Renvoyer un Mail">
                     </form>';
                }
                    
				break;
			case '404':
				echo '<div class="content"><h1>404 ERROR</h1></div>';
				break;

            /***************************/
            /*******proper content******/
            /***************************/
			case 'menu':
				$page = get_param('p','');
				$result = db_get_content($link,'menu');
				while ($data = $result -> fetch()) {
					$active = "";
					$class = $data['tag'];
					if($page == $data['tag']){
						$active = "active";
					}
					require($source.'template/header.tpl');
				}
				break;
			case 'form_article':
				global $at_msgErr;
				global $at_msgErr_image1;
				global $at_msgErr_image;
				if( $_SESSION['user']['connected'] ){include_once($source."template/formArticle.tpl");}
				break;
			case 'facet_range':
				$result = db_get_category($link);
				$facet = get_cookie();
				while($data = $result -> fetch()){
					if( array_key_exists($data['tag'], $facet) ){
						require($source.'template/asideFacet.tpl');
					}
				}
				break;
			case 'list_page':
				$page = get_param('p','');
				$result = db_get_content($link, 'allpage');
				echo'<table style="background:#222326; height:9% border:none;">';
					echo '<tbody>';
				while($data = $result -> fetch()){
					require($source.'pp_admin/template/pageList.tpl');
				}
					echo '</tbody>';
				echo'</table>';
				break;
			case 'list_menu':
				$result = db_get_content($link, 'menu');
				echo'<table style="background:#222326; height:9% border:none;">';
					echo '<tbody>';
				while($data = $result -> fetch()){
					require($source.'pp_admin/template/menuList.tpl');
				}
					echo '</tbody>';
				echo'</table>';
				break;
			default:
				# code...
				break;
		}
	}
    /*********************************************************************************/
    /********************************* display method*********************************/
    /*********************************************************************************/
	function render_article($content){
		$link = db_connect();
		if($content != ""){
			$result = db_get_category($link);
			while($data = $result -> fetch()){
				if($data['tag'] == $content && $data['tag'] != 'home'){
					display_article();
				}
			}
		}
		else{
			display_all_articles();
		}
	}

	function render_edit($content){
		$link = db_connect();
		if($content != ""){
			$result = db_get_content($link, '');
			echo'<pre>
					<form id="edit" action="" method="post">';
			while($data = $result -> fetch()){
				printf('<div><input name="id" value="%s"></div>', $data['id']);
				printf('<div><input name="tag" value="%s"></div>', $data['tag']);
				printf('<div><input name="name_category" value="%s"></div>', $data['name_category']);
				printf('<div><input name="order" value="%s"></div>', $data['order']);
				printf('<div><input name="display" value="%s"></div>', $data['display']);
				printf('<div><input name="connected" value="%s"></div>', $data['connected']);
				printf('<div><input name="color" value="%s"></div>', $data['color']);
			}
			echo'</form>
					</pre>';
		}
	}

	function display_edit(){
		global $uri;
		global $source;
		$page = get_param('p', '');
		$link = db_connect();
		$result = db_get_content($link, $page);
		$data = $result -> fetch();
		var_dump($data);


	}

	function display_all_articles(){
		global $uri;
		global $source;
		$link = db_connect();
		$result = db_get_articles($link);
		while($data = $result -> fetch()){
			$result_cat = db_get_category_tag($link, $data['id_category']);
			$data_cat = $result_cat -> fetch();

			$data_user = db_get_user_id($link) -> fetch();
			$id_user = $data_user['id'];
			$data_status = db_get_status($link, $id_user, $data['id']) -> fetch();

			if( $data_status == false ||  $data_status['status'] == "read"){
				$read = "";
				$unread = "style='display:none'";
			}
			else{
				$read = "style='display:none'";
				$unread = "";
			}
			require($source.'template/articleList.tpl');
		}
		
	}

	function display_article(){
		global $uri;
		global $source;
		global $co_msgErr;

		$link = db_connect();
		$page = get_param('p', '');
		$article = get_param('article', '');

		$result = db_get_category_id($link, $page);
		$data = $result -> fetch();
		$value = $data['id']; 
		$req = db_get_articles_by_cat($link, $value);

		while($data = $req->fetch()){
			if($article == ''){
				$result_cat = db_get_category_tag($link, $data['id_category']);
				$data_cat = $result_cat -> fetch();
				
				$data_user = db_get_user_id($link) -> fetch();
				$id_user = $data_user['id'];
				$data_status = db_get_status($link, $id_user, $data['id']) -> fetch();
				
				if( $data_status == false ||  $data_status['status'] == "read"){
					$read = "";
					$unread = "style='display:none'";
				}
				else{
					$read = "style='display:none'";
					$unread = "";
				}
				require($source.'template/articleList.tpl');
			}
			elseif($article != ''){
					
				$result_cat = db_get_category_id($link, $page);
				$data_cat = $result_cat -> fetch();

				$result = db_get_article($link, $article, $data_cat['id']);
				$data = $result -> fetch();

			if( $result -> rowCount() > 0){
				require($source.'template/articleRead.tpl');
				if( $_SESSION['user']['connected'] ){require($source.'template/formComment.tpl');}
				
				$result_id = db_get_comments($link, $data['id']);
				while($data_comment = $result_id ->fetch()){
					require($source.'template/commentRead.tpl');
				}
				break;
			}
			else{
				// require tpl
				echo '<div class="content"><h1>Oups,<br>Aucun article trouvé !<br><b>:-/</b></h1></div>';
				break;
				}
			}
		}
	}

	function display_user_article(){
		global $source;
		global $uri;
		$link = db_connect();
		access_control();
		require('config.php');

		$pseudo = $_SESSION['user']['pseudo'];
		$result = db_get_user_id($link,$pseudo,'pseudo');
		$data = $result->fetch();

		$req = db_get_user_article($link,$data['id']);

		while ($data_article = $req -> fetch()){
			$result_article = db_get_one_article($link,$data_article['id_article']);
			$data = $result_article -> fetch();
			$result_cat = db_get_category_tag($link, $data['id_category']);

			$data_cat = $result_cat -> fetch();
			$data_user = db_get_user_id($link) -> fetch();
			$id_user = $data_user['id'];
			$data_status = db_get_status($link, $id_user, $data['id']) -> fetch();

			if( $data_status == false ||  $data_status['status'] == "read"){
				$read = "";
				$unread = "style='display:none'";
			}
			else{
				$read = "style='display:none'";
				$unread = "";
			}
			require($source.'template/articleList.tpl');
		}
	}

	// 

	// function display_edit($page,){
	// 	switch ($page) {
	// 		case 'article':
	// 			global $article;

	// 		    $idarticle = db_get_one_article($link, $article);
	// 		    $data = $idarticle -> fetch();
			    
	// 		    $result_cat = db_get_category_tag($link, $data['id_category']);
	// 			$data_cat = $result_cat -> fetch();

	// 			require($source.'/pp_admin/template/editarticle.tpl');


	// 			$comments = db_get_comments($link, $data['id']);
	// 			while($data_comment = $comments ->fetch()){
	// 				//require($source.'/template/commentRead.tpl');
	// 				require($source.'/pp_admin/template/editcomment.tpl');
	// 			}
	// 			break;
			
	// 		default:
	// 			# code...
	// 			break;
	// 	}
	// }
?>