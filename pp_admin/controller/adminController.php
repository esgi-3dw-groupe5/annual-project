<?php
require('../config.php');
$source = $config['include_path'];

require_once($source."/controller/common.php");
require_once($source."/controller/accessControl.php");
require_once($source."/model/dbconnect.php");
require_once($source."/model/dbusers.php");
require_once($source."/model/dbarticle.php");
require_once($source."/model/dbcomment.php");
require_once($source."/model/dbcontent.php");


function render_contents($content){
    global $source;
    
	$link = db_connect();
	switch ($content) {
		case 'users':
			$result = db_get_all_user($link);

			while ($data = $result -> fetch()) {
				require($source.'/pp_admin/template/users.tpl');

			}

			break;
		case 'articles':
			$result =  db_get_articles($link);

			while ($data = $result -> fetch()) {
				$result_cat = db_get_category_tag($link, $data['id_category']);
				$data_cat = $result_cat -> fetch();
				require($source.'/pp_admin/template/articles.tpl');
			}

			break;

		case 'articlesbytag':
			global $category;
			$result =  db_get_articles_by_cat($link,$category);
			while ($data = $result -> fetch()) {
				require($source.'/pp_admin/template/articlesbytag.tpl');
			}

			break;

		case 'menu':
				$result = db_get_content($link,'menu');

				while ($data = $result -> fetch()) {

					if ($data['id'] <= '5')
					{
						require($source.'/pp_admin/template/categories.tpl');
					}
				}

				break;

		case 'commentaires':
			$result =  db_get_all_comments($link);//tous les commetaires

			while ($data = $result -> fetch()) {
				require($source.'/pp_admin/template/commentaires.tpl');
			}

			break;

		case 'report_commentaires':
			$result_report =  db_get_all_report_comments($link);//commentaire signalés
			
			while ($data = $result_report -> fetch()) {
				require($source.'/pp_admin/template/commentaires.tpl');
			}

			break;

		case 'editusers':
			global $id;
		    $user = db_get_one_user($link,$id);
		    $data = $user -> fetch();
			
			require($source.'/pp_admin/template/edituser.tpl');

			break;

		case 'deleteuser':
			global $id;
		    db_delete_user($link,$id);
		    require($source.'/pp_admin/template/deleteuser.tpl');
			break;

		case 'editarticle':
			global $article;

		    $idarticle = db_get_one_article($link, $article);
		    $data = $idarticle -> fetch();
		    
		    $result_cat = db_get_category_tag($link, $data['id_category']);
			$data_cat = $result_cat -> fetch();

			require($source.'/pp_admin/template/editarticle.tpl');


			$comments = db_get_comments($link, $data['id']);
			while($data_comment = $comments ->fetch()){
				//require($source.'/template/commentRead.tpl');
				require($source.'/pp_admin/template/editcomment.tpl');
			}
			
			break;
		

		case 'deletearticle':
			global $article;
		     db_delete_article($link, $article);
			break;

		case 'deletecomment':
			global $comment;
		     db_delete_comment($link, $comment);
			break;

		case 'categories':
			$result =  db_get_articles($link);

			while ($data = $result -> fetch()) {
				require($source.'/pp_admin/template/categories.tpl');
			}

			break;
		default:
			# code...
			break;
	}
}


