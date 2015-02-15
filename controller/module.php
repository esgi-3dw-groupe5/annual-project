<?php
require_once($source."controller/accessControl.php");
require_once($source."model/dbconnect.php");
require_once($source."model/dbusers.php");
require_once($source."model/dbcontent.php");
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
			
			default:
				# code...
				break;
		}
	}

	function render_contents($content){
		global $source;
		$link = db_connect();
		switch ($content) {
            /***************************/
            /********page content*******/
            /***************************/
			case 'connection':
				global $li_msgErr_login;
				global $li_msgErr_psw;
				global $li_msgErr;
				if( !$_SESSION['user']['connected'] ){include_once($source."template/formLogin.tpl");} 
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
                $result = db_get_all_user($link);
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

            /***************************/
            /*******proper content******/
            /***************************/
			case 'menu':
				$result = db_get_content($link,'menu');

				while ($data = $result -> fetch()) {
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

				require($source.'template/asideFacet.tpl');
				break;
			case 'read_state':


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
			require($source.'template/articleList.tpl');
		}
	}
?>